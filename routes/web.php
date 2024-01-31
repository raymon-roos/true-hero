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

Route::get('/', function () {
    return view('leaderboard', [
        'heroes' => [
                [
                    "name" => "Pyroclast",
                    "superpower" => "Control over fire",
                    "elo_score" => 1850,
                    "image_path" => "/img/pyroclast.png"
                ],
                [
                    "name" => "Aeromaster",
                    "superpower" => "Manipulate wind",
                    "elo_score" => 1780,
                    "image_path" => "/img/aeromaster.png"
                ],
                [
                    "name" => "Titan Guard",
                    "superpower" => "Superhuman strength and durability",
                    "elo_score" => 1920,
                    "image_path" => "/img/titan-guard.png"
                ],
                [
                    "name" => "Phantom Veil",
                    "superpower" => "Invisibility",
                    "elo_score" => 1700,
                    "image_path" => "/img/phantom-veil.png"
                ],
                [
                    "name" => "Thunderstrike",
                    "superpower" => "Control over electricity",
                    "elo_score" => 1820,
                    "image_path" => "/img/thunderstrike.png"    
                ],
                [
                    "name" => "Mindwave",
                    "superpower" => "Telekinetic abilities",
                    "elo_score" => 1760,
                    "image_path" => "/img/mindwave.png"
                ],
                [
                    "name" => "Blitz Runner",
                    "superpower" => "Super speed",
                    "elo_score" => 1890,
                    "image_path" => "/img/blitzrunner.png"
                ],
                // [
                //     "name" => "Beastmorph",
                //     "superpower" => "Transform into any animal",
                //     "elo_score" => 1800,
                //     "image_path" => "/img/beastmorph.png"
                // ],
                // [
                //     "name" => "Time Weaver",
                //     "superpower" => "Manipulate time",
                //     "elo_score" => 1950,
                //     "image_path" => "/img/time-weaver.png"
                // ],
                // [
                //     "name" => "Luminance",
                //     "superpower" => "Light manipulation",
                //     "elo_score" => 1880,
                //     "image_path" => "/img/luminance.png"
                // ]
            ]
        ]);
    });

    Route::get('index', function() {
        return view('index');
    });

    Route::get('page1', function() {
        return view('page1');
    });

    Route::get('page2', function() {
        return view('page2');
    });

    Route::get('page3', function() {
        return view('page3');
    });

    Route::get('success', function() {
        return view('success');
    });

    