<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Cart extends Component
{
    public array $cart = [];
    public bool $isOpen = false;

    // Add 'removeFromCart' to listeners
    protected $listeners = ['addToCart' => 'handleAddToCart',
        'removeFromCart' => 'handleRemoveFromCart',
        'removedFromCart' => 'refreshCart',
        'cartUpdated' => 'refreshCart',
        'toggleCart' => 'toggleCart',
        ];

    public function mount()
    {
        $this->refreshCart();
    }

    public function toggleCart()
    {
        $this->isOpen = !$this->isOpen;
    }
    public function handleAddToCart($productId, $name, $price, $image)
    {
        $this->cart = Session::get('cart', []);

        if (isset($this->cart[$productId])) {
            $this->cart[$productId]['quantity'] += 1;
        } else {
            $this->cart[$productId] = [
                'name' => $name,
                'price' => $price,
                'image' => $image,
                'quantity' => 1,
            ];
        }

        Session::put('cart', $this->cart);

        // Dispatch event with updated cart data
        $this->dispatch('cartUpdated', ['cart' => $this->cart]);
    }

    public function updateQuantity($productId, $change)
    {
        $this->cart = Session::get('cart', []);

        if (isset($this->cart[$productId])) {
            $this->cart[$productId]['quantity'] += $change;
            if ($this->cart[$productId]['quantity'] <= 0) {
                // If quantity is 0 or less, remove the product from the cart
                $this->handleRemoveFromCart($productId);
                return;
            }

            Session::put('cart', $this->cart);
            $this->dispatch('cartUpdated', ['cart' => $this->cart]);
        }
    }

    public function handleRemoveFromCart($productId)
    {
        $this->cart = Session::get('cart', []);

        if (isset($this->cart[$productId])) {
            unset($this->cart[$productId]);
        }

        if (empty($this->cart)) {
            Session::forget('cart');
            $this->cart = [];
            $this->dispatch('cartCleared');
        } else {
            Session::put('cart', $this->cart);
            $this->dispatch('removedFromCart', ['removedProductId' => $productId]);
        }
    }



    public function clearCart()
    {
        $removedProductIds = array_keys($this->cart); // Get all product IDs

        Session::forget('cart');
        $this->cart = []; // Reset local cart variable

        // Dispatch event with all removed product IDs
        $this->dispatch('cartCleared', ['removedProductIds' => $removedProductIds]);

    }

    public function refreshCart()
    {
        $this->cart = Session::get('cart', []);
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
