<footer class="content-info">
  <div class="site-info">
    <div class="container">
      <div class="row footer-row">
        <div class="column logo col-md-4">
          <a href="{{ home_url('/') }}">
            <img src="{{ get_stylesheet_directory_uri() }}/assets/images/ihub_logo_bottom_banner.svg" alt="{{ get_bloginfo('name', 'display') }}" />
          </a>
          <div class="contact-info">
            <p>Hale Building for Transformative Medicine (BTM), 60 Fenwood Rd, 3rd Floor, Boston, MA 02115</p>
            <p>Navigation: <a href="https://maps.brighamandwomens.org/#home?to=inv_hub">Directions to Brigham Digital Innovation Hub</a></p>
            <p>Don’t have the App yet? Find BWH Maps in the <a href="#"><strong>Apple App Store</strong></a> or <a href="#"><strong>Google Play Store</strong></a>. </p>
          </div>
        </div>
        <div class="column col-md-4">
          <div class="inquiries">
            <p>
              <strong>General Inquiries</strong><br />
              <a href="mailto:ihub@partners.org">ihub@partners.org</a>
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

