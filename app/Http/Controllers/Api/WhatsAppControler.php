<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\WhatsApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WhatsAppControler extends Controller
{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|integer|unique:whats_apps',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $whatsApp = new WhatsApp();
        $whatsApp->phone_number = $request->phone_number;
        $whatsApp->save();
        return response()->json(['message' =>'WhatsApp Number Send Successfully']);
    }
}
