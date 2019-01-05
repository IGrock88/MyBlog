@extends('layout')

@section('headerWidget')
    @widget('topArticles')
@stop



@section('content')
    <section class="s-content">
    @widget('articles')
    </section>
@stop