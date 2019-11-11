@extends('layouts.app')

@section('page-top')
  @include('partials.page-top')
@endsection

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <h3><a href="/who-we-are/team">THE TEAM</a></h3>
    <div class="row people-bio">
      <div class="col-sm-4">
        {!! the_post_thumbnail('full') !!}
      </div>
      <div class="col-sm-8">
        <div class="page-title">
          <h1>{{ the_title() }}</h1>
        </div>
        <div class="position">
          {{ the_field('position') }}
        </div>
        <div class="bio">
          {{ the_content() }}
        </div>
      </div>
    </div>
  @endwhile
@endsection
