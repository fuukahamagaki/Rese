<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function favorites($restaurant_id)
    {
        $user = auth()->user();

        $user->favorites()->attach($restaurant_id);

        return back()->with('success', 'お気に入りに追加しました');
    }

    public function destroy(Favorite $favorite)
    {
        $favorite->delete();

        return redirect()->route('mypage');
    }
}
