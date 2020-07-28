@extends('admin.layouts.app')

@section('title', 'Все заказы')

@section('content')
@include('auth.orders.index')
@endsection
