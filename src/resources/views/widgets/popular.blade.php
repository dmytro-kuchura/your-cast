@if($popular)
    <div id="clients" class="padding-top-bottom-100px bg-black">
        <div class="container">
            <div class="row no-margin no-padding">
                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 center-col">
                    <div data-uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-medium; delay: 200">
                        <div class="text-left">
                            <h5 class="text-weight-800 text-white margin-bottom-20px sm-margin-bottom-5px">
                                Podcasting made simple.
                            </h5>
                            <img class="margin-bottom-20px" src="images/separator-light.png" alt=""/>
                            <p>
                                <span class="text-green margin-right-10px" data-uk-icon="icon: info; ratio: 1"></span>
                                Reach your audience anywhere, any time, across any podcast listening app —
                                including Apple Podcasts, Google Podcasts, Spotify, Amazon Music, Samsung Free, and
                                hundreds of others.
                            </p>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-6 col-md-12 col-sm-12 col-xs-12 center-col uk-flex uk-flex-middle md-padding-top-100px">
                    <div data-uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-medium; delay: 200">
                        <p class="text-center no-margin">
                            <span class="text-green text-center margin-right-10px"
                                  data-uk-icon="icon: info; ratio: 1"></span>
                            Popular shows:
                        </p>
                        <div
                            class="separator width-50 center-col bottom-border border-1px border-color-gray-extra-dark margin-top-50px margin-bottom-50px"></div>
                        <div class="row text-center margin-auto">
                            @foreach($popular as $item)
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                    <a href="{{ route('web.detail', ['token' => $item->token]) }}">
                                        <img class="opacity-7" alt="" src="{{ $item->artwork }}"/>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
