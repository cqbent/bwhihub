<div class="col-sm-6 col-md-4 item">
  <a href="{{ the_permalink() }}">
    <div class="image">
      {{ the_post_thumbnail() }}
    </div>
    <div class="info">
      <div class="name">
        {{ the_title() }}
      </div>
      <div class="position">
        {{ the_field('position') }}
      </div>
    </div>
  </a>
</div>
