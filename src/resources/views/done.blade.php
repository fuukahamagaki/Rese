@extends('layouts.app')

@section('css')
@endsection

@section('content')
<div class="container">
    <h1>ご予約ありがとうございます</h1>
    <a href="{{ route('restaurant.detail', ['restaurant_id' => $restaurant->id]) }}" class="btn btn-primary">戻る</a>
</div>
@endsection