@extends('layout')

@section('content')
<div class="mx-auto w-fit">
    @if (session()->has('success'))
        <div class="group mb-4 py-3 px-4 rounded-md bg-green-200 flex justify-between">
            <p class="text-green-800 font-semibold">{{ session('success') }}</p>
            <button class="group-active:hidden text-xs">&#10060;</button>
        </div>
    @endif

    @if (session()->has('loginError'))
        <div class="group mb-4 py-3 px-4 rounded-md bg-red-100 flex justify-between">
            <p class="text-red-800 font-semibold">{{ session('loginError') }}</p>
            <button class="group-active:hidden text-xs">&#10060;</button>
        </div>
    @endif

    <h2 class="mb-5 text-3xl text-center font-semibold">Please sign in</h2>
    <form action="/login" method="post" class="flex flex-col">
        @csrf
        <input class="w-[300px] py-3 px-4 rounded-sm border border-gray-300 @error('email') border-red-400 outline 
        outline-red-300 outline-4 @enderror" name="email" type="email" placeholder="Email address" value="{{ old('email') }}" required autofocus>
        @error('email')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
        <input class="w-[300px] py-3 px-4 rounded-sm border border-gray-300 @error('password') mt-2 border-red-400 outline 
        outline-red-300 outline-4 @enderror" name="password" type="password" placeholder="Password" required>
        @error('password')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
        {{-- <div class="mt-2 flex items-center gap-2">
            <input class="block" type="Checkbox">
            <p>Remember me</p>
        </div> --}}
        <button class="mt-4 py-2 text-lg text-white bg-blue-500 text-center rounded-md">Sign in</button>
    </form>
    <p class="text-center mt-5">Not registered? <a href="/register" class="underline text-blue-500">Register Now!</a></p>
</div>
@endsection