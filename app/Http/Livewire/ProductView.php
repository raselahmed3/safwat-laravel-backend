<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductView extends Component
{
    public $product_id;
    public function render()
    {
        $product = Product::where('id', $this->product_id)->first();
        return view('livewire.product-view', [
            'product' => $product,
        ]);



    }



}
