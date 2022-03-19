@extends('layouts.app')

@section('content')    
    <news-show :noticia=" {{$noticia}} " ></news-show>
@endsection