<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->take(12)->get();

        return response()->json([
            'products'=>$products
        ]);
    }
    public function order(Request $request){
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'phone_number'=>'required',
            'address' =>'required',
            'Staddress'=>'required',
            'selectedProducts'=>'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $invoice = new Invoice();
        $invoice->name = $request->name;
        $invoice->phone = $request->phone_number;
        $invoice->address = $request->address;
        $invoice->Staddress = $request->Staddress;
        $invoice->save();


        foreach ($request->selectedProducts as $s_product) {
            $product = Product::findOrFail($s_product['id']);
            $invoiceItem = new InvoiceItem();
            $invoiceItem->product_id = $product->id;
            $invoiceItem->price = $product->price;
            $invoiceItem->quantity = $s_product['quantity'];
            $invoiceItem->invoice_id = $invoice->id;
            $invoiceItem->save();
        }
      return response()->json(['message' =>'Product Order Successfully']);
    }
}

