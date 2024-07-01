@extends('app')
@extends('components.navbar.index')
@extends('components.footer.index')

@section('title', 'WORKOUT | tutorial')

@section('content')

<div class="justify-center grid md:grid-cols-4 grid-cols-1 gap-8 max-w-screen-xl mx-auto my-10 px-4" id="product-container">

</div>
@endsection

@push('js')
<script type="module">
    $(function() {
        $.ajax({
            url: '/api/products',
            success: function({
                data
            }) {

                let row = '';
                data.map(function(val, index) {
                    row += `
                    <div class="max-w-xs p-6 cursor-pointer m-auto hover:shadow-md bg-white border-gray-200">
                        <a href="<?php echo url('product/${val.id}"') ?>">
                            <img src="/uploads/${val.image}" alt="laptop" class="m-auto">
                            <a href="<?php echo url('product/${val.id}') ?>">
                                <h5 class="mb-2 text-sm tracking-tight text-gray-900 dark:text-white">${val.name}</h5>
                            </a>
                        </a>
                    </div>
                    `;
                });
                console.log('🚀 ~ file: products.blade.php:41 ~ row:', row);

                $('#product-container').append(row)
            }
</script>
@endpush
