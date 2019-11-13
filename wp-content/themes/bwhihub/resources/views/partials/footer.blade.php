<footer class="content-info">
  <div class="site-info">
    <div class="container">
      <div class="row footer-row">
        <div class="column logo col-md-4">
          <a href="{{ home_url('/') }}">
            <img src="{{ get_stylesheet_directory_uri() }}/assets/images/bwhihub_logo_footer.png" alt="{{ get_bloginfo('name', 'display') }}" />
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
            <form>
              <div><strong>Stay in touch with the Innovation Hub</strong></div>
              <input type="text" placeholder="Email address" name="cc-input" />
              <div>By submitting this form, you are consenting to receive null from: Brigham and Women’s Hospital,
                75 Francis Street, Boston, MA, 02115, US, http://bwhresearch.org. You can revoke your consent to receive emails at any time by
                using the SafeUnsubscribe® link, found at the bottom of every email. Emails are serviced by Constant Contact.</div>
              <input type="button" class="btn btn-primary green" value="Sign up">
            </form>
          </div>
        </div>
      </div>
      <div class="sidebar">
        @php(dynamic_sidebar('sidebar-footer'))
      </div>
    </div>
  </div>
</footer>

