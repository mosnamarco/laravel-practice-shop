@extends('layouts.app')
@section('content')
    <x-product-list :products="$products" :admin="$admin"></x-product-list>   
@endsection