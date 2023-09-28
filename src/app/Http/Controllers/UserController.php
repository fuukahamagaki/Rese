<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Favorite;

class UserController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;

        $reservations = Reservation::where('user_id', $userId)->get();

        $user = auth()->user();

        $favoriteRestaurants = $user->favorites;

        return view('mypage.index', ['reservations' => $reservations, 'favoriteRestaurants' => $favoriteRestaurants]);
    }
}
