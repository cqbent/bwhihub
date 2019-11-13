{{--
  Template Name: Sub Page Template
--}}

@extends('layouts.app')

@section('page-top')
  @include('partials.page-top')
@endsection

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    <div class="content-container row">
      <div class="col-sm-4 left-sidebar-content">
        {!! get_field('left_sidebar_content') !!}
      </div>
      <div class="col-sm-8 main-content">
        @php the_content() @endphp
      </div>
    </div>
  @endwhile
@endsection
