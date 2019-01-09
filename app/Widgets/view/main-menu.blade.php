<a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

<nav class="header__nav-wrap">

    <h2 class="header__nav-heading h6">Site Navigation</h2>

    <ul class="header__nav">
        <li class="current"><a href="/" title="">Главная</a></li>
        <li class="has-children">
            <a href="#" title="">Категории</a>
            <ul class="sub-menu">
                @if ($categories)
                    @foreach($categories as $category)
                    <li><a href="{{ asset(\App\Models\Category::$routePrefix . $category->slug) }}">{{ $category->name }}</a></li>
                    @endforeach
                @endif

            </ul>
        </li>
    </ul> <!-- end header__nav -->

    <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

</nav> <!-- end header__nav-wrap -->


{{--@if ($data)--}}
    {{--<a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>--}}

    {{--<nav class="header__nav-wrap">--}}

        {{--<h2 class="header__nav-heading h6">Site Navigation</h2>--}}

        {{--<ul class="header__nav">--}}
    {{--@foreach($data as $item)--}}


    {{--@endforeach--}}
        {{--</ul> <!-- end header__nav -->--}}

        {{--<a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>--}}

    {{--</nav> <!-- end header__nav-wrap -->--}}
{{--@endif--}}