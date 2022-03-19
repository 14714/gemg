@extends('layouts.app')

@section('content')
    <news-component :user="{{ (auth()->check()) ? Auth::user() : 'null' }}"></news-component>
@endsection