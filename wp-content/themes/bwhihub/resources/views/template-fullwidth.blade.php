{{--
  Template Name: Full Width Page
--}}

@extends('layouts.app')

@section('page-top')
  @include('partials.page-top')
  @if (is_front_page())
    {!! bwhihub_carousel() !!}
  @endif
@endsection

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    <div class="content-container">
      @php the_content() @endphp
    </div>
  @endwhile
@endsection
