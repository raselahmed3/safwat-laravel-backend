<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductEdit extends Component
{
    public $product_id;
    public $name;
    public $product_name;
    public $product_image;
    public $description;
    public $price;
    public $DiscountPrice;
    public $slug;
    public $time;



    public function render()
    {
        return view('livewire.product-edit');
    }
    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'price' => 'required',

        'time' => 'required'
    ];




    public function mount(){

        $product = Product::findOrFail($this->product_id);

        $this->product_name = $product->name;
        $this->product_image = $product->image;
        $this->price = $product->price;
        $this->DiscountPrice = $product->DiscountPrice;
        $this->description = $product->description;

        }


    public function productEdit(){
        $product = Product::findOrFail($this->product_id);
        $this->validate();

        $product = Product::where('id', $this->product_id)->first();
        $product->name = $this->product_name;
        $product->description = $this->description;
        $product->image = $this->product_image;
        $product->price = $this->price;
        $product->DiscountPrice = $this->DiscountPrice;
        $product->save();
        flash()->addSuccess('Product updated successfully');

        return redirect()->route('product.index');
    }

}
