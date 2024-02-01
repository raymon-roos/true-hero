<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/table', fn () => view('table', [ 'heroes' => $heroes]));

Route::get('index', fn () => view('index'));

Route::get('page1', fn () => view('page1'));

Route::get('page2', fn () => view('page2'));

Route::get('page3', fn () => view('page3'));

Route::get('success', fn () => view('success'));
