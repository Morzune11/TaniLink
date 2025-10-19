@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-8">
    <!-- Notifikasi Welcome -->
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded flex justify-between items-center" role="alert">
        <p class="font-bold flex items-center">
            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            Welcome back to TaniLink!
        </p>
        <span class="text-xs">Just now</span>
    </div>

    <!-- Tombol Create New Post -->
    <div class="mb-6">
        <button class="btn-primary font-bold py-2 px-4 rounded-lg w-full flex items-center justify-center text-lg" onclick="document.getElementById('createPostModal').classList.remove('hidden')">
            <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Create New Post
        </button>
    </div>

    <!-- Contoh Postingan -->
    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <div class="flex items-center mb-4">
            <img class="h-10 w-10 rounded-full mr-3" src="images/1000_F_250101768_Qhn6oFRCgQArmI5Ov5EY3EOtYTTHpOg5.jpg" alt="Pak Sutomo Avatar">
            <div>
                <p class="font-semibold text-gray-800">Pak Sutomo</p>
                <p class="text-sm text-gray-500">5 jam yang lalu</p>
            </div>
        </div>
        <p class="text-gray-700 mb-4">Musim panen Lur! 🌾 Sawahku panen gedhe lur, mantep tenan... Suwun sedulur, sampun ngrewangi kanthi saged ngenteniki.</p>
        <img class="w-full h-auto rounded-lg" src="{{ asset('images/istockphoto-802459740-612x612.jpg') }}" alt="Harvest Season">
    </div>

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
            <div class="absolute top-0 right-0 p-4">
                <button onclick="document.getElementById('createPostModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div>
                <div class="mb-4 flex space-x-2">
                    <button class="flex-1 py-2 px-4 rounded-md btn-primary font-medium">Image</button>
                    <button class="flex-1 py-2 px-4 rounded-md border border-gray-300 text-gray-700 font-medium btn-secondary">Video</button>
                </div>
                <div class="mb-4">
                    <label for="imageUrl" class="block text-sm font-medium text-gray-700">Image URL</label>
                    <input type="text" id="imageUrl" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50" placeholder="Enter image URL">
                </div>
                <div class="mb-4">
                    <label for="caption" class="block text-sm font-medium text-gray-700">Caption</label>
                    <textarea id="caption" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50" placeholder="Write your caption here..."></textarea>
                </div>
                <div class="flex justify-end space-x-2 mt-4">
                    <button onclick="document.getElementById('createPostModal').classList.add('hidden')" class="py-2 px-4 rounded-md btn-secondary font-medium">Cancel</button>
                    <button class="py-2 px-4 rounded-md btn-primary font-medium">Post</button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection