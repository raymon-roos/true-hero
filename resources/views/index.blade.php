@extends('/../layouts.app')

@section('content')
<main class="min-h-screen min-w-screen flex flex-col items-center p-10 bg-black">
    <h1
        class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-50 md:text-5xl lg:text-6xl dark:text-white">
        Hero Registration Form</h1>
    <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Click below to
        start.</p>
    <a href="/register-hero"
        class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-50 bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
        Start
        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M1 5h12m0 0L9 1m4 4L9 9" />
        </svg>
    </a>
</main>
@endsection