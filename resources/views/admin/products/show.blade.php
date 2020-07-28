@extends('admin.layouts.app')

@section('title', 'Продукт ' . $product->title)

@section('content')
<h1>Категория <b>{{ $product->title }}</b></h1>
<table class="table">
    <thead>
        <tr>
            <th>Поле</th>
            <th>Значение</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>ID</td>
            <td>{{ $product->id }}</td>
        </tr>
        <tr>
            <td>Ссылка</td>
            <td>{{ $product->alias }}</td>
        </tr>
        <tr>
            <td>Название</td>
            <td>{{ $product->title }}</td>
        </tr>
        <tr>
            <td>Категория</td>
            <td>{{ $product->category->title }}</td>
        </tr>
        <tr>
            <td>Цена</td>
            <td>{{ $product->price }} ₽</td>
        </tr>
        <tr>
            <td>Описание</td>
            <td>{{ $product->desc }}</td>
        </tr>
        <tr>
            <td>Картинка</td>
            <td>
                <img src="{{ Storage::url($product->img) }}" style="max-height:240px">
            </td>
        </tr>
        <tr>
            <td>Лэйблы</td>
            <td>
                @if($product->isNew())
                <span class="badge badge-clip badge-success mt-1">Новинка</span>
                @endif

                @if($product->isRecommend())
                <span class="badge badge-clip badge-info mt-1">Рекомендуем</span>
                @endif

                @if($product->isHit())
                <span class="badge badge-clip badge-danger mt-1">Хит продаж!</span>
                @endif

                @if(!$product->isLabels())
                <span>Пусто</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>Кол-во</td>
            <td>0{{-- $product->products->count() --}}</td>
        </tr>
    </tbody>
</table>
@endsection
