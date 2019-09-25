<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\SliderImage;
use Exception;
use Auth;
use Illuminate\Support\Facades\Cache;


class IndexController extends Controller
{
    public function index()
    {
        $sliderImages = SliderImage::where('type', 'slider')->orderBy('created_at', 'desc')->get();
        $threeCollections = SliderImage::where('type', 'collection')->orderBy('created_at', 'desc')->take(3)->get();
        $twoCollections = SliderImage::where('type', 'collection')->orderBy('created_at', 'desc')->skip(3)->take(2)->get();
        $bigCollection = SliderImage::where('type', 'big_collection')->first();

        // cache()->forget('categoryProducts');
        // dd(cache('categoryProducts'));
        // $categoryProducts = Category::with('products')->orderBy('created_at', 'desc')->get();

         $categoryProducts = Cache::rememberForever('categoryProducts', function () {
            return Category::with('products')->orderBy('created_at', 'desc')->get();
        });
        return view('frontend.index', compact('sliderImages', 'categoryProducts', 'threeCollections', 'twoCollections', 'bigCollection'));
    }

    public function products($id)
    {
        try {
            $categoryId = decrypt($id);
        } catch (Exception $e) {
            return back();
        }
        $category = Category::findOrFail($categoryId);
        $products = Product::where('category_id', $categoryId)->with('reviews', 'displayImage')->orderBy('created_at', 'desc')->paginate(12);
        return view('frontend.products', compact('products', 'category'));
    }

    public function sortByPrice(Request $request)
    {
        $this->validate($request, [
            'filter' => 'required|integer'
        ]);
        $filter = $request->filter;
        $categoryId = $request->category_id;
        $category = Category::findOrFail($categoryId);
        if ($filter == 1) {
            $products = Product::where('category_id', $categoryId)->orderBy('price', 'desc')->paginate(12);
        } else {
            $products = Product::where('category_id', $categoryId)->orderBy('price', 'asc')->paginate(12);
        }
        return view('frontend.products', compact('products', 'category', 'filter'));
    }

    public function product($id)
    {
        try {
            $productId = decrypt($id);
        } catch (Exception $e) {
            return back();
        }
        $singleProduct = Product::findOrFail($productId);
        $reviews = Review::where('product_id', $singleProduct->id)->where('status', 1)->paginate(6);
        $products = Product::where('category_id', $singleProduct->category_id)->with('reviews', 'displayImage')->orderBy('created_at', 'desc')->paginate(9);
        return view('frontend.product_page', compact('singleProduct', 'reviews', 'products'));
    }

    public function search(Request $request)
    {
        $term = $request->term;
        $products = Product::where('title', 'LIKE', '%' . $term . '%')->paginate(6);
        $categories = Category::where('name', 'LIKE', '%' . $term . '%')->paginate(6);

        foreach ($products as $product) {
            $result[] = $product->title;
        }
        foreach ($categories as $category) {
            $result[] = $category->name;
        }

        return $result;
    }

    public function searchPage(Request $request)
    {
        $term = $request->search;
        $products = Product::where('title', 'LIKE', '%' . $term . '%')->with('reviews', 'displayImage')->paginate(12);
        $categories = Category::where('name', 'LIKE', '%' . $term . '%')->get();
        return view('frontend.search_page', compact('products', 'categories', 'term'));
    }

    public function aboutUs()
    {
        return view('frontend.about_us');
    }
    
    public function shipingReturn()
    {
        return view('frontend.shiping_return');
    }
}
