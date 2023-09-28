@extends('layouts.app')

@section('css')
@endsection

@section('content')
<form action="{{ route('restaurants.area') }}" method="GET">
    <select name="area" id="area">
        <option value="">All area</option>
        @foreach ($areas as $area)
        <option value="{{ $area->id }}">{{ $area->name }}</option>
        @endforeach
    </select>
        <button type="submit">検索</button>
</form>
<form action="{{ route('restaurants.searchByGenre') }}" method="GET">
    <select name="genre" id="genre">
        <option value="">All genre</option>
        @foreach ($genres as $genre)
        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endforeach
    </select>
    <button type="submit">検索</button>
</form>
<form action="{{ route('restaurants.index') }}" method="GET">
    <input type="text" name="search" placeholder="店舗を検索">
    <button type="submit">検索</button>
</form>
<div class="container">
    <div class="card">
        @foreach($restaurants as $restaurant)
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
        @if (auth()->check())
            <form action="{{ route('favorite', ['restaurant_id' => $restaurant->id]) }}" method="POST">
                @csrf
                <button type="submit">お気に入りに追加</button>
            </form>
        @endif
        @endforeach
    </div>
</div>

@endsection