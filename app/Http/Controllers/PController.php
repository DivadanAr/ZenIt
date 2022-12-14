<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DatasaleExport;
use App\Models\Rating;
use App\Models\ShopProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\payment\TripayController;
use App\Models\Cart;

class PController extends Controller
{
    public function show(Product $product){

        $seller = User::find($product->users_id)->shop;
        $favorites = [0];
        if(Auth::check()){
            foreach(Auth()->user()->favorites as $favorite){
                array_push($favorites, $favorite->products_id);
            }
        }

        $related_products = Product::whereHas('category', function ($query) use ($product) {
            $query->whereId($product->category_id);
        })
            ->where('id', '<>', $product->id)
            ->inRandomOrder()
            ->take(5)
            ->get();

        $ratings = $product->ratings;

        $star5 = $product->ratings->where('stars_rated', 5)->count();
        $star4 = $product->ratings->where('stars_rated', 4)->count();
        $star3 = $product->ratings->where('stars_rated', 3)->count();
        $star2 = $product->ratings->where('stars_rated', 2)->count();
        $star1 = $product->ratings->where('stars_rated', 1)->count();

        $avg = 0.0;
        $avgsell = 0;



        if($ratings->count() != 0){
            $avg = round((1*$star1+2*$star2+3*$star3+4*$star4+5*$star5)/($star1+$star2+$star3+$star4+$star5),1);
            $avgsell = round((1*$star1+2*$star2+3*$star3+4*$star4+5*$star5)/($star1+$star2+$star3+$star4+$star5),0);
        }

        

        return view('detail', compact('product',  'related_products', 'seller', 'ratings', 'star1', 'star2', 'star3', 'star4', 'star5', 'avg', 'avgsell','favorites'));
    }
    public function export(){
        return Excel::download(new DatasaleExport, 'datasale.xlsx');
    }

    public function checkout()
    {
        $products = Cart::where('users_id', Auth::user()->id)->get();

        $tripay = new TripayController();

        $pay = $tripay->pay();

        return view('checkout-payments', compact('products', 'pay'));
    }
}
