@extends('layouts.app')

@section('content')
    <main>
        <div x-data="{ open: false }" class="absolute z-40 top-10 left-20">
            <div @mouseover="open = true" @mouseover.away="open = false" class="ease-in-out duration-500">
                <h1
                    class="text-4xl font-extrabold cursor-pointer bg-red-800 ease-in-out duration-500 hover:translate-x-3 mb-1 text-white px-2 py-4 rounded-bl-lg border-2 border-black rounded-tr-lg z-100 opacity-100 blur-none">
                    ☰ Leaderboard</h1>
                <a href="/">
                    <h1 x-show="open"
                        class="text-4xl font-extrabold cursor-pointer bg-red-800 ease-in-out duration-500 hover:translate-x-3 mb-1 text-white px-2 py-4 rounded-bl-lg border-2 border-black rounded-tr-lg z-100 opacity-100 blur-none">
                        Slider</h1>
                </a>
                <a href="/table">
                    <h1 x-show="open"
                        class="text-4xl font-extrabold cursor-pointer bg-red-800 ease-in-out duration-500 hover:translate-x-3 mb-1 text-white px-2 py-4 rounded-bl-lg border-2 border-black rounded-tr-lg z-100 opacity-100 blur-none">
                        Table</h1>
                </a>
                <a href="/admin">
                    <h1 x-show="open"
                        class="text-4xl font-extrabold cursor-pointer bg-red-800 ease-in-out duration-500 hover:translate-x-3 mb-1 text-white px-2 py-4 rounded-bl-lg border-2 border-black rounded-tr-lg z-100 opacity-100 blur-none">
                        Dashboard</h1>
                </a>
                <a href="/register">
                    <h1 x-show="open"
                        class="text-4xl font-extrabold cursor-pointer bg-red-800 ease-in-out duration-500 hover:translate-x-3 mb-1 text-white px-2 py-4 rounded-bl-lg border-2 border-black rounded-tr-lg z-100 opacity-100 blur-none">
                        Register</h1>
                </a>
            </div>
        </div>

        <div class="w-screen h-screen flex justify-center">
            <!-- Flowbite component -->
            <div class="relative overflow-auto shadow-md">
                <!-- ... Other Components like Search Bar ... -->
                <table class="w-full text-sm text-left rtl:text-right text-white bg-red-800 bg-opacity-90">
                    <thead class="text-xs text-white uppercase">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-3xl font-extrabold">Name</th>
                            <th scope="col" class="px-6 py-3 text-3xl font-extrabold">ELO</th>
                            <th scope="col" class="px-6 py-3 text-3xl font-extrabold">Superpower</th>
                            <th scope="col" class="px-6 py-3 text-3xl font-extrabold">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($heroes as $hero)
                            <tr class="">
                                <td class="px-6 py-4 text-2xl font-bold">{{ $hero['name'] }}</td>
                                <td class="px-6 py-4 text-2xl font-bold">{{ $hero['elo_score'] }}</td>
                                <td class="px-6 py-4 text-2xl font-bold">{{ $hero['superpower'] }}</td>
                                <td class="px-6 py-4 text-2xl font-bold">
                                    <img class="w-40 h-40 rounded-full" src="{{ asset($hero['image_path']) }}"
                                        alt="{{ $hero['name'] }}">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const imageCells = document.querySelectorAll('td img'); // Select all td elements containing images

            imageCells.forEach(img => {
                img.parentElement.addEventListener('mouseover', function() {
                    const imageUrl = img.src;
                    document.body.style.backgroundImage = `url('${imageUrl}')`;
                    document.body.style.backgroundSize =
                    'cover'; // Adjust this as per your requirement
                });

                img.parentElement.addEventListener('mouseout', function() {
                    document.body.style.backgroundImage =
                    'none'; // Reset the background on mouseout
                });
            });
        });
    </script>
@endsection
