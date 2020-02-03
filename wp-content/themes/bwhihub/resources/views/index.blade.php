@extends('layouts.app')

@section('page-top')
  @include('partials.page-top')
@endsection

@section('content')
    <h1>{!! App::title() !!}</h1>
    @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Sorry, no results were found.', 'sage') }}
      </div>
      {!! get_search_form(false) !!}
    @endif
    <div class="content-container">
      @while (have_posts()) @php the_post() @endphp
      @include('partials.content-'.get_post_type())
      @endwhile
    </div>


    {!! get_the_posts_navigation() !!}

@endsection
