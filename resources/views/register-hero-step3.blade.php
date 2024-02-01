@extends('/../layouts.app')

@section('content')
<main class="min-h-screen min-w-screen flex flex-col items-center p-10 bg-black">
    <header class="flex flex-col items-center">
        <h2 class="text-4xl font-extrabold text-gray-50">Hero registration process - 3/3</h2>
        <p class="my-4 text-lg text-gray-500">On this page you will describe your abilities and limitations.</p>
    </header>

    <form action="success">
        <div class="my-6">
            <label for="primary_ability" class="block mb-2 text-sm font-medium text-gray-50">Enter your primary
                ability:</label>
            <input type="text" id="primary_ability"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-50 dark:focus:ring-red-500 dark:focus:border-red-500">
        </div>

        <div class="my-6">
            <label for="secondary_abilities" class="block mb-2 text-sm font-medium text-gray-50">Enter any secondary
                abilities</label>
            <input type="text" id="secondary_abilities"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-50 dark:focus:ring-red-500 dark:focus:border-red-500">
        </div>

        <div class="my-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-50">Enter your limitations</label>
            <input type="text" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-50 dark:focus:ring-red-500 dark:focus:border-red-500"
                placeholder="e.g. I can't jump very high">
        </div>

        <button id="backbutton" type="button"
            class="px-5 py-2.5 text-sm font-medium text-red-600 hover:text-gray-50 border-2 border-red-700 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
            < Previous</button>

                <button type="submit"
                    class="border-2 border-red-700 text-gray-50 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Done</button>
    </form>

    <script>
    let backbuttonElement = document.getElementById("backbutton");

    prevPageLink = window.location.href.replace('page3', 'page2');

    backbuttonElement.addEventListener("click", function() {
        window.location.replace(prevPageLink);
    });
    </script>
</main>
@endsection