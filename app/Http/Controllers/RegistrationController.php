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

    public function storeStep3(Request $request)
    {
        $registrationData = array_merge(session('registration.step1'), session('registration.step2'));

        $validatedData = $request->validate([
            'primary_ability' => 'required|max:255',
            'secondary_abilities' => 'nullable|max:255',
            'superpower' => 'required|max:255',
        ]);

        $user = User::create([
            'email' => $registrationData['email'],
            'password' => Hash::make($registrationData['password']),
            'first_name' => explode(' ', $registrationData['name'], 2)[0],
            'last_name' => explode(' ', $registrationData['name'], 2)[1] ?? '',
            'date_of_birth' => $registrationData['date_of_birth'],
            'phone_number' => $registrationData['phone_number'],
        ]);

        Hero::create([
            'user_id' => $user->id,
            'hero_alias' => $registrationData['alias'],
            'superpower' => $validatedData['superpower'],
            'profile_picture' => '',
            'emergency_contact' => $registrationData['emergency_contact'],
            'backstory' => $registrationData['origin_story'],
            'motivation' => $registrationData['motivation'],
            'elo_rating' => 1200,
            'hero_rating' => 'C',
        ]);

        session()->forget(['registration.step1', 'registration.step2']);

        return redirect()->to('success');
    }
}