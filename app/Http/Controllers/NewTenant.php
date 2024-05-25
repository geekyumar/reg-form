<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;

class NewTenant extends Controller
{
    public function NewTenant(Request $request)
    {
         try{
         $validatedData = $request->validate([
            'id' => 'required',
            'database' => 'required',
        ]);

        $formData = new Tenant();
        $formData->fill($validatedData);
        $formData->save();

        return response()->json(['message' => 'Form submitted successfully'], 200);
    } catch (\Exception $e){
        return response()->json(['message' => $e->getMessage()], 500);
    }
    }
}
