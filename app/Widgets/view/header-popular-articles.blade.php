<?php
/**
 * @var \App\Models\Article[] $articles
 * @var \App\Models\Article $mostPopular
 */
?>

@if ($mostPopular)
    <div class="pageheader-content row">
        <div class="col-full">
            <div class="featured">
                <div class="featured__column featured__column--big">
                    <div class="entry" style="background-image:url({{asset('uploads/' . $mostPopular->titleImage)}});">

                        <div class="entry__content">
                        <span class="entry__category">
                            <a href="{{ asset(\App\Models\Category::$routePrefix . $mostPopular->category->slug) }}">{{$mostPopular->category->name}}</a>
                        </span>

                            <h1><a href="{{asset(\App\Models\Article::$routePrefix . $mostPopular->slug)}}" title="">{{$mostPopular->title}}</a></h1>

                            <div class="entry__info">
                                <a href="#0" class="entry__profile-pic">
                                    <img class="avatar" src="{{ $mostPopular->author->avatar }}" alt="">
                                </a>

                                <ul class="entry__meta">
                                    <li><a href="#0">{{$mostPopular->author->name}}</a></li>

                                    <li>{{ $mostPopular->created_at->format('d-m-Y') }}</li>
                                </ul>
                            </div>
                        </div> <!-- end entry__content -->

                    </div> <!-- end entry -->
                </div> <!-- end featured__big -->
                @if ($articles)
                    <div class="featured__column featured__column--small">

                        @foreach($articles as $article)
                            <div class="entry"
                                 style="background-image:url({{asset('uploads/' . $article->titleImage)}});">

                                <div class="entry__content">
                                    <span class="entry__category"><a
                                                href="{{ asset(\App\Models\Category::$routePrefix . $article->category->slug) }}">{{$article->category->name}}</a></span>

                                    <h1><a href="{{asset(\App\Models\Article::$routePrefix . $article->slug)}}" title="">{{ $article->title }}</a></h1>

                                    <div class="entry__info">
                                        <a href="#0" class="entry__profile-pic">
                                            <img class="avatar" src="{{ $article->author->avatar }}" alt="">
                                        </a>

                                        <ul class="entry__meta">
                                            <li><a href="#0">{{ $article->author->name }}</a></li>
                                            <li>{{ $article->created_at->format('d-m-Y') }}</li>
                                        </ul>
                                    </div>
                                </div> <!-- end entry__content -->

                            </div> <!-- end entry -->
                        @endforeach
                    </div> <!-- end featured__small -->
                @endif
            </div> <!-- end featured -->
        </div> <!-- end col-full -->
    </div> <!-- end pageheader-content row -->
@endif