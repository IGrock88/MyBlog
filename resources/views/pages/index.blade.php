@extends('layout')

@section('headerWidget')
    @widget('topArticles')
@stop



@section('content')
    @widget('articles', ['articles' => $articles])
@stop