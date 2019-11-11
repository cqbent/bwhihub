@extends('layouts.app')

@section('page-top')
  @include('partials.page-top')
@endsection

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-single-'.get_post_type())
  @endwhile
@endsection
