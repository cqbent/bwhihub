{{--
  Template Name: Landing Page
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
    @include('partials.content-page')
    @include('partials.content-landing')
  @endwhile
@endsection
