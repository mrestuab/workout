@extends('app')
@extends('components.navbar.index')
@extends('components.footer.index')

@section('title', 'WORKOUT | Detail')

@section('content')
<div class="bg-gray-100 dark:bg-gray-800 py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                <div class="h-[460px] rounded-lg bg-gray-300 dark:bg-gray-700 mb-4">
                    <img class="w-full h-full object-cover" src="/uploads/{{$product['image']}}" alt="Product Image">
                </div>
            </div>
            <div class="md:flex-1 px-4">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">{{$product['name']}}</h2>
                <div>
                    <span class="font-bold text-gray-700 dark:text-gray-300">Deskripsi:</span>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mt-2">
                    {{$product['description']}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script type="module">
    $(function() {

    });
</script>
@endpush
