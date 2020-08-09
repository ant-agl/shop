@extends('admin.layouts.app')

@section('title', 'Категории')

@section('content')
<div class="col-md-12">
    <h1>Категории</h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ссылка</th>
                    <th>Название</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->alias }}</td>
                    <td>{{ $category->title }}</td>
                    <td>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                            @csrf
                            <a class="btn btn-success"
                                href="{{ route('admin.categories.show', $category) }}">Открыть</a>
                            <a class="btn btn-warning"
                                href="{{ route('admin.categories.edit', $category) }}">Редактировать</a>
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Удалить">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $categories->links() }}
    <a class="btn btn-success" href="{{ route('admin.categories.create') }}">Добавить категорию</a>
</div>
@endsection
