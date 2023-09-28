<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Restaurant;

class ReservationController extends Controller
{
    public function index($restaurantId)
    {
        $restaurant = Restaurant::find($restaurantId);

        return view('restaurant.show',compact('restaurant'));
    }

    public function store(Request $request)
    {
        $rules = [
            'restaurant_id' => 'required|exists:restaurants,id',
            'reservation_date' => 'required|date',
            'reservation_time' => 'required|date_format:H:i',
            'party_size' => 'required|integer|min:1'
        ];

        $validatedData =$request->validate($rules);

        if(Auth::check()){

            $userId = Auth::user()->id;

            Reservation::create([
                'user_id' => $userId,
                'restaurant_id' => $validatedData['restaurant_id'],
                'reservation_date' => $validatedData['reservation_date'],
                'reservation_time' => $validatedData['reservation_time'],
                'party_size' => $validatedData['party_size']
            ]);

            $restaurant = Restaurant::find($validatedData['restaurant_id']);

            return view('done',compact('restaurant'));
        } else {
            return redirect()->route('login');
        }

    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('mypage');
    }
}
