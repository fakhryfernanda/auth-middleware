@extends('layout')

@section('content')
<div class="p-4 w-fit mx-auto mt-20 border border-slate-200">
    <h1 class="py-2 text-4xl text-center font-bold mb-10">Add Post</h1>
    <form method="post" action="/blog/create" enctype="multipart/form-data" class="flex flex-col gap-4">
        @csrf
        <div>
            <label for="title" class="inline-block w-40">Judul :</label>
            <input type="text" name="title" id="title" class="border border-slate-500 p-1 rounded-sm">
        </div>

        <div class="">
            <label for="body" class="inline-block w-40">Isi post :</label>
            <textarea name="body" id="body" rows="5" cols="50" class="border border-slate-500 p-1 rounded-sm"></textarea>
        </div>

        <div>
            <label for="thumbnail" class="inline-block w-40">Gambar :</label>
            <input type="file" name="thumbnail" id="thumbnail" accept="image/*" class="border border-slate-500 p-1 rounded-sm">
        </div>

        <button type="Submit" class="w-fit mx-auto py-2 px-6 text-white bg-orange-400 rounded-lg">Tambah</button>

    </form>
    <a href="/blog" class="underline hover:text-sky-600">Kembali</a>
</div>
@endsection