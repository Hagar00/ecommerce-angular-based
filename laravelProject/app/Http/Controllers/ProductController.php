<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){

        return Product::orderBy('id', 'desc')->paginate(10);

    }

    public function show($productId){

        return Product::find($productId);

    }

    public function store(Request $request){

        // if ($image = $request->file('image'))
        //  {
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $path = $request->file('image')->storeAs('public/images', $profileImage);
            // $request->image = "$profileImage";
            $data = $request->all();
            return Product::create([
                                    'title' => $data['title'],
                                    'SKU' => $data['SKU'],
                                    'details' => $data['details'],
                                    'image' =>$data['image'],
                                    'price' => $data['price'],
                                ]);

        // }
        // else{
        //     return 'something went wrong!';
        // }

        
    }

    public function edit($slug){

        return $editProduct = Product::where('SKU', $slug)->get()->first();

    }

    public function update(Request $request,$sku ){


        // $postId = Product::find($sku);
     $product = Product::where('SKU', $sku)->get()->first();

        if ($image = $request->file('image')) {
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('public/images', $profileImage);
            // $request->image = "$profileImage";


        return  $product->update([
            'title' => $request->title,
            'SKU' => $request->SKU,
            'details' => $request->details,
            'image' => $profileImage,
            'price' => $request->price
        ]);
        Storage::delete('public/images/' . $request->image);

         }
        else{
            return  $product->update([
                'title' => $request->title,
                'SKU' => $request->SKU,
                'details' => $request->details,
                'price' => $request->price
        ]);
        }


}
    public function destroy($postId){
    $product = Product::find($postId);
    // Post::destroy($postId);
    Storage::delete('public/images/' . $product->image);

    return $product->delete();
}
}
