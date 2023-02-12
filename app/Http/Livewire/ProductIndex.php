<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductIndex extends Component
{
    public function render()
    {
        $product = Product::paginate(10);

        return view('livewire.product-index', [
            'products' => $product,
        ]);
    }

    public function productDelete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        flash()->addSuccess('Product deleted successfully!');
    }
}
