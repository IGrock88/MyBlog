@extends('layout')

@section('title')

    {{config('app.name') . ' - ' . $category->name }}
@stop

@section('content')
    @if ($category)
        <section class="s-content">
            <div class="row narrow">
                <div class="col-full s-content__header" data-aos="fade-up">
                    <h1>{{ $category->name }}</h1>

                    @if ($category->text != null)
                        <p class="lead">{{$category->text}}</p>
                    @endif
                </div>
            </div>
            @widget('articles', ['data' => ['categoryId' => $category->id]])
        </section>
    @endif
@stop