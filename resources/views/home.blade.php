@extends('layouts.app')

@section('content')
@include('posts', [
    'inHome' => true
])
@endsection