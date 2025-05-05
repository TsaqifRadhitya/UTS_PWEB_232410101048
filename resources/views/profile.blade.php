@extends('layouts.app-layout')
@section('username',$username)
@section('konten')
    <section class="w-full h-[90vh] flex items-center justify-center p-5 lg:p-10 bg-gradient-to-br from-cyan-50 to-amber-50">
        <div class="w-full h-full bg-white rounded-xl shadow-lg overflow-hidden flex flex-col">
            <div class="bg-gradient-to-r from-cyan-500 to-amber-500 p-6 text-white">
                <h1 class="text-2xl font-bold">User Profile</h1>
            </div>
            <div class="lg:p-10 flex flex-col gap-8 items-center justify-center flex-1">
                <div class="flex flex-col items-center gap-4">
                    <img class="w-40 h-40 lg:w-48 lg:h-48 rounded-full border-4 border-white shadow-md"
                        src="https://static.vecteezy.com/system/resources/previews/036/280/650/non_2x/default-avatar-profile-icon-social-media-user-image-gray-avatar-icon-blank-profile-silhouette-illustration-vector.jpg"
                        alt="Profile picture">
                    <h2 class="text-2xl font-semibold text-gray-800">{{ $username }}</h2>
                </div>
                <div class="w-full max-w-sm space-y-4 h-fit">
                    <div class="bg-gray-50 p-4 rounded-lg shadow-md">
                        <h3 class="font-medium text-gray-700 mb-2">Login Information</h3>
                        <div class="space-y-2 text-sm text-gray-600">
                            <p>Last login: {{ $lastLogin }}</p>
                        </div>
                    </div>
                    <button type="submit"
                        class="cursor-pointer w-full flex items-center justify-center gap-2 bg-amber-500 hover:bg-amber-600 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition-all duration-300 transform">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Wipe Data
                    </button>
                    <form action="{{ route('logout') }}" method="POST" class="w-full">
                        @csrf
                        <button type="submit"
                            class="cursor-pointer w-full flex items-center justify-center gap-2 bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition-all duration-300 transform">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
