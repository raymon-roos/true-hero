@extends('/../layouts.app')

@section('content')
<main class="relative w-screen h-screen flex flex-col items-center p-10 bg-yellow-50">
    <header class="flex flex-col items-center">
        <h2 class="text-4xl font-extrabold dark:text-white">Hero registration process - 3/3</h2>
        <p class="my-4 text-lg text-gray-500">On this page you will describe your abilities and limitations.</p>
    </header>

    <form action="{{ route('register.step3') }}" method="POST">
        @csrf
        <div class="my-6">
            <label for="primary_ability" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter your
                primary ability:</label>
            <input type="text" id="primary_ability"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500">
        </div>

        <div class="my-6">
            <label for="secondary_abilities" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter
                any secondary abilities</label>
            <input type="text" id="secondary_abilities"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500">
        </div>

        <div class="my-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter your
                limitations</label>
            <input type="text" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                placeholder="e.g. I can't jump very high">
        </div>

        <button type="submit"
            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Done</button>
    </form>
</main>
@endsection