@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6 px-4 sm:px-0">Edit Profile</h1>

    <div class="bg-white rounded-lg shadow p-6">
        <form>
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input type="text" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="John" placeholder="Your Name">
            </div>
            <div class="mb-4">
                <label for="bio" class="block text-gray-700 text-sm font-bold mb-2">Bio</label>
                <textarea id="bio" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="4" placeholder="Tell us about yourself or your farm">Organic farmer from Central Java</textarea>
            </div>
            <div class="mb-6">
                <label for="avatar_url" class="block text-gray-700 text-sm font-bold mb-2">Avatar URL</label>
                <input type="text" id="avatar_url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="https://images.unsplash.com/photo-1535713875002-d1d0cf8c95b1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" placeholder="Enter image URL for your avatar">
                <div class="mt-4 flex justify-center">
                    <img id="avatar_preview" class="h-24 w-24 rounded-full object-cover border-2 border-gray-300" src="https://images.unsplash.com/photo-1535713875002-d1d0cf8c95b1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Avatar Preview">
                </div>
                <script>
                    document.getElementById('avatar_url').addEventListener('input', function() {
                        const img = document.getElementById('avatar_preview');
                        if (this.value) {
                            img.src = this.value;
                        } else {
                            img.src = "https://via.placeholder.com/96x96?text=No+Avatar";
                        }
                    });
                </script>
            </div>
            <div class="flex justify-end space-x-4">
                <button type="button" class="btn-secondary font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Cancel
                </button>
                <button type="submit" class="btn-primary font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection