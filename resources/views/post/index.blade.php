@extends('layout')

@section('content')
    <div class="container w-[700px] p-5 mx-auto mt-20 border border-slate-200">
        <h2 class="text-4xl font-bold mb-5">Blog</h2>
        <a href="/" class="block underline text-blue-600 mb-5">Home</a>
        <button class="px-4 py-2 text-white bg-orange-500 rounded-lg">
            <a href="/blog/add">Tambah post</a>
        </button>
        <div class="mt-10">
            @foreach ($posts as $post)
            <div class="pt-4 pb-8 flex border-b border-b-gray-300">
                <div class="mr-12">
                    <h2 class="text-2xl font-bold mb-2">{{ $post->title }}</h2>
                    <p>{{ $post->excerpt }}</p>
                </div>
                <div class="w-32 flex-shrink-0">
                    <img src="{{ Storage::url($post->thumbnail) }}" alt="thumbnail" class="w-fit">
                </div>
            </div>
            @endforeach
        </div>
        
    </div>
@endsection