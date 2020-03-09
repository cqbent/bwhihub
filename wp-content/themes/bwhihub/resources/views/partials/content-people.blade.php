<div class="col-sm-6 col-md-4 col-lg-3 item" data-toggle="modal" data-target="#people_{{ the_ID() }}">
  @if ($candid_image = get_field('candid_photo'))
    <div class="image has-candid">
      {{ the_post_thumbnail() }}
      <img class="candid" src="{{ $candid_image['url'] }}" alt="{{ $candid_image['alt'] }}" />
    </div>
  @else
    <div class="image">
      {{ the_post_thumbnail() }}
    </div>
  @endif
  <div class="info">
    <div class="name">
      {{ the_title() }}
    </div>
    <div class="position">
      {{ the_field('position') }}
    </div>
  </div>
  <div class="people-detail modal fade" id="people_{{ the_ID() }}" tabindex="-1" role="dialog" aria-labelledby="peopleLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="fal fa-times"></i>
          </button>
          <div class="row people-bio">
            <div class="col-sm-4">
              {!! the_post_thumbnail('full') !!}
            </div>
            <div class="col-sm-8">
              <div class="page-title">
                <h2>{{ the_title() }}</h2>
              </div>
              <div class="position">
                {{ the_field('position') }}
              </div>
              <div class="bio">
                {{ the_content() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
