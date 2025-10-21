<nav class="bg-white shadow-sm fixed top-0 left-0 w-full z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <img class="h-8 w-auto" src="{{ asset('images/Gemini_Generated_Image_19k4be19k4be19k4.png') }}" alt="TaniLink Logo">
                    <span class="ml-2 text-xl font-bold text-gray-800">TaniLink</span>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{--   {{ route('home') }}--}}" class="inline-flex items-center px-1 pt-1 border-b-2 {{--{{ Request::routeIs('home') ? 'border-green-700 text-green-800' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} --}} text-sm font-medium">
                    <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Home
                </a>
                <a href="{{--{{ route('messages') }}--}}" class="inline-flex items-center px-1 pt-1 border-b-2 {{--   {{ Request::routeIs('messages') ? 'border-green-700 text-green-800' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} --}} text-sm font-medium">
                    <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                    Messages <span class="ml-1 px-2 py-0.5 rounded-full bg-red-500 text-white text-xs font-semibold">2</span>
                </a>
                <a href="{{--  {{ route('edit-profile') }}--}}" class="inline-flex items-center px-1 pt-1 border-b-2 {{--  {{ Request::routeIs('edit-profile') ? 'border-green-700 text-green-800' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} --}} text-sm font-medium">
                    <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Edit Profile
                </a>
                <a href="{{--  {{ route('logout') }}--}}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 text-sm font-medium">
                        <img class="h-8 w-8 rounded-full" src="images/{{ Auth::user()->profile_picture }}" alt="User Avatar">
                </a>        
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Logout</button>
                </form>
                
            </div>
        </div>
    </div>
</nav>