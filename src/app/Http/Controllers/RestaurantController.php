<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Area;
use App\Models\Genre;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $areas = Area::all();

        $query = $request->input('search');

        if(!empty($query)){
            $restaurants = Restaurant::where('name', 'like', '%'. $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->get();
        } else {
            $restaurants = Restaurant::all();
        }

        $genres = Genre::all();

        return view('restaurants.index', compact('restaurants', 'areas','genres'));
    }

    public function detail($restaurant_id)
    {
        $restaurant = Restaurant::find($restaurant_id);

        return view('restaurants.show', ['restaurant' => $restaurant]);
    }

    public function searchByArea(Request $request)
    {
        $areas = Area::all();

        $areaId = $request->input('area');

        if (!empty($areaId)) {
            $restaurants = Restaurant::where('area_id', $areaId)->get();
        } else {
            $restaurants = Restaurant::all();
        }

        return view('restaurants.index', compact('restaurants', 'areas'));
    }

    public function searchByGenre(Request $request)
    {
        $areas = Area::all();
        $genres = Genre::all();

        $genreId = $request->input('genre');

        if (!empty($genreId)) {
            $restaurants = Restaurant::where('genre_id', $genreId)->get();
        } else {
            $restaurants = Restaurant::all();
        }

        return view('restaurants.index', compact('restaurants', 'areas', 'genres'));
    }



}
