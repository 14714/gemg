@extends('layouts.app')

@section('content')
    <home-component :user="{{ (auth()->check()) ? Auth::user() : 'null' }}"></home-component>
@endsection