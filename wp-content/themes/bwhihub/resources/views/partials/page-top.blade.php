@php
$posttype = get_post_type(get_the_ID());
@endphp
<div class="section-header">
  <div class="breadcrumbs container" typeof="BreadcrumbList" vocab="https://schema.org/">
    @php
      if (function_exists('bcn_display')) {
        bcn_display();
      }
    @endphp
  </div>
  <div class="section-bar">
    <div class="container">
      <h1 class="page-title">
        @php
          if ($posttype != 'post') {
            print bwhihub_section_header();
          }
          else {
            print bwhihub_section_header('News & Events');
          }
        @endphp
      </h1>
    </div>
  </div>
</div>

