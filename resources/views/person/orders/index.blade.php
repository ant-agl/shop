@extends('layouts.app')

@section('title', 'Мои заказы')

@section('content')
@include('auth.orders.index')
@endsection
