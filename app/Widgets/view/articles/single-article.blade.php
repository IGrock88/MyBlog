<article class="masonry__brick entry format-standard" data-aos="fade-up">

    @if ($article->titleImage)
        <div class="entry__thumb">
            <a href="{{asset(\App\Models\Article::$routePrefix . $article->slug)}}" class="entry__thumb-link">
                <img class="article_item__image" src="{{asset('uploads/' . $article->titleImage)}}" alt="">
            </a>
        </div>
    @endif
    <div class="entry__text">
        <div class="entry__header">

            <div class="entry__date">
                <a href="single-standard.html">{{ $article->created_at->format('d-m-Y') }}</a>
            </div>
            <h1 class="entry__title"><a href="{{asset(\App\Models\Article::$routePrefix . $article->slug)}}">{{ $article->title }}</a></h1>

        </div>
        <div class="entry__excerpt">
            <p>
                {{ $article->preview }}
            </p>
        </div>
        @if ($article->category)
            <div class="entry__meta">
            <span class="entry__meta-links">
                <a href="{{asset(\App\Models\Category::$routePrefix . $article->category->slug)}}">{{ $article->category->name }}</a>
            </span>
            </div>
        @endif
    </div>
</article> <!-- end article -->

