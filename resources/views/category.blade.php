@extends('layouts.app')

@section('title', $category->title)

@section('content')
<h1>
    {{ $category->title }} {{ $category->products->count() }}
</h1>
<p>
    {{ $category->desc }}
</p>
<div class="row">
    @if ($category->products->count() < 1) <p>Товаров нет =(</p>
        @endif

        @foreach($category->products as $product)

        @include('inc.card', ['product' => $product])

        @endforeach
</div>
@endsection
