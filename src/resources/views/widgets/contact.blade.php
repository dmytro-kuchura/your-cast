<div id="contact" class="bg-green">
    <div class="row no-margin no-padding">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 center-col text-center no-padding uk-flex uk-flex-middle">
            <img src="images/backgrounds/contacts.jpg" alt="" data-uk-scrollspy="cls:uk-animation-slide-bottom-medium"/>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 uk-flex uk-flex-middle">
            <div class="container-small sm-container-spread md-padding-top-bottom-100px">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center-col text-left no-padding">
                        <div data-uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-medium; delay: 200">
                            <div class="text-left">
                                <h5 class="text-weight-800 text-white margin-bottom-20px sm-margin-bottom-5px">
                                    Contacts to us
                                </h5>
                                <img class="margin-bottom-20px" src="images/separator-light.png" alt=""/>
                                <p class="text-gray-light margin-bottom-20px">
                                    <span class="text-gray-light margin-right-10px" data-uk-icon="icon: info; ratio: 1"></span>
                                    Ask everything about this podcast platform what you need!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <form class="contact-form" method="post" action="contact.php">
                        <div class="messages"></div>
                        <div class="controls"
                             data-uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-medium; delay: 200">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input
                                            class="form-control form_name bg-white no-border no-margin-top bordar-radius-5 ext-gray-extra-dark text-weight-400"
                                            type="text" name="name" placeholder="Your Name *" required="required"
                                            data-error="Your Name Required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input
                                            class="form-control form_email bg-white no-margin-top text-gray-extra-dark text-weight-400"
                                            type="text" name="name" placeholder="Email *" required="required"
                                            data-error="Email is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group no-margin-bottom">
                                        <textarea
                                            class="form-control height-100px form_message bg-white no-margin-top text-gray-extra-dark text-weight-400"
                                            name="message" placeholder="Ask your question *" rows="4"
                                            required="required" data-error="Please,leave us a message."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="hidden" name="token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn-send btn btn-large btn-white no-margin-bottom"
                                           value="Send">
{{--                                    <p class="no-margin-bottom margin-top-20px no-margin-bottom text-gray-light text-small">--}}
{{--                                        * By using this form you are accepting our--}}
{{--                                        <a href="#" class="text-white text-underline">--}}
{{--                                            privacy policy.--}}
{{--                                        </a>--}}
{{--                                    </p>--}}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
