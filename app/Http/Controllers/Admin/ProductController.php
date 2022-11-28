<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::where('status', '!=', '2')->get();
        return view('admin.collection.product.index', compact('products'));
    }
    public function create() {
        $subcategory = Subcategory::where('status','!=', '2')->get();
        return view('admin.collection.product.create')
        ->with('subcategory', $subcategory);
    }
    public function store(Request $request) {
        $product = new Product();
        $product->name = $request->input('product_name');
        $product->sub_category_id = $request->input('sub_category_id');
        $product->url = $request->input('url');
        $product->small_description = $request->input('small_description');

        if($request->hasFile('prod_image')) {
            $image_file = $request->file('prod_image');
            // $img_extention = $image_file->getClientOriginalExtension();
            $img_filename = time()."_".$image_file->getClientOriginalName();
            $image_file->move('uploads/products/', $img_filename);
            $product->image = $img_filename;
        }

        $product->saletag = $request->input('saletag');
        $product->original_price = $request->input('original_price');
        $product->offer_price = $request->input('offer_price');
        $product->quantity = $request->input('quantity');
        $product->priority = $request->input('priority');

        $product->p_highlight_heading = $request->input('p_highlight_heading');
        $product->p_highlights = $request->input('p_highlights');
        $product->p_description_heading = $request->input('p_description_heading');
        $product->p_description = $request->input('p_description');
        $product->p_details_heading = $request->input('p_details_heading');
        $product->p_details = $request->input('p_details');


        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->meta_keyword = $request->input('meta_keyword');

        $product->new_arrival_products = $request->input('new_arrival_products') == true ? '1' : '0';
        $product->featured_products = $request->input('featured_products') == true ? '1' : '0';
        $product->popular_products = $request->input('popular_products') == true ? '1' : '0';
        $product->offers_products = $request->input('offers_products') == true ? '1' : '0';
        $product->status = $request->input('status') == true ? '1' : '0';

        $product->save();
        return redirect('/products')->with('status', 'Product ADDED successfully');

    }
}
