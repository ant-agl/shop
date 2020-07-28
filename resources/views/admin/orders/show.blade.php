@extends('admin.layouts.app')

@section('title', 'Заказ ' . $order->id)

@section('content')
@include('auth.orders.show')
@endsection
