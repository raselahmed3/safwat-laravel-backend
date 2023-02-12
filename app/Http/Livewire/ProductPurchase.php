<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Product;
use Livewire\Component;

class ProductPurchase extends Component
{
    public $name;
    public $phone_number;
   public $address;
   public $Staddress;
    public $selectedProducts = [];
    public $quantities = [];
    public $products;

    protected $rules = [
        'name' => 'required',
        'phone_number' => 'required',
        'address' => 'required',
        'Staddress' => 'required',
        'selectedProducts' => 'required',
        'quantities' => 'required',
    ];
    public function render()
    {
        $this->products = Product::all();
        return view('livewire.product-purchase');
    }

    public function addQuantity(){
        foreach($this->selectedProducts as $id){
           if (!array_key_exists($id,$this->quantities)){
               $this->quantities[$id] = 1;
           }
        }
        foreach($this->quantities as $index=>$value){
            if (!in_array($index,$this->selectedProducts)){
               unset($this->quantities[$index]);
            }
        }
    }
    public function formSubmit(){
         $this->validate();

         $invoice = new Invoice();

         $invoice->name = $this->name;
         $invoice->phone = $this->phone_number;
         $invoice->address = $this->address;
         $invoice->Staddress = $this->Staddress;
         $invoice->save();


         foreach ($this->selectedProducts as $id) {
             $invoiceItem = new InvoiceItem();
             $product = $this->products->find($id);
             $invoiceItem->product_id = $product->id;
             $invoiceItem->price = $product->price;
             $invoiceItem->quantity = $this->quantities[$id];
             $invoiceItem->invoice_id = $invoice->id;
             $invoiceItem->save();
         }

         flash()->addSuccess('Product Purchase Successfully');

        $this->name='';
        // $this->email='';
        $this->phone_number='';
        $this->address='';
        $this->Staddress='';
        $this->selectedProducts = [];
        $this->quantities = [];
        $this->products='';
    }
}
