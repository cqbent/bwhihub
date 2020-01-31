
@if( have_rows('landing_page_content') )

	<?php while( have_rows('landing_page_content') ): the_row(); ?>
    @if (get_row_layout() == 'content_block')
      <!-- wrapper with class, title, text, image !-->
      @php
        $classes = ''; $image = ''; $background_style = '';
        $classes = implode(' ', get_sub_field('styling')) . ' ' . get_sub_field('custom_class');
        $image = get_sub_field('image');
        if ($image) {
          $background_url = wp_get_attachment_image_url($image['ID'], 'full');
          $background_style = 'style=background-image:url(' . $background_url . ')';
        }
      @endphp
      <div class="content-block {{ $classes }}" @php if (strstr($classes, 'background-image')): print $background_style; endif; @endphp>
        <div class="container">
          @if(get_sub_field('title'))
            <h3 class="title">{{ get_sub_field('title') }}</h3>
          @endif
          <div class="text">
            {!! get_sub_field('text') !!}
          </div>
        </div>
        <div class="image" @php if (strstr($classes, 'image-column')): print $background_style; endif; @endphp></div>
      </div>
    @endif
	<?php endwhile; ?>
@endif
