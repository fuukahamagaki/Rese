@extends('layouts.app')

@section('css')
@endsection

@section('content')
<div class="container">
    <a href="{{ route('restaurants.index') }}"><</a>
    <h1>{{ $restaurant->name }}</h1>
    <img src="{{ asset($restaurant->photo) }}" alt="{{ $restaurant->name }}" width="50%">
    <p>#{{ $restaurant->area->name }}</p>
    <p>#{{ $restaurant->genre->name }}</p>
    <p>{{ $restaurant->description }}</p>
</div>

<div class="container">
    <h1>予約</h1>
    <form method="POST" action="{{ route('reservations.store') }}">
        @csrf
        <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">

        <div class="form-group">
            <input type="date" name="reservation_date" class="form-control" required>
        </div>

        <div class="form-group">
            <input type="time" name="reservation_time" class="form-control" required>
        </div>

        <div class="form-group">
            <input type="number" name="party_size" class="form-control" required>
        </div>

        <!-- 他の予約情報のフォームを追加 -->

        <button type="submit" class="btn btn-primary">予約する</button>
    </form>
</div>
@endsection
