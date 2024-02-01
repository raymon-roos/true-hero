@extends('/../layouts.app')

@section('content')
<main class="min-h-screen min-w-screen flex flex-col items-center p-10 bg-black">
    <header class="flex flex-col items-center">
        <h2 class="text-4xl font-extrabold text-gray-50">Hero registration process - 2/3</h2>
        <p class="my-4 text-lg text-gray-500">On this page you will describe how you came to this point; your origin
            story and your motivation for becoming a hero. <em>Try to keep it short and clear.</em></p>
    </header>

    <form action="{{ route('register.hero.step2') }}" method="POST">
        @csrf
        <div class="my-6">
            <label for="origin_story" class="block mb-2 text-sm font-medium text-gray-50">Write your origin story
                here:</label>
            <textarea id="origin_story" name="origin_story" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"></textarea>
            <p id="emergency_contact-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Max. 300 words
            </p>
        </div>

        <div class="my-6">
            <label for="motivation" class="block mb-2 text-sm font-medium text-gray-50">Write your motivation for
                heroism here:</label>
            <textarea id="motivation" name="motivation" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"></textarea>
            <p id="emergency_contact-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Max. 150 words
            </p>
        </div>

        <button id="backbutton" type="button"
            class="px-5 py-2.5 text-sm font-medium text-red-600 hover:text-gray-50 border-2 border-red-700 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
            < Previous</button>

                <button type="submit"
                    class="text-gray-50 border-2 border-red-700 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Next
                    ></button>
    </form>

    <script>
    let backstoryElement = document.getElementById('origin_story');
    let backstoryElementClassName = backstoryElement.className;

    const errorClassName =
        "bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500";

    let errorElementB = document.createElement('p');
    errorElementB.className = "mt-2 text-sm text-red-600 dark:text-red-500";
    errorElementB.innerText = "You have exceeded the maximum word limit.";

    backstoryElement.after(errorElementB);

    errorElementB.style.display = 'none';

    backstoryElement.addEventListener('input', function() {
        if (backstoryElement.value.split(' ').length > 300) {
            backstoryElement.className = errorClassName;
            errorElementB.style.display = 'block';
        } else {
            backstoryElement.className = backstoryElementClassName;
            errorElementB.style.display = 'none';
        }
    });

    let motivationElement = document.getElementById('motivation');
    let motivationElementClassName = motivationElement.className;

    let errorElementM = document.createElement('p');
    errorElementM.className = "mt-2 text-sm text-red-600 dark:text-red-500";
    errorElementM.innerText = "You have exceeded the maximum word limit.";

    motivationElement.after(errorElementM);

    errorElementM.style.display = 'none';

    motivationElement.addEventListener('input', function() {
        if (motivationElement.value.split(' ').length > 150) {
            motivationElement.className = errorClassName;
            errorElementM.style.display = 'block';
        } else {
            motivationElement.className = motivationElementClassName;
            errorElementM.style.display = 'none';
        }
    });

    let backbuttonElement = document.getElementById("backbutton");
    backbuttonElement.addEventListener("click", function() {
        window.location.href = '{{ route("register.hero") }}';
    });
    </script>
</main>
@endsection