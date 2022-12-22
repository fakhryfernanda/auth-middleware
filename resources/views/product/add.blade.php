@extends('layout')

@section('content')
<div class="p-4 w-fit mx-auto mt-20 border border-slate-200">
    <h1 class="py-2 text-4xl text-center font-bold mb-10">Add Product</h1>
    <form method="post" action="/product/create" enctype="multipart/form-data" class="flex flex-col gap-4">
        @csrf
        <div>
            <label for="name" class="inline-block w-40">Nama :</label>
            <input type="text" name="name" id="name" class="border border-slate-500 p-1 rounded-sm">
        </div>

        <div class="">
            <label for="description" class="inline-block w-40">Deskripsi :</label>
            <textarea name="description" id="description" rows="5" cols="50" class="border border-slate-500 p-1 rounded-sm"></textarea>
        </div>

        <div>
            <label for="price" class="inline-block w-40">Harga :</label>
            <input type="number" name="price" id="price" class="border border-slate-500 p-1 rounded-sm">
        </div>

        <div>
            <label for="image" class="inline-block w-40">Gambar :</label>
            <input type="file" name="image" id="image" accept="image/*" class="border border-slate-500 p-1 rounded-sm">
        </div>

        <button type="Submit" class="w-fit mx-auto py-2 px-6 text-white bg-orange-400 rounded-lg">Tambah</button>

    </form>
    <a href="/product" class="underline hover:text-sky-600">Kembali</a>
</div>
@endsection