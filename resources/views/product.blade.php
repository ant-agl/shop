@extends('layouts.app')

@section('title', $product->title)

@section('content')
<h1>{{ $product->title }}</h1>
<h2>{{ $product->category->title }}</h2>
<p>
    Цена:
    <b>{{ $product->price }} ₽</b>
</p>
@if($product->isNew())
<span class="badge badge-clip badge-success mt-1">Новинка</span>
@endif

@if($product->isRecommend())
<span class="badge badge-clip badge-info mt-1">Рекомендуем</span>
@endif

@if($product->isHit())
<span class="badge badge-clip badge-danger mt-1">Хит продаж!</span>
@endif

<br>
<br>
<img src="{{ Storage::url($product->img) }}">
<br><br>
<p>{{ $product->desc }}</p>

<form action="{{ route('basket-add', $product) }}" method="POST">
    <button type="submit" class="btn btn-success">Добавить в корзину</button>
    @csrf
</form>
@endsection
