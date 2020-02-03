{{--
  Template Name: Simple Page template
--}}

@extends('layouts.app')

@section('page-top')
  @include('partials.page-top')
@endsection

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <div class="content-container">
      <h1>{!! App::title() !!}</h1>
      @php the_content() @endphp
    </div>
  @endwhile
@endsection
