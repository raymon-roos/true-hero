@extends('/../layouts.app')

@section('content')
<main class="min-h-screen min-w-screen flex flex-col items-center p-10 bg-black">
    <header class="flex flex-col items-center">
        <h2 class="text-4xl font-extrabold text-gray-50">Hero registration process - 1/3</h2>
        <p class="my-4 text-lg text-gray-500">On this page you will enter contact information and basic information such
            as your name, alias etc...</p>
    </header>

    <form action="{{ route('register.step1') }}" method="POST">
        @csrf
        <div class="my-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-50 dark:text-gray-50">Legal name:</label>
            <input type="text" id="name"
                class="varchar bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-50 dark:focus:ring-red-500 dark:focus:border-red-500"
                placeholder="John Doe">
        </div>

        <div class="my-6">
            <label for="alias" class="block mb-2 text-sm font-medium text-gray-50 dark:text-gray-50">Hero alias:</label>
            <input type="text" id="alias"
                class="varchar bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-50 dark:focus:ring-red-500 dark:focus:border-red-500">
            <p id="alias-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">This is the name you want to
                go by publicly as a hero.</p>
        </div>

        <div class="my-6">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password:</label>
            <input type="password" id="password" name="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                required>
        </div>

        <div class="my-6">
            <label for="date_of_birth" class="block mb-2 text-sm font-medium text-gray-50 dark:text-gray-50">Date of
                birth:</label>
            <input type="date" id="date_of_birth"
                class="int bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-50 dark:focus:ring-red-500 dark:focus:border-red-500">
        </div>

        <h4 class="text-2xl font-bold dark:text-gray-50">Contact info</h4>

        <div class="my-6 mt-3">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-50 dark:text-gray-50">Primary
                email:</label>
            <input type="email" id="email"
                class="varchar bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-50 dark:focus:ring-red-500 dark:focus:border-red-500"
                placeholder="johndoe@gmail.com">
        </div>

        <div class="my-6">
            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-50 dark:text-gray-50">Phone
                number:</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                        <path
                            d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z" />
                    </svg>
                </div>
                <input type="text" id="phone_number"
                    class="varchar bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-50 dark:focus:ring-red-500 dark:focus:border-red-500"
                    pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
            </div>
        </div>

        <div class="my-6">
            <label for="emergency_contact"
                class="block mb-2 text-sm font-medium text-gray-50 dark:text-gray-50">Emergency contact:</label>
            <input type="text" id="emergency_contact"
                class="varchar bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-50 dark:focus:ring-red-500 dark:focus:border-red-500">
            <p id="emergency_contact-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Enter any way
                for us to contact somebody you know.</p>
        </div>

        <button type="submit"
            class="text-gray-50 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Next
            ></button>
    </form>
</main>
@endsection