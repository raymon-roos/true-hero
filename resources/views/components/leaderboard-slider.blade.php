<div id="indicators-carousel" class="relative w-full h-[100vh]" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative h-full overflow rounded-lg p-8">
        @foreach($heroes as $key => $hero)
         <!-- Item 1 -->
         @if ($key == 0)
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
        @else
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
        @endif
                <img src="{{ asset($hero['image_path']) }}" class="absolute z-10 w-[150vw] opacity-65 blur-2xl block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="{{ $hero['name'] }}">
                <img src="{{ asset($hero['image_path']) }}" class="absolute h-[80vh] z-20 block border border-black shadow-xl object-contain rounded-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="{{ $hero['name'] }}">
            </div>
        @endforeach
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
        @for($i = 0; $i < count($heroes); $i++)
            <button type="button" class="flex px-6 py-3 rounded-full text-white bg-black blur-none opacity-100 z-20" aria-current="true" aria-label="Slide {{ $i }}" data-carousel-slide-to="{{ $i }}">{{ $i + 1 }}</button>
        @endfor
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
