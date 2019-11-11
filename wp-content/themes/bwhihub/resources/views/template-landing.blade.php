{{--
  Template Name: Landing Page
--}}

@extends('layouts.app')

@section('page-top')
  @include('partials.page-top')
  @if (is_front_page())
    {!! bwhihub_carousel() !!}
  @endif
  @if (get_field('hero_image_with_text'))
    @php
      $hero = get_field('hero_image_with_text');
      $image = $hero['image']['url'];
      $text = $hero['text']
    @endphp
    <div class="hero d-flex align-items-center justify-content-center" style="background-image: url({{ $image }})">
      <div class="text">
        {!! $text !!}
      </div>
    </div>
  @endif
@endsection

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-landing')
  @endwhile
@endsection
