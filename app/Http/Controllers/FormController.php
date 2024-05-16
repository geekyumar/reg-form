<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormData;

class FormController extends Controller
{
    public function validateForm(Request $request)
    {
         try{
         $validatedData = $request->validate([
            'name' => 'required|alpha',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits_between:7,12',
            'dob' => 'required',
            'address' => 'required'
        ]);

        $formData = new FormData();
        $formData->fill($validatedData);
        $formData->save();

        return response()->json(['message' => 'Form submitted successfully'], 200);
    } catch (\Exception $e){
        return response()->json(['message' => $e->getMessage()], 500);
    }
    }
    
}
