@extends('app')
@extends('components.navbar.index')
@extends('components.footer.index')

@section('title', 'Workout')

@section('content')
<div id="default-carousel" class="relative w-full" data-carousel="slide">
    <div class="relative h-36 overflow-hidden md:h-96">
        @foreach ($data['banner'] as $banner)
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="/uploads/{{$banner['image']}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        @endforeach
    </div>
      
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
    </div>
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 
        dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60
         group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
<div class="py-10 md:py-20 sm:py-32 sm:overflow-x-auto sm:flex">
        <div class="flex flex-col md:flex-row justify-center items-center md:flex-none min-w-full sm:px-6 lg:px-8 gap-y-16 gap-x-10">
            @foreach ($data['categories'] as $category)
            <a id="" href="<?php echo url('products/' . $category['id']) ?>" class="p-4 md:p-0 flex-none w-[23.625rem] max-w-full">
                <div class="relative bg-slate-200 ring-1 ring-slate-900/5 overflow-hidden shadow-md shadow-slate-700/5">
                    <img alt="{{$category['name']}}" loading="lazy" width="750" height="1624"
                        decoding="async" data-nimg="1" class=""
                        style="color:transparent" src="/uploads/{{$category['image']}}">
                    <span class="drop-shadow-md absolute text-center text-3xl w-full top-[15%] text-black">{{$category['name']}}</span>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
