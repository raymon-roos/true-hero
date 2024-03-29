<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

$heroes = [
    [
        'name' => 'Pyroclast',
        'superpower' => 'Control over fire',
        'elo_score' => 1850,
        'image_path' => '/img/pyroclast.png',
    ],
    [
        'name' => 'Aeromaster',
        'superpower' => 'Manipulate wind',
        'elo_score' => 1780,
        'image_path' => '/img/aeromaster.png',
    ],
    [
        'name' => 'Titan Guard',
        'superpower' => 'Superhuman strength and durability',
        'elo_score' => 1920,
        'image_path' => '/img/titan-guard.png',
    ],
    [
        'name' => 'Phantom Veil',
        'superpower' => 'Invisibility',
        'elo_score' => 1700,
        'image_path' => '/img/phantom-veil.png',
    ],
    [
        'name' => 'Thunderstrike',
        'superpower' => 'Control over electricity',
        'elo_score' => 1820,
        'image_path' => '/img/thunderstrike.png',
    ],
    [
        'name' => 'Mindwave',
        'superpower' => 'Telekinetic abilities',
        'elo_score' => 1760,
        'image_path' => '/img/mindwave.png',
    ],
    [
        'name' => 'Blitz Runner',
        'superpower' => 'Super speed',
        'elo_score' => 1890,
        'image_path' => '/img/blitzrunner.png',
    ],
];

Route::get('/', fn () => view('leaderboard', ['heroes' => $heroes]));

Route::get('/table', fn () => view('table', ['heroes' => $heroes]));

Route::get('register', fn () => view('index'))
    ->name('register');

Route::get('register-hero', fn () => view('register-hero'))
    ->name('register.hero');
Route::post('register-hero', [RegistrationController::class, 'storeStep1'])
    ->name('register.hero.step1');

Route::get('register-hero/step2', fn () => view('register-hero-step2'))
    ->name('register.hero.step2');
Route::post('register-hero/step2', [RegistrationController::class, 'storeStep2'])
    ->name('register.hero.step2');

Route::get('register-hero/step3', fn () => view('register-hero-step3'))
    ->name('register.hero.step3');
Route::post('register-hero/step3', [RegistrationController::class, 'storeStep3'])
    ->name('register.hero.step3');

Route::get('success', fn () => view('success'))
    ->name('success');
