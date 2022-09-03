<section class="newslater-area pt-90 pb-100"
         style="background-image: url(img/bg/subscribe-bg.png);background-size: cover;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">
                <div class="section-title text-center pl-40 pr-40 mb-50">
                    <h2>Subscribe for newsletter</h2>
                    <p>Subscribing up for our newsletter/s, you agree that you may occasionally receive additional
                        communications from YourCast to inform you of news and updates that we think you might be
                        interested in. You hereby consent processing of your personal data (e-mail address) for these
                        purposes and as further described in our Privacy Policies. You may withdraw your consent at any
                        time.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-10">
                <form name="ajax-form" action="api/v1/subscribers-form" class="contact-form newslater">
                    <div class="form-group">
                        <input class="form-control" id="email2" name="email" type="email"
                               placeholder="Email Address..." value="" required="">
                        <input type="hidden" name="token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-custom" id="send2">Subscribe Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
