<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    public $id;
    public function index(){
        return view('dashboard',[
            'totalProducts' => Product::all()->count(),
            'totalOrder' => Invoice::all()->count(),
            'lastInvoice' => Invoice::latest()->first(),
        ]);
    }
}
