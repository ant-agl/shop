@extends('admin.layouts.app')

@section('title', 'Категория ' . $category->title)

@section('content')
<h1>Категория <b>{{ $category->title }}</b></h1>
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
            <td>{{ $category->id }}</td>
        </tr>
        <tr>
            <td>Ссылка</td>
            <td>{{ $category->alias }}</td>
        </tr>
        <tr>
            <td>Название</td>
            <td>{{ $category->title }}</td>
        </tr>
        <tr>
            <td>Описание</td>
            <td>{{ $category->desc }}</td>
        </tr>
        <tr>
            <td>Картинка</td>
            <td>
                <img src="{{ Storage::url($category->img) }}" style="max-height:240px">
            </td>
        </tr>
        <tr>
            <td>Кол-во товаров</td>
            <td>{{ $category->products->count() }}</td>
        </tr>
    </tbody>
</table>
@endsection
