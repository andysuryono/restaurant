@extends('layouts.manager')

@section('header')
	@include('manager.header')
@endsection

@section('sidebar')
	@include('manager.sidebar')
@endsection

@section('content')
	@include('manager.content_prices')
@endsection