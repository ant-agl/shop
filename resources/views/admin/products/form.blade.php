@extends('admin.layouts.app')

@isset($product)
@section('title', 'Редактировать ' . $product->title)

@else
@section('title', 'Добавить товар')

@endisset


@section('content')

@isset($product)
<h1>Редактировать <b>{{ $product->title }}</b></h1>

@else
<h1>Добавить товар</h1>

@endisset

<form method="POST" enctype="multipart/form-data" action="
    @isset($product)
        {{ route('admin.products.update', $product) }}
    @else
        {{ route('admin.products.store') }}
    @endisset
">

    @csrf

    @isset($product)
    @method('PUT')
    @endisset

    <div class="input-group row">
        <label for="code" class="col-sm-2 col-form-label">Ссылка: </label>
        <div class="col-sm-6">
            <input type="text" class="form-control @error('alias') is-invalid @enderror" name="alias" id="alias"
                value="{{ old('alias', $product->alias ?? '') }}">
            @error('alias')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <br>

    <div class="input-group row">
        <label for="name" class="col-sm-2 col-form-label">Название: </label>
        <div class="col-sm-6">
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                value="{{ old('title', $product->title ?? '') }}">
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <br>

    <div class="input-group row">
        <label for="name" class="col-sm-2 col-form-label">Цена: </label>
        <div class="col-sm-6">
            <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" id="price"
                value="{{ old('price', $product->price ?? '') }}">
            @error('price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <br>

    <div class="input-group row">
        <label for="description" class="col-sm-2 col-form-label">Описание: </label>
        <div class="col-sm-6">
            <textarea name="desc" id="description"
                class="form-control @error('desc') is-invalid @enderror">{{ old('desc', $product->desc ?? '') }}</textarea>
            @error('desc')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <br>

    <div class="input-group row">
        <label for="name" class="col-sm-2 col-form-label">Категория: </label>
        <div class="col-sm-6">
            <select class="custom-select" name="category_id" id="category_id">
                @foreach ($categories as $category)
                <option value="{{$category->id}}" @isset($product) @if ($product->category->id == $category->id)
                    selected @endif @endisset>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <br>

    <div class="input-group row">
        <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
        <div class="col-sm-6">
            <div class="custom-file" style="width:100%">
                <input type="file" name="img" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile" data-browse="Выбрать">Выберите файл</label>
            </div>
            @isset($product->img)
            <img src="{{ Storage::url($product->img) }}" class="mt-2" style="max-height:240px">
            @endisset
        </div>
    </div>
    <br>

    @foreach ([
    'new' => 'Новинка',
    'recommend' => 'Рекомендуем',
    'hit' => 'Хит продаж!',
    ] as $field => $title)
    <div class="form-check mt-2">
        <input class="form-check-input" type="checkbox" name="{{ $field }}" id="{{ $field }}" @if(isset($product) &&
            $product->$field === 1)
        checked
        @endif>
        <label class="form-check-label" for="{{ $field }}">
            {{ $title }}
        </label>
    </div>
    @endforeach

    {{-- <div class="input-group row">
        <label for="name" class="col-sm-2 col-form-label">Кол-во: </label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="title" id="title" value="{{ $product->title ?? '' }}">
    </div>
    </div> --}}

    <button class="btn btn-success mt-4">Сохранить</button>
</form>
@endsection
