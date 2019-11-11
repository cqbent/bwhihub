@php
$posttype = get_post_type(get_the_ID());
@endphp
<div class="section-header">
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
@if (bwhihub_sub_menu())
  <div class="section-submenu">
    {!! bwhihub_sub_menu() !!}
  </div>
@endif
