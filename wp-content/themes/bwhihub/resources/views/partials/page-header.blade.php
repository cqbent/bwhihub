@php
  if (is_home()) {
	  $posts_page = get_option( 'page_for_posts' );
    $img = get_the_post_thumbnail($posts_page);
  }
  else {
    $img = get_the_post_thumbnail();
  }
@endphp
<div class="page-header">
  <div class="page-image">
    @php print $img; @endphp
  </div>
  <h1>{!! App::title() !!}</h1>
  <div class="intro">
    @php print get_field('intro') @endphp
  </div>
</div>
