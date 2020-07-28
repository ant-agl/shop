@extends('admin.layouts.app')

@isset($category)
@section('title', 'Редактировать ' . $category->title)

@else
@section('title', 'Добавить категорию')

@endisset


@section('content')

@isset($category)
<h1>Редактировать <b>{{ $category->title }}</b></h1>

@else
<h1>Добавить категорию</h1>

@endisset

<form method="POST" enctype="multipart/form-data" action="
    @isset($category)
        {{ route('admin.categories.update', $category) }}
    @else
        {{ route('admin.categories.store') }}
    @endisset
">

    @csrf

    @isset($category)
    @method('PUT')
    @endisset

    <div class="input-group row">
        <label for="code" class="col-sm-2 col-form-label">Ссылка: </label>
        <div class="col-sm-6">
            <input type="text" class="form-control @error('alias') is-invalid @enderror" name="alias" id="alias"
                value="{{ old('alias', $category->alias ?? '') }}">
            @error('alias')
            <p class="alert alert-danger mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <br>

    <div class="input-group row">
        <label for="name" class="col-sm-2 col-form-label">Название: </label>
        <div class="col-sm-6">
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                value="{{ old('title', $category->title ?? '') }}">
            @error('title')
            <p class="alert alert-danger mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <br>

    <div class="input-group row">
        <label for="description" class="col-sm-2 col-form-label">Описание: </label>
        <div class="col-sm-6">
            <textarea name="desc" id="description"
                class="form-control @error('desc') is-invalid @enderror">{{ old('desc', $category->desc ?? '') }}</textarea>
            @error('desc')
            <p class="alert alert-danger mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <br>

    <div class="input-group row">
        <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
        <div class="col-sm-6">
            <div class="custom-file" style="width:100%">
                <input type="file" accept=".jpeg, .png, .jpg, .gif, .svg, .ico" @error('img') is-invalid @enderror
                    name="img" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile" data-browse="Выбрать">Выберите файл</label>
            </div>
            @isset($category->img)
            <img src="{{ Storage::url($category->img) }}" class="mt-2" style="max-height:240px">
            @endisset
            @error('img')
            <p class="alert alert-danger mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <button class="btn btn-success">Сохранить</button>
</form>
@endsection
