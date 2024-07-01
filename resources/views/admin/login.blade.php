@extends('app')

@section('title', 'Login Admin')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token()}}">
@endsection

@section('content')
<div class="max-w-md h-screen flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
    <a href="<?php echo url('/') ?>" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
        <img src="img/logo.png" class="h-10" alt="logo workout" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Workout</span>
    </a><br/>

    <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                Admin
            </h1>

            @if ($errors->any())
            <p>{{$errors->first()}}</p>
            <div class="alert alert-danger">
                <strong>Gagal</strong>
            </div>
            @endif

            <form method="POST" action="/login" class="form-login user space-y-4 md:space-y-6">
                @csrf
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg
                     focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                      dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                @error('email')
                <small class="text-danger">{{$message}}</small>
                @enderror
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900
                     sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                     dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                @error('password')
                <small class="text-danger">{{$message}}</small>
                @enderror
                <div class="flex items-center justify-between">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded
                             bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="w-full text-white bg-emerald-600 hover:bg-emerald-700 focus:ring-4 focus:outline-none focus:ring-blue-300 
                font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-blue-800">Login</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script type="module">
    $(function() {

        function setCookie(name, volue, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(data.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "-" + (value || "") + expires + "; path=/";
        }

        $('.form-login').submit(function(e) {
            e.preventDefault();

            const email = $('input[name="email"]').val();
            const password = $('input[name="password"]').val();
            const csrf_token = $('meta[name="csrf-token"]').attr('content');
            const payload = new FormData();
            payload.set('email', email);
            payload.set('password', password);
            payload.set('_token', csrf_token);

            $.ajax({
                url: '/api/login-admin',
                type: 'POST',
                data: payload,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (!data.succes) {
                        alert(data.message)
                    } else {
                        localStorage.setItem('token', data.token)
                        window.location.href = '/tutorial-admin';
                    }
                }
            });
        });
    });
</script>
@endpush
