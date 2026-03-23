<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
   public function index(Request $request)
   {
    return $this->search($request);
   }

   public function create()
   {
    $seasons = Season::all();
    return view('products.create', compact('seasons'));
   }

   public function store(StoreProductRequest $request)
   {
    // 画像保存
   $imagePath = $request->file('image')->store('images','public');

   // 商品保存
    $product = Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'image' => $imagePath,
        'description' => $request->description
    ]);

    // 季節保存（多対多）
    $product->seasons()->attach($request->seasons);

   return redirect()->route('products.index');
   }
   
   public function search(Request $request)
  {
    $keyword = $request->keyword;
    $sort = $request->sort;

    $query = Product::query();

    // 商品名検索
    if (!empty($keyword)) {
        $query->where('name', 'like', '%' . $keyword . '%');
    }

    // 並び替え
    if ($sort === 'high') {
        $query->orderBy('price', 'desc');
    } elseif ($sort === 'low') {
        $query->orderBy('price', 'asc');
    }

    $products = $query->paginate(6);

    return view('products.index', compact('products'));
  }
   
   public function show($id)
  {
    $product = Product::findOrFail($id);
    $seasons = Season::all();

    return view('products.detail', compact('product','seasons'));
  }
  
  public function update(UpdateProductRequest $request, $id)
 {
    $product = Product::findOrFail($id);

    // 商品更新
    $product->update([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description
    ]);

    // 画像更新（選択されている場合のみ）
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $product->image = $imagePath;
        $product->save();
    }

    // 季節更新
    $product->seasons()->sync($request->seasons);

    return redirect()->route('products.index');
  }

public function destroy($id)
  {
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('products.index');
  }
}