<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
    public function toggleWishlist($vehicle_id){
        //fetch curreently authenticated user
        $user = auth()->user();

        //add product item to wishlist if it is not in wishlist
        //else remove from wishlist
        $user->wishlists()->toggle([$vehicle_id]);
        return redirect()->back()->with('toast.success', 'Wishlist Updated');
    }
}
