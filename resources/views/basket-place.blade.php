@extends('layouts.app')

@section('title', 'Оформить заказ')

@section('content')
<h1>Подтвердите заказ:</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p>Общая стоимость: <b>{{ $order->getFullSum() }} ₽</b></p>
            <p>Укажите свои имя и номер телефона, чтобы наш менеджер мог с вами связаться:</p>
        </div>
        <div class="col-md-8">
            <form action="{{ route('basket-confirm', $order) }}" method="POST">
                @csrf
                <div class="form-group text-left">
                    <label for="name">Имя: </label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                        value="{{ old('name') }}" class="form-control">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group text-left">
                    <label for="phone">Номер телефона: </label>
                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone"
                        value="{{ old('phone') }}" class="form-control">
                    @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <br>
                <input type="submit" class="btn btn-success" value="Подтвердите заказ">
            </form>
        </div>
    </div>
</div>
@endsection
