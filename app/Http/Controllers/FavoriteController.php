<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('store');
    }

    public function store(Reply $reply){
        $reply->favorite();
        return back()->with('flash', 'You favorited a reply.');
    }

    public function destroy(Reply $reply){
        $reply->unfavorite();

    }
}
