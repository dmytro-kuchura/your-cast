<section id="contact" class="contact-area contact-bg  pt-50 pb-100 p-relative fix"
         style="background-image: url('/img/shape/header-sape8.png'); background-position: right center; background-size: auto;background-repeat: no-repeat;">
    <div class="container">

        <div class="row">
            <div class="col-lg-6">
                <div class="contact-img2">
                    <img src="/img/bg/illustration.png" alt="test">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-title mb-40">
                    <h2>Contacts to us</h2>
                    <p>Ask everything about this podcast platform what you need!</p>
                </div>
                <form action="api/v1/contacts-form" class="contact-form">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="contact-field p-relative c-name mb-20">
                                <input name="name" id="name" type="text" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="contact-field p-relative c-email mb-20">
                                <input name="email" id="email" type="text" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="contact-field p-relative c-message mb-45">
                                <textarea name="message" id="message" cols="10" rows="10"
                                          placeholder="Write comments"></textarea>
                            </div>
                            <input type="hidden" name="token" value="{{ csrf_token() }}">
                            <button class="btn">Send Message</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>

</section>
