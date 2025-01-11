<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * @method mixed get(string $name) Dynamically retrieve attributes from $data
 */
class RockCard extends Component
{
    /**
     * @var array<string, mixed> The data array containing the rock card properties
     */
    public array $data = [];

    /**
     * Constructor to initialize the data array
     *
     * @param array<string, mixed> $data
     */
    public function __construct(array $data = [])
    {
        $this->data = $data; // Store all properties in the data array
    }

    /**
     * Dynamically retrieve attributes from $data
     *
     * @param string $name The property name to access
     * @return mixed The value associated with the property
     */
    public function __get(string $name): mixed
    {
        return $this->data[$name] ?? null; // Return the property if it exists, otherwise null
    }

    /**
     * Render the view for the component
     *
     * @return View|Closure|string The view rendering the component
     */
    public function render(): View|Closure|string
    {
        return view('components.rock-card', ['data' => $this->data]);
    }
}
