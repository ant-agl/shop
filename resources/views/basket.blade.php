@extends('layouts.app')

@section('title', 'Корзина')

@section('content')
<h1>Корзина</h1>
<p>Оформление заказа</p>
<div class="panel">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Название</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th>Стоимость</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->products()->with('category')->get() as $product)
                <tr>
                    <td>
                        <a href="{{ route('product', [$product->category->alias, $product->alias]) }}">
                            <img height="56px" src="{{ Storage::url($product->img) }}">
                            {{ $product->title }}
                        </a>
                    </td>
                    <td>
                        <span class="badge badge-pill badge-secondary">{{ $product->pivot->count }}</span>
                        <div class="btn-group form-inline">
                            <form action="{{ route('basket-remove', $product) }}" method="POST">
                                <button type="submit" class="btn btn-danger mr-1" href="">
                                    -
                                </button>
                                @csrf
                            </form>
                            <form action="{{ route('basket-add', $product) }}" method="POST">
                                <button type="submit" class="btn btn-success" href="">
                                    +
                                </button>
                                @csrf
                            </form>
                        </div>
                    </td>
                    <td>{{ $product->price }} ₽</td>
                    <td>{{ $product->getPriceForCount() }} ₽</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3">Общая стоимость:</td>
                    <td>{{ $order->getFullSum() }} ₽</td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <div class="text-right">
        <a class="btn btn-success" href="{{ route('basket-place') }}">Оформить заказ</a>
    </div>
</div>
</div>
@endsection
