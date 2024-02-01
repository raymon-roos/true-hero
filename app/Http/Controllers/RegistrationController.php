<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hero;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function storeStep1(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'alias' => 'required|max:255|unique:heroes,hero_alias',
            'date_of_birth' => 'required|date',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required',
            'emergency_contact' => 'required',
            'password' => 'required|min:8',
        ]);

        session(['registration.step1' => $validatedData]);

        return redirect()->to('page2');
    }

    public function storeStep2(Request $request)
    {
        $validatedData = $request->validate([
            'origin_story' => 'required|max:300',
            'motivation' => 'required|max:150',
        ]);

        session(['registration.step2' => $validatedData]);

        return redirect()->to('page3');
    }
}