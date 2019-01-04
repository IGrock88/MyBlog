<!-- s-content
================================================== -->
@if ($articles)
<section class="s-content">

    <div class="row masonry-wrap">
        <div class="masonry">
            <div class="grid-sizer"></div>
                @foreach($articles as $article)
                    @include('Widgets::articles.single-article')
                @endforeach
        </div> <!-- end masonry -->
    </div> <!-- end masonry-wrap -->

    <div class="row">
        <div class="col-full">
            <nav class="pgn">
                {{ $articles->links() }}
            </nav>
        </div>
    </div>

</section> <!-- s-content -->

@endif




