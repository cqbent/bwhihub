@php
  $img = get_the_post_thumbnail_url();
@endphp
<div class="page-header">
  <div class="page-image">
    {!! the_post_thumbnail() !!}
  </div>
  <h1>{!! App::title() !!}</h1>
  <div class="intro">
    @php print get_field('intro') @endphp
  </div>
</div>
