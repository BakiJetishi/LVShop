@extends('dashboard.home')

@section('content')

<div class="bg-gray-200 min-h-screen pb-24">
    <div class="container mx-auto max-w-3xl mt-8">
      <h1 class="text-2xl font-bold text-gray-700 px-6 md:px-0">Account Settings</h1>
      <ul class="flex border-b border-gray-300 text-sm font-medium text-gray-600 mt-3 px-6 md:px-0">
        <li class="mr-8 text-gray-900 border-b-2 border-gray-800"><a href="#_" class="py-4 inline-block">Profile Info</a></li>
        <li class="mr-8 hover:text-gray-900"><a href="/account/security" class="py-4 inline-block">Security</a></li>
      </ul>
      <form action="/account/changeinfo" method="POST">
        @csrf
        <div class="w-full mt-2 bg-white rounded-lg mx-auto pb-5 flex overflow-hidden rounded-b-none">
          <div class="w-1/3 bg-gray-100 p-8 hidden md:inline-block">
            <h2 class="font-medium text-md text-gray-700 mb-4 tracking-wide">Profile Info</h2>
            <p class="text-xs text-gray-500">Update your basic profile information such as Email Address, Name, and Image.</p>
          </div>
          <div class="md:w-2/3 w-full">
            <div class="py-8 px-16">
              <label for="name" class="text-sm text-gray-600">Name</label>
              <input class="mt-2 border-2 border-gray-200 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500" type="text"  name="name" value="{{$user->name}}"/>
              @error('name')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
            <hr class="border-gray-200">
            <div class="py-8 px-16">
              <label for="email" class="text-sm text-gray-600">Email Address</label>
              <input class="mt-2 border-2 border-gray-200 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500" type="email" name="email" value="{{$user->email}}"/>
              @error('email')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
            <hr class="border-gray-200">
          </div>
  
        </div>
        <div class="p-6 flex justify-between bg-gray-300  rounded-b-lg border-t border-gray-200">
          <p class="text-xs text-gray-500 tracking-tight">Click on Save to update your Profile Info</p>
          <button type="submit" class="bg-indigo-500 text-white text-sm font-medium px-6 py-2 rounded float-right uppercase cursor-pointer">SAVE</button>
        </div>
      </form>
    </div>
  </div>

@endsection