{{--
  Template Name: Sub Page Template
--}}

@extends('layouts.app')

@section('page-top')
  @include('partials.page-top')
@endsection

@section('content')
  @while(have_posts()) @php the_post() @endphp
  <h1>{!! App::title() !!}</h1>
  @include('partials.content-page')
  @endwhile
@endsection
