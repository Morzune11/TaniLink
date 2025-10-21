@extends('layouts.auth')

@section('content')

<div class="flex bg-white rounded-lg shadow-lg overflow-hidden max-w-4xl w-full">
    <!-- Bagian Kiri (Gambar) -->
    <div class="hidden md:block w-1/2 bg-cover bg-center" style="background-image: url('{{ asset('images/photo-1760043208984-fab13723cbe1.jpeg') }}');">
        {{-- Pastikan Anda memiliki gambar ini di folder public/images --}}
    </div>

    <!-- Bagian Kanan (Form Login) -->
    <div class="w-full md:w-1/2 p-8">
{{-- Flash Message --}}
        @if (session('message'))
            <div id="flash-message"  
            class="bg-green-500 text-white px-4 py-3 rounded relative mb-4 cursor-pointer"
            onclick="this.remove()">{{ session('message') }}</div>
        @endif

        @if(session('error'))
            <div id="flash-message" class="bg-red-500 text-white px-4 py-3 rounded relative mb-4 cursor-pointer" onclick="this.remove()">
                {{ session('error') }}
            </div>
        @endif

        <div class="flex items-center mb-6">
            <img src="{{ asset('images/Gemini_Generated_Image_19k4be19k4be19k4.png') }}" alt="TaniLink Logo" class="h-8 w-8 mr-2">
            <h2 class="text-2xl font-semibold text-gray-800">TaniLink</h2>
        </div>
        <p class="text-gray-600 mb-6">Silahkan masukkan email dan password</p>

        <form method="GET" action="{{ route('validateUser') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your email">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your password">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="btn-primary font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                    Login
                </button>
            </div>
        </form>

        <div class="mt-6 text-center">
            <p class="text-gray-600">Don't have an account? <a href="{{ route('register') }}" class="text-green-700 hover:text-green-800 font-bold">Register here</a></p>
        </div>
    </div>
</div>

<script>
    setTimeout(() => {
        const alert = document.querySelector('#flash-message')
            if(alert){
                alert.remove()
                }
    }, 6000);
</script>
@endsection