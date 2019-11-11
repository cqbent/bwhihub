<footer class="content-info">
  <div class="site-info">
    <div class="container">
      <div class="row footer-row">
        <div class="column logo col-md-4">
          <a href="{{ home_url('/') }}">
            <img src="{{ get_stylesheet_directory_uri() }}/assets/images/ihub_logo_footer_white.png" alt="{{ get_bloginfo('name', 'display') }}" />
          </a>
          <div class="contact-info">
            60 Fenwood Rd.<br />
            Boston, MA 02115 USA
          </div>
        </div>
        <div class="column col-md-4">
          <div class="inquiries">
            <p>
              <strong>General Inquiries</strong><br />
              <a href="mailto:ihub@partners.org">ihub@partners.org</a>
            </p>
            <p>
              <strong>Collaboration Requests</strong><br />
              <a href="mailto:ihub@partners.org">Get in touch with us</a>
            </p>
          </div>
        </div>
        <div class="column col-md-4">
          <div class="cc-form">
            [constant contact form]
          </div>
        </div>
      </div>
      <div class="sidebar">
        @php(dynamic_sidebar('sidebar-footer'))
      </div>
    </div>
  </div>
</footer>

