@extends('layouts.app')

@section('content')
    <main class="relative w-screen h-screen">
        <div id="indicators-carousel" class="relative w-full h-[100vh]" data-carousel="static">
            <!-- Carousel wrapper -->
            <div class="relative h-full overflow-hidden p-8">
                @foreach ($heroes as $key => $hero)
                    <!-- Item 1 -->
                    @if ($key == 0)
                        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                        @else
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    @endif
                    <div x-data="{ open: false }" class="absolute z-40 top-10 left-20">
                        <div @mouseover="open = true" @mouseover.away="open = false" class="ease-in-out duration-500">
                            <h1
                                class="text-4xl font-extrabold cursor-pointer bg-red-800 ease-in-out duration-500 hover:translate-x-3 mb-1 text-white px-2 py-4 rounded-bl-lg border-2 border-black rounded-tr-lg z-100 opacity-100 blur-none">
                                ☰ Leaderboard</h1>
                            <a href="/"><h1 x-show="open"
                                class="text-4xl font-extrabold cursor-pointer bg-red-800 ease-in-out duration-500 hover:translate-x-3 mb-1 text-white px-2 py-4 rounded-bl-lg border-2 border-black rounded-tr-lg z-100 opacity-100 blur-none">
                                Slider</h1></a>
                            <a href="/table"><h1 x-show="open"
                                class="text-4xl font-extrabold cursor-pointer bg-red-800 ease-in-out duration-500 hover:translate-x-3 mb-1 text-white px-2 py-4 rounded-bl-lg border-2 border-black rounded-tr-lg z-100 opacity-100 blur-none">
                                Table</h1></a>
                            <a href="/dashboard"><h1 x-show="open"
                                class="text-4xl font-extrabold cursor-pointer bg-red-800 ease-in-out duration-500 hover:translate-x-3 mb-1 text-white px-2 py-4 rounded-bl-lg border-2 border-black rounded-tr-lg z-100 opacity-100 blur-none">
                                Dashboard</h1></a>
                            <a href="/register"><h1 x-show="open"
                                class="text-4xl font-extrabold cursor-pointer bg-red-800 ease-in-out duration-500 hover:translate-x-3 mb-1 text-white px-2 py-4 rounded-bl-lg border-2 border-black rounded-tr-lg z-100 opacity-100 blur-none">
                                Register</h1></a>
                        </div>
                    </div>
                    <div class="absolute z-40 top-10 right-20">
                        <h1
                            class="flex text-9xl font-extrabold bg-red-800 ease-in-out duration-500 hover:scale-125 text-white px-2 py-4 rounded-bl-lg border-2 border-black rounded-tr-lg z-100 opacity-100 blur-none">
                            #{{ $key + 1 }} </h1>
                    </div>
                    <img src="{{ asset($hero['image_path']) }}"
                        class="background-image absolute z-10 w-[100vw] opacity-70 blur-2xl block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 duration-300 ease-in-out delay-500"
                        alt="{{ $hero['name'] }}">
                    <img src="{{ asset($hero['image_path']) }}"
                        class="image absolute h-[80vh] z-30 block shadow-xl object-contain rounded-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 duration-300 ease-in-out delay-200"
                        alt="{{ $hero['name'] }}">
                    <div
                        class="description absolute bg-opacity-15 duration-200 delay-75 ease-in-out w-[40vw] h-[50vh] bg-red-800 border-2 border-black z-20 block -translate-x-3/4 -translate-y-2/4 top-1/2 left-2/4 rounded-bl-xl rounded-tr-lg">
                        <div class="flex items-center w-full h-full">
                            <h1 class="flex text-white text-6xl font-extrabold p-2"> {{ $hero['name'] }} </h1>
                            <div class="flex justify-between w-1/3 flex-row ml-12">
                                <div class="flex flex-col">
                                    <h2 class="text-white text-2xl font-extrabold p-2">ELO:</h2>
                                    <h1 class="text-white text-2xl font-extrabold p-2">{{ $hero['elo_score'] }} </h1>
                                    <h2 class="text-white text-2xl font-extrabold p-2">POWER:</h2>
                                    <h1 class="text-white text-2xl font-extrabold p-2">{{ $hero['superpower'] }} </h1>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
        <div
            class="absolute bg-red-800 text-white p-2 z-20 flex overflow-x-scroll rounded-bl-lg rounded-tr-lg border-2 border-black overflow-y-hidden -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2 blur-none">
            @for ($i = 0; $i < count($heroes); $i++)
                <button onClick="changeBackground({{ $i }})" type="button"
                    class="flex !w-6 !h-8 px-6 py-3 !bg-red-800 ease-in-out duration-100 hover:scale-125 !text-white blur-none justify-center items-center opacity-100 z-20 text-center"
                    aria-current="true" aria-label="Slide {{ $i }}"
                    data-carousel-slide-to="{{ $i }}">{{ $i + 1 }}</button>
            @endfor
        </div>
        <!-- Slider controls -->
        <button onClick="changeBackground('back')" type="button"
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-red-800 ease-in-out duration-200 hover:scale-125 text-white group-focus:outline-none">
                <svg class="w-4 h-4 bg-red-800 ease-in-out duration-200 hover:scale-125 text-white rtl:rotate-180"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button onClick="changeBackground('next')" type="button"
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-red-800 ease-in-out duration-200 hover:scale-125 text-white group-focus:outline-none">
                <svg class="w-4 h-4 bg-red-800 ease-in-out duration-200 hover:scale-125 text-white rtl:rotate-180"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
        </div>
    </main>
    <script>
        const background = document.querySelectorAll('.background-image')
        const description = document.querySelectorAll('.description')
        const image = document.querySelectorAll('.image')

        let currentSlide = 0

        changeBackground('begin')
        bounceImage()

        function changeBackground(direction) {
            if (direction != 'begin' && !Number.isInteger(direction)) {
                if (direction === 'next' && currentSlide === background.length - 1) {
                    currentSlide = 0
                } else if (direction === 'back' && currentSlide === 0) {
                    currentSlide = background.length - 1
                } else {
                    direction === 'next' ? currentSlide++ : currentSlide--
                }
            }

            if (Number.isInteger(direction)) {
                console.log(direction)
                currentSlide = direction
            }

            [image[currentSlide], description[currentSlide]].forEach(element => {
                element.addEventListener('mouseover', function() {
                    image[currentSlide].classList.add('translate-x-1', 'mix-blend-screen');
                    background[currentSlide].classList.add('animate-pulse')
                    description[currentSlide].classList.remove('bg-opacity-15')
                    description[currentSlide].classList.add('bg-opacity-100')
                })
            });

            [image[currentSlide], description[currentSlide]].forEach(element => {
                element.addEventListener('mouseout', function() {
                    image[currentSlide].classList.remove('translate-x-1', 'mix-blend-screen');
                    background[currentSlide].classList.remove('animate-pulse')
                    description[currentSlide].classList.remove('bg-opacity-100')
                    description[currentSlide].classList.add('bg-opacity-15')
                })
            });
        }

        function bounceImage() {
            image[currentSlide].classList.add('animate-pulse')
            setTimeout(function() {
                image[currentSlide].classList.remove('animate-pulse')
            }, 1750)
        }
    </script>
@endsection
