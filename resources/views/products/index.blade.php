@extends('layouts.app')

@section('content')

@foreach($products as $product)

    {{$product->fa_title}}

@endforeach

@endsection
