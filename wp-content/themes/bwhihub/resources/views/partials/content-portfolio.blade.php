<div class="col-sm-6 col-md-4 item">
  <div class="teaser" data-toggle="modal" data-target="#portfolio_{{ the_ID() }}">
    <div class="image">{{ the_post_thumbnail() }}</div>
    <div class="title">{{ the_title() }}</div>
  </div>
  <div class="portfolio-detail modal fade" id="portfolio_{{ the_ID() }}" tabindex="-1" role="dialog" aria-labelledby="portfolioLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="fal fa-times"></i>
          </button>
          <div class="image">{{ the_post_thumbnail() }}</div>
          <h3 class="title">{{ the_title() }}</h3>
          <div class="row">
            <div class="col-sm-3 label">Summary</div>
            <div class="col-sm-9 description">
              {{ the_content() }}
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3 label">Lead</div>
            <div class="col-sm-9 description">
              {{ the_field('lead') }}
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3 label">How iHub Helped</div>
            <div class="col-sm-9 description">
              {{ the_field('how_helped') }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
