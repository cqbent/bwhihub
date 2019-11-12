@php
  $thumb = get_the_post_thumbnail();
  $img = $thumb ? $thumb : '<img src="' . get_stylesheet_directory_uri() . '/assets/images/ihub_logo.svg" style="width:80%" />';
@endphp

<article @php post_class('row') @endphp>
  <div class="col-sm-2 thumb">
    {!! $img !!}
  </div>
  <div class="col-sm-10 teaser">
    <header>
      <h3 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h3>
      @include('partials/entry-meta')
    </header>
    <div class="entry-summary">
      @php the_excerpt() @endphp
    </div>
  </div>

</article>
