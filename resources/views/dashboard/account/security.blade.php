@extends('dashboard.home')

@section('content')

<div class="bg-gray-200 min-h-screen pb-24">
    <div class="container mx-auto max-w-3xl mt-8">
      <h1 class="text-2xl font-bold text-gray-700 px-6 md:px-0">Account Settings</h1>
      <ul class="flex border-b border-gray-300 text-sm font-medium text-gray-600 mt-3 px-6 md:px-0">
        <li class="mr-8 hover:text-gray-900"><a href="/account" class="py-4 inline-block">Profile Info</a></li>
        <li class="mr-8 text-gray-900 border-b-2 border-gray-800"><a href="#" class="py-4 inline-block">Security</a></li>
      </ul>
      <form action="/account/changepassword" method="POST">
        @csrf
        <div class="w-full mt-2 bg-white rounded-lg mx-auto pb-5 flex overflow-hidden rounded-b-none">
          <div class="w-1/3 bg-gray-100 p-8 hidden md:inline-block">
            <h2 class="font-medium text-md text-gray-700 mb-4 tracking-wide">Security</h2>
            <p class="text-xs text-gray-500">Change your password</p>
          </div>
          <div class="md:w-2/3 w-full">
            <div class="py-8 px-16">
              <label for="current_password" class="text-sm text-gray-600">Current Password</label>
              <input class="mt-2 border-2 border-gray-200 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500" type="password" name="current_password">
              @error('current_password')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
            <hr class="border-gray-200">
            <div class="py-4 px-16">
              <label for="password" class="text-sm text-gray-600">New Password</label>
              <input class="mt-2 border-2 border-gray-200 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500" type="password" name="password"/>
              @error('password')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
            <div class=" px-16">
              <label for="password_confirmation" class="text-sm text-gray-600">Confirm Password</label>
              <input class="my-2 border-2 border-gray-200 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500" type="password" name="password_confirmation"/>
              @error('password_confirmation')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
            <hr class="border-gray-200">
          </div>
  
        </div>
        <div class="p-6 flex justify-between bg-gray-300  rounded-b-lg border-t border-gray-200">
          <p class="text-xs text-gray-500 tracking-tight">Click on Save to change your password.</p>
          <button type="submit" class="bg-indigo-500 text-white text-sm font-medium px-6 py-2 rounded float-right uppercase cursor-pointer">SAVE</button>
        </div>
      </form>
    </div>
  </div>

@endsection