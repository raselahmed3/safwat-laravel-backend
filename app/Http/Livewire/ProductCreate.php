<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductCreate extends Component
{
    public $name;
    public $namEe;
    public $product_image;
   public $description;
    public $price;
    public $DiscountPrice;
    public $slug;
    use WithFileUploads;
    public function render()
    {
        return view('livewire.product-create');
    }
    protected $rules = [
        'name' => 'required|unique:products,name',
        'description' => 'required',
        'price' => 'required',
        'product_image'=> 'required',

    ];
    public function formSubmit()
    {
        $this->validate();
        // $product = Product::create([

        //     'name' => $this->name,
        //     'slug' => str_replace(' ', '-', $this->name),
        //     'description' => $this->description,
        //     'image' => $this->image,
        //     'price' => $this->price,
        //     'user_id' => Auth::user()->id
        // ]);
        $product = new Product();
       $product->name = $this->name;
       $product->namEe = $this->namEe;
        $product->slug = str_replace(' ', '-', $this->name);
        $product->description = $this->description;
        $product->image = $this->product_image;
       $product->price = $this->price;
       $product->DiscountPrice = $this->DiscountPrice;
        $product->user_id = Auth::user()->id;
        $product->save();

        $product_id = $product->id;

        flash()->addSuccess('Product created successfully');
        return redirect()->route('product.index');
    }

}
