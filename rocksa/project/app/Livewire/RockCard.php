<?php

namespace App\Livewire;

use Livewire\Component;

class RockCard extends Component
{
    // Define the properties to make them reactive with Livewire
    public array $data = [];

    /**
     * Constructor to initialize the data array
     *
     * @param array<string, mixed> $data
     */
    public function mount(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * Dynamically retrieve attributes from $data
     *
     * @param string $name The property name to access
     * @return mixed The value associated with the property
     */
    public function get(string $name): mixed
    {
        return $this->data[$name] ?? null; // Return the property if it exists, otherwise null
    }

    /**
     * Render the view for the component
     *
     * @return View|string
     */
    public function render()
    {
        return view('livewire.rock-card', ['data' => $this->data]);
    }
}
