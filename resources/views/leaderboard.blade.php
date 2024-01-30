@extends('layouts.app')

@section('content')
    <main class="relative w-screen h-screen">
        <div id="indicators-carousel" class="relative w-full h-[100vh]" data-carousel="static">
            <!-- Carousel wrapper -->
            <div class="relative h-full overflow-hidden p-8">
                @foreach($heroes as $key => $hero)
                 <!-- Item 1 -->
                 @if ($key == 0)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                @else
                    <div x-data="{open: false}" class="hidden duration-700 ease-in-out" data-carousel-item>
                @endif
                        <div class="absolute z-40 top-10 left-20">
                            <h1 class="text-4xl font-extrabold bg-red-800 ease-in-out duration-500 hover:scale-125 text-white px-2 py-4 rounded-bl-lg border-2 border-black rounded-tr-lg z-100 opacity-100 blur-none">Leaderboard</h1>
                        </div>
                        <div class="absolute z-40 top-10 right-20">
                            <h1 class="flex text-9xl font-extrabold bg-red-800 ease-in-out duration-500 hover:scale-125 text-white px-2 py-4 rounded-bl-lg border-2 border-black rounded-tr-lg z-100 opacity-100 blur-none"> #{{ $key + 1 }} </h1>
                        </div>
                        <img src="{{ asset($hero['image_path']) }}" class="absolute z-10 w-[150vw] opacity-70 blur-2xl block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="{{ $hero['name'] }}">
                        <img @mouseover="open = true" src="{{ asset($hero['image_path']) }}" class="absolute h-[80vh] hover:translate-x-2 ease-in-out duration-500 hover:scale-110 z-30 block shadow-xl object-contain rounded-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="{{ $hero['name'] }}">
                        <div x-show="open" x-transition.scale.origin.10 class="absolute bg-opacity-15 mx-auto w-[60vw] h-[50vh] bg-red-800 border-2 border-black z-20 block -translate-x-3/4 -translate-y-2/4 top-1/2 left-1/2 rounded-bl-xl rounded-tr-lg">
                            <h1 class="text-white text-6xl font-extrabold p-2"> {{ $hero['name'] }} </h1>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-red-800 ease-in-out duration-200 hover:scale-125 text-white group-focus:outline-none">
                    <svg class="w-4 h-4 bg-red-800 ease-in-out duration-200 hover:scale-125 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-red-800 ease-in-out duration-200 hover:scale-125 text-white group-focus:outline-none">
                    <svg class="w-4 h-4 bg-red-800 ease-in-out duration-200 hover:scale-125 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>        
    </main>
@endsection
