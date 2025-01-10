<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RockCard extends Component
{
    public int $rockId;
    public string $image;
    /**
     * @var array<string> $more_images
     */
    public array $more_images;
    public string $name;
    public string $color;
    public string $origin;
    public string $properties;
    public string $description;
    public bool $inCart;
    public float $price;

    public function __construct(
        int $rockId = 0,
        string $image = "static/default.jpg",
        array $more_images = [],
        string $name = "Unknown",
        string $color = "Unknown",
        string $origin = "Unknown",
        string $properties = "No data",
        string $description = "No description available",
        bool $inCart = false,
        float $price = 0.00,
    ) {
        $this->rockId = $rockId;
        $this->image = $image;
        $this->more_images = $more_images;
        $this->name = $name;
        $this->color = $color;
        $this->origin = $origin;
        $this->properties = $properties;
        $this->description = $description;
        $this->inCart = $inCart;
        $this->price = $price;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.rock-card');
    }
}
