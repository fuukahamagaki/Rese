@extends('layouts.app')

@section('css')
@endsection

@section('content')
<div class="container">
    <h1>{{ auth()->user()->name }}さん</h1>
    <h2>予約状況</h2>
    <ul>
        @foreach ($reservations as $reservation)
            <li>
                shop {{ $reservation->restaurant->name }}
                Date {{ $reservation->reservation_date }}
                Time {{ $reservation->reservation_time }}
                Number{{ $reservation->party_size }}
            </li>
            <form action="{{ route('reservations.destroy', ['reservation' => $reservation->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">予約をキャンセル</button>
            </form>
        @endforeach
    </ul>
</div>

<div class="container">
    <h2>お気に入り店舗</h2>
    @if ($favoriteRestaurants->isEmpty())
        <p>お気に入りの店舗はありません。</p>
    @else
        <ul>
            @foreach ($favoriteRestaurants as $restaurant)
                <li>
                    <div class="card-img">
                        <img src="{{ $restaurant->photo }}" alt="{{ $restaurant->name }}" width="300">
                    </div>
                    <div class="card__content">
                        <div class="card__shop-name">{{ $restaurant->name }}</div>
                        <div class="card__tag">
                            <p class="card__tag-item">#{{ $restaurant->area->name }}</p>
                            <p class="card__tag-item">#{{ $restaurant->genre->name }}</p>
                        </div>
                    </div>
                    <a href="{{ route('restaurant.detail', ['restaurant_id' => $restaurant->id])  }}">詳しくみる</a>
                </li>
                
            @endforeach
        </ul>
    @endif
</div>
@endsection