@extends('admin.layouts.app')

@section('title', 'Товары')

@section('content')
<div class="col-md-12">
    <h1>Товары</h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    {{-- <th>Ссылка</th> --}}
                    <th>Название</th>
                    <th>Категория</th>
                    {{-- <th>Кол-во</th> --}}
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    {{-- <td>{{ $product->alias }}</td> --}}
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->category->title }}</td>
                    {{-- <td>0</td> --}}
                    <td>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                            @csrf
                            <a class="btn btn-success" href="{{ route('admin.products.show', $product) }}">Открыть</a>
                            <a class="btn btn-warning"
                                href="{{ route('admin.products.edit', $product) }}">Редактировать</a>
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Удалить">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $products->links() }}
    <a class="btn btn-success" href="{{ route('admin.products.create') }}">Добавить товар</a>
</div>
@endsection
