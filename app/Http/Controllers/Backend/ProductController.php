<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Str;
use Storage;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::latest()->get();
        $title   = 'Hapus Data!';
        $text    = "Apakah Anda Yakin??";
        confirmDelete($title, $text);

        return view('backend.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('backend.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|unique:products',
            'category_id' => 'required',
            'price'       => 'required|numeric',
            'description' => 'required',
            'stock'       => 'required|numeric',
            'image'       => 'required|image|mimes:jpg,png,jpeg',
        ]);

        $product              = new Product();
        $product->name        = $request->name;
        $product->slug        = Str::slug($request->name, '-');
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price       = $request->price;
        $product->stock       = $request->stock;

        // upload gambar

        if ($request->hasFile('image')) {
            $file           = $request->file('image');
            $randomName     = Str::random(20) . '_' . $file->getClientOriginalName();
            $path           = $file->storeAs('products', $randomName, 'public');
            $product->image = $path;
        }

        $product->save();
        toast('Data berhasil ditambahkan', 'success');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product  = Product::findOrFail($id);
        $category = Category::all();

        return view('backend.product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name'        => 'required',
            'category_id' => 'required',
            'price'       => 'required|numeric',
            'description' => 'required',
            'stock'       => 'required|numeric',
            'image'       => 'nullable|image|mimes:jpg,png,jpeg',
        ]);

        $product              = Product::findOrFail($id);
        $product->name        = $request->name;
        $product->slug        = Str::slug($request->name, '-');
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price       = $request->price;
        $product->stock       = $request->stock;

// upload gambar

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($product->image);
            $file           = $request->file('image');
            $randomName     = Str::random(20) . '_' . $file->getClientOriginalName();
            $path           = $file->storeAs('products', $randomName, 'public');
            $product->image = $path;
        }

        $product->save();
        toast('Data berhasil ditambahkan', 'success');
        return redirect()->route('product.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        Storage::disk('public')->delete($product->image);
        $product->delete();
        toast('Data berhasil dihapus', 'success');
        return redirect()->route('product.index');
    }
}
