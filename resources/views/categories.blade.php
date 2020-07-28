@extends('layouts.app')

@section('title', 'Категории')

@section('content')
@foreach($categories as $cat)
<div class="card mt-4">
    <div class="card-body">
        <a class="card-link" href="{{ route('category', $cat->alias) }}">
            <img src="{{ Storage::url($cat->img) }}" height="50px">
            <h2 class="card-title text-dark">{{ $cat->title }}</h2>
        </a>
        <p class="card-text">
            {{ $cat->desc }}
        </p>
    </div>
</div>
@endforeach
@endsection
