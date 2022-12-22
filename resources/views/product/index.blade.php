@extends('layout')

@section('content')
    <div class="container w-4/5 p-5 mx-auto mt-20 border border-slate-200">
        <h2 class="text-4xl font-bold mb-5">Products</h2>
        <a href="/" class="block underline text-blue-600 mb-5">Home</a>
        <button class="px-4 py-2 text-white bg-orange-500 rounded-lg">
            <a href="/product/add">Tambah produk</a>
        </button>
        <div class="mt-5 flex flex-wrap gap-4">
            @foreach ($products as $product)
                <div class="w-[250px] shadow-lg p-5 text-center">
                    <div class="mb-4">
                        <img src="{{ Storage::url($product->file_name) }}" alt="">
                    </div>
                    <h2 class="text-2xl font-bold">{{ $product->name }}</h2>
                    <p>{{ $product->description }}</p>
                    <p class="text-orange-500">Rp{{ number_format($product->price) }}</p>
                    <div class="mx-auto mt-4 flex gap-4 w-fit">
                        <button class="w-20 py-2 px-4 bg-orange-400 text-white rounded-md">
                            <a href="/product/detail/{{ $product->id }}">Edit</a>
                        </button>
                        <button class="w-20 py-2 px-4 bg-orange-400 text-white rounded-md">
                            <a href="/product/delete/{{ $product->id }}">Delete</a>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
        
    </div>
    {{-- <div class="p-4 w-fit mx-auto border border-slate-200 absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 hidden">
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
    </div> --}}
@endsection