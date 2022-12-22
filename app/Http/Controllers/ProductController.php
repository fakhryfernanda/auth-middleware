<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function all()
    {
        return view('product/index', [
            "products" => Product::all(),
            "title" => "Products"
        ]);
    }

    public function add()
    {
        return view('product/add', [
            "title" => "Add Product"
        ]);
    }

    public function create(Request $request)
    {
        $payload = [
            'name' => $request->input("name"),
            'description' => $request->input("description"),
            'price' => $request->input("price"),
            'file_name' => $request->file("image")->store("images", "public")
        ];

        Product::query()->create($payload);
        return redirect("product"); // ke halaman product
    }

    function detail($id) {
        $product = Product::query()->where("id", $id)->first();
        return view("product/detail", [
            "title" => "Product | " . $product->name,
            "product" => $product
        ]);
    } //menampilkan sebuah data

    public function update(Request $request, $id) {
        $payload = [
            'name' => $request->input("name"),
            'description' => $request->input("description"),
            'price' => $request->input("price"),
        ];

        if ($request->hasFile("image")) {
            $payload["file_name"] = $request->file("image")->store("images", "public");
        }

        Product::where("id", $id)->update($payload);
        return redirect("product"); // ke halaman product
    }

    function delete($id) {
        $product = Product::query()->where("id", $id)->first();
        $product->delete();
        Storage::disk('public')->delete($product->file_name);
        return redirect('product'); // ke halaman sebelumnya
    } //menghapus data
}
