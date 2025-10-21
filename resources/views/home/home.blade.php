@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto py-8">
    <!-- Notifikasi Welcome -->
    {{-- <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded flex justify-between items-center" role="alert">
        <p class="font-bold flex items-center">
            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            Welcome back to TaniLink!
        </p>
        <span class="text-xs">Just now</span>
    </div> --}}
    {{-- Flash Message --}}
    @if(session('success'))
    <div id="flash-message"
    class="bg-green-500 text-white px-4 py-3 rounded relative mb-4 cursor-pointer" onclick="this.remove()">
    <p class="font-bold flex items-center">
            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            {{ session('success') }}
        </p>
    </div>
    @endif

    <!-- Tombol Create New Post -->
    <div class="mb-6">
        <button class="btn-primary font-bold py-2 px-4 rounded-lg w-full flex items-center justify-center text-lg" onclick="document.getElementById('createPostModal').classList.remove('hidden')">
            <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Create New Post
        </button>
    </div>

    <!-- Contoh Postingan -->
    @foreach ($posts as $post)   
    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <div class="flex items-center mb-4">
            <img class="h-10 w-10 rounded-full mr-3" src="images/{{ $post->user->profile_picture }}" alt="user avatar">
            <div>
                <p class="font-semibold text-gray-800">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500">{{ $post->created_at }}</p>
            </div>
        </div>
        <p class="text-gray-700 mb-4">{{ $post->content }}]</p>
        <img class="w-full h-auto rounded-lg" src="{{ asset( 'storage/' .$post->image) }}" alt="Harvest Season">
    </div>
    @endforeach

    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <div class="flex items-center mb-4">
            <img class="h-10 w-10 rounded-full mr-3" src="images/3864.jpg_wh860.jpg" alt="Pak Hartono Avatar">
            <div>
                <p class="font-semibold text-gray-800">Pak Hartono</p>
                <p class="text-sm text-gray-500">baru saja</p>
            </div>
        </div>
        <p class="text-gray-700 mb-4">Gonanku yo panen Lur! Sayurku tukul apik kabeh musim iki.</p>
        <img class="w-full h-auto rounded-lg" src="{{ asset('images/istockphoto-1445991334-612x612.jpg') }}" alt="Harvest Season">
    </div>

    <!-- Modal Create New Post (disembunyikan secara default) -->
   <div id="createPostModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Create New Post</h3>

        <!-- Tombol Close -->
        <div class="absolute top-0 right-0 p-4">
            <button onclick="document.getElementById('createPostModal').classList.add('hidden')" 
                    class="text-gray-400 hover:text-gray-600">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- FORM POST -->
        <form action="{{ route('postStore') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Jenis Post -->
            <div class="mb-4 flex space-x-2">
                <button type="button" 
                        onclick="togglePostType('image')" 
                        id="btnImage" 
                        class="flex-1 py-2 px-4 rounded-md bg-green-500 text-white font-medium">
                    Image
                </button>
                <button type="button" 
                        onclick="togglePostType('video')" 
                        id="btnVideo" 
                        class="flex-1 py-2 px-4 rounded-md border border-gray-300 text-gray-700 font-medium">
                    Video
                </button>
            </div>

            <!-- Input untuk Image -->
            <div id="imageField" class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Upload Image</label>
                <input type="file" name="image" id="image" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
            </div>

            <!-- Input untuk Video -->
            <div id="videoField" class="mb-4 hidden">
                <label for="video" class="block text-sm font-medium text-gray-700">Upload Video</label>
                <input type="file" name="video" id="video" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
            </div>

            <!-- Caption -->
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Caption</label>
                <textarea name="content" id="content" rows="3" 
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                          placeholder="Write your caption here..."></textarea>
            </div>

            <!-- Tombol -->
            <div class="flex justify-end space-x-2 mt-4">
                <button type="button" 
                        onclick="document.getElementById('createPostModal').classList.add('hidden')" 
                        class="py-2 px-4 rounded-md border border-gray-300 text-gray-700 font-medium">
                    Cancel
                </button>
                <button type="submit" 
                        class="py-2 px-4 rounded-md bg-green-500 text-white font-medium">
                    Post
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function togglePostType(type) {
        const imageField = document.getElementById('imageField');
        const videoField = document.getElementById('videoField');
        const btnImage = document.getElementById('btnImage');
        const btnVideo = document.getElementById('btnVideo');

        if (type === 'image') {
            imageField.classList.remove('hidden');
            videoField.classList.add('hidden');
            btnImage.classList.add('bg-green-500', 'text-white');
            btnVideo.classList.remove('bg-green-500', 'text-white');
        } else {
            videoField.classList.remove('hidden');
            imageField.classList.add('hidden');
            btnVideo.classList.add('bg-green-500', 'text-white');
            btnImage.classList.remove('bg-green-500', 'text-white');
        }
    }
</script>


</div>
<script>
    setTimeout(() => {
        const flashMessage = document.querySelector('#flash-message')
        if(flashMessage){
            flashMessage.remove()
        }
    }, 6000);
</script>
@endsection