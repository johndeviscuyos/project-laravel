<?php

use Livewire\Component;

new class extends Component {
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }
};

?>

<div style="text-align: center; padding: 2rem;">
    <h1>Counter: {{ $count }}</h1>

    <button wire:click="increment">+</button>
    <button wire:click="decrement">-</button>
</div>