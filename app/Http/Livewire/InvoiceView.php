<?php

namespace App\Http\Livewire;

use Livewire\Component;

class InvoiceView extends Component
{
    public $name;
    public $description;
    public $price;
    public $image = [];

    public function render()
    {
        return view('livewire.invoice-view');
    }
}
