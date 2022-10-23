@extends('front3.template.app')
@section('title', 'Home')
@section('content')
    <section id="slider" class="slider slide-overlay-black">

        <div class="rev_slider_wrapper">
            <div id="slider1" class="rev_slider" data-version="5.0">
                <ul>

                    <li data-transition="zoomin" data-slotamount="default" data-easein="Power4.easeInOut"
                        data-easeout="Power4.easeInOut" data-masterspeed="2000">

                        <img src="{{ asset('front3/images/sliders/slide-bg/2.jpg') }}" alt="Slide Background Image"
                            width="1920" height="1280">

                        <div class="tp-caption" data-x="['center','center','center','center']"
                            data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['-110','-100','-90','-40']" data-fontsize="['16','16','16','12']"
                            data-lineheight="['25','25','25','25']" data-whitespace="nowrap" data-width="none"
                            data-height="none"
                            data-frames='[{"delay":750,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-responsive_offset="on" data-responsive="off">
                            <div class="slide--subheadline text-center">Instant, Secure & Private</div>
                        </div>

                        <div class="tp-caption" data-x="['center','center','center','center']"
                            data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['-13','-13','-13','10']" data-fontsize="['60', '50', '40', '30']"
                            data-lineheight="['60','60','60','60']" data-width="none" data-height="none"
                            data-transform_idle="o:1;"
                            data-frames='[{"delay":1000,"speed":1000,"frame":"0","from":"z:0;rX:0deg;rY:0;rZ:0;sX:2;sY:2;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-splitin="none" data-responsive_offset="on">
                            <div class="slide--headline text-center">Find & Compare The Best
                                <br>Cryptocurrency Exchange Rates
                            </div>
                        </div>

                        <div class="tp-caption" data-x="['center','center','center','center']"
                            data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['90','90','80','80']" data-fontsize="['16', '16', '16', '12']"
                            data-lineheight="['25','25','25','25']" data-width="none" data-height="none"
                            data-frames='[{"delay":1250,"speed":1500,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-splitin="none" data-splitout="none" data-responsive_offset="on">
                            <div class="slide--bio text-center">Buy And Sell Cryptocurrency Near You!</div>
                        </div>

                        <div class="tp-caption" data-x="['center','center','center','center']"
                            data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['160','160','160','190']" data-width="none" data-height="none"
                            data-whitespace="nowrap"
                            data-frames='[{"delay":1500,"speed":1500,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                            data-splitin="none" data-splitout="none" data-basealign="slide" data-responsive_offset="on"
                            data-responsive="on">
                            <div class="slide-action">
                                <a class="btn btn--white btn--bordered btn--rounded" href="#">Get Started</a>
                            </div>
                        </div>
                    </li>

                    <li data-transition="slideremoveup" data-slotamount="default" data-easein="Power4.easeInOut"
                        data-easeout="Power4.easeInOut" data-masterspeed="2000">

                        <img src="{{ asset('front3/images/sliders/slide-bg/3.jpg') }}" alt="Slide Background Image"
                            width="1920" height="1280">

                        <div class="tp-caption" data-x="['center','center','center','center']"
                            data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['-110','-100','-90','-40']" data-fontsize="['16','16','16','12']"
                            data-lineheight="['25','25','25','25']" data-whitespace="nowrap" data-width="none"
                            data-height="none"
                            data-frames='[{"delay":750,"speed":1000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-splitin="none" data-splitout="none" data-responsive_offset="on">
                            <div class="slide--subheadline">Exchange Cryptocurrency At The Best Rate</div>
                        </div>

                        <div class="tp-caption" data-x="['center','center','center','center']"
                            data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['-13','-13','-13','10']" data-fontsize="['60', '50', '40', '30']"
                            data-lineheight="['60','60','60','60']" data-width="none" data-height="none"
                            data-frames='[{"delay":1000,"speed":1500,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-splitin="none" data-splitout="none" data-responsive_offset="on">
                            <div class="slide--headline text-center">Start Trading The World's Most
                                <br>Popular Cryptocurrencies!
                            </div>
                        </div>

                        <div class="tp-caption" data-x="['center','center','center','center']"
                            data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['90','90','80','80']" data-fontsize="['16', '16', '16', '12']"
                            data-lineheight="['25','25','25','25']" data-width="none" data-height="none"
                            data-frames='[{"delay":1250,"speed":1500,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-splitin="none" data-splitout="none" data-responsive_offset="on">
                            <div class="slide--bio text-center">Just Enjoy Your Best Rates While We Are Doing
                                The Rest For You</div>
                        </div>

                        <div class="tp-caption" data-x="['center','center','center','center']"
                            data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['160','160','160','190']" data-width="none" data-height="none"
                            data-whitespace="nowrap"
                            data-frames='[{"delay":1500,"speed":1500,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-splitin="none" data-splitout="none" data-basealign="slide" data-responsive_offset="on"
                            data-responsive="off">
                            <div class="slide-action">
                                <a class="btn btn--primary btn--rounded mr-30" href="#">Get Started</a>
                                <a class="btn btn--video popup-video"
                                    href="https://www.youtube.com/watch?v=nrJtHemSPW4"><i class="fa fa-play"></i>Watch
                                    Video</a>
                            </div>
                        </div>
                    </li>

                    <li data-transition="slidingoverlaydown" data-slotamount="default" data-easein="Power4.easeInOut"
                        data-easeout="Power4.easeInOut" data-masterspeed="2000">

                        <img src="{{ asset('front3/images/sliders/slide-bg/4.jpg') }}" alt="Slide Background Image"
                            width="1920" height="1280">

                        <div class="tp-caption" data-x="['center','center','center','center']"
                            data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['-110','-100','-90','-40']" data-fontsize="['16','16','16','12']"
                            data-lineheight="['25','25','25','25']" data-whitespace="nowrap" data-width="none"
                            data-height="none"
                            data-frames='[{"delay":1500,"speed":1500,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                            data-splitin="none" data-splitout="none" data-responsive_offset="on">
                            <div class="slide--subheadline">Instant, Secure & Private</div>
                        </div>

                        <div class="tp-caption" data-x="['center','center','center','center']"
                            data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['-13','-13','-13','10']" data-fontsize="['60', '50', '40', '30']"
                            data-lineheight="['60','60','60','60']" data-width="none" data-height="none"
                            data-transform_idle="o:1;"
                            data-frames='[{"delay":1000,"speed":1500,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-splitin="none" data-splitout="none" data-responsive_offset="on">
                            <div class="slide--headline text-center">Find & Compare The Best
                                <br>Cryptocurrency Exchange Rates
                            </div>
                        </div>

                        <div class="tp-caption" data-x="['center','center','center','center']"
                            data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['90','90','80','80']" data-fontsize="['16', '16', '16', '12']"
                            data-lineheight="['25','25','25','25']" data-width="none" data-height="none"
                            data-frames='[{"delay":1250,"speed":1500,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-splitin="none" data-splitout="none" data-responsive_offset="on">
                            <div class="slide--bio text-center">Buy And Sell Cryptocurrency Near You!</div>
                        </div>

                        <div class="tp-caption" data-x="['center','center','center','center']"
                            data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['160','160','160','190']" data-width="none" data-height="none"
                            data-whitespace="nowrap"
                            data-frames='[{"delay":1500,"speed":1500,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                            data-splitin="none" data-splitout="none" data-basealign="slide" data-responsive_offset="on"
                            data-responsive="off">
                            <div class="slide-action">
                                <a class="btn btn--white btn--bordered btn--rounded" href="#">Get Started</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>

    </section>


    <section id="BitcoinWidget" class="xchange-rate">
        <div class="container">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                    <div class="heading heading-1 mb-50 text--center">
                        <p class="heading--subtitle">Top Cryptos</p>
                        <h2 class="heading--title">Exchange Rates</h2>
                        <p class="heading--desc mb-0">Bitcoin is different than any currency you’ve used
                            before, so it’s very important to understand some key points. </p>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <div class="bitcoin-pricing"></div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-8">
                    <div class="btcwdgt-custom">
                        <div class="btcwdgt-chart" bw-theme="light"></div>
                    </div>
                </div>

            </div>

        </div>

    </section>


    <section id="featured1" class="featured featured-1 bg-overlay bg-overlay-dark2 bg-parallax pb-0">
        <div class="bg-section">
            <img src="{{ asset('front3/images/background/1.jpg') }}" alt="Background" />
        </div>
        <div class="container-fluid pr-0 pl-0">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 wow fadeInLeft" data-wow-delay="100ms">
                    <div class="featured-img">
                        <img src="{{ asset('front3/images/mockups/laptop-mockup.png') }}" alt="Laptop Mockup">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-5 col-content">
                    <div class="heading heading-6 mb-50 fadeInRight" data-wow-delay="100ms">
                        <h2 class="heading--title text-white">Take Your First Steps to Becoming a Bitcoiner
                            Today!</h2>
                        <p class="heading--desc text-gray mb-20">Now you can start trading Bitcoin, Ethereum
                            and many cryptocurrencies fast, easily and safely from where ever you are. With
                            great margin trading leverage and short sell options available with quick deposit
                            & withdrawal capability, you can start trading with us in seconds.</p>
                        <p class="heading--desc text-gray">Cryptocurrencies have become established
                            investment commodities among major financial institutions, and have even been
                            adopted by countries such as Australia and Japan.</p>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4 wow fadeInRight" data-wow-delay="100ms">
                            <div class="feature-card">
                                <div class="feature-card-icon">
                                    <img src="{{ asset('front3/images/icons/BitcoinIcon1.png') }}" alt="Bitcoin Icon">
                                </div>
                                <div class="feature-card-content">
                                    <h3 class="feature-card-title text-white">Quick Deposits and Withdrawals</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-4 wow fadeInRight" data-wow-delay="200ms">
                            <div class="feature-card">
                                <div class="feature-card-icon">
                                    <img src="{{ asset('front3/images/icons/BitcoinIcon2.png') }}" alt="Bitcoin Icon">
                                </div>
                                <div class="feature-card-content">
                                    <h3 class="feature-card-title text-white">Reliable and Smart Platform</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-4 wow fadeInRight" data-wow-delay="300ms">
                            <div class="feature-card">
                                <div class="feature-card-icon">
                                    <img src="{{ asset('front3/images/icons/BitcoinIcon3.png') }}" alt="Bitcoin Icon">
                                </div>
                                <div class="feature-card-content">
                                    <h3 class="feature-card-title text-white">Long and <br>Short Selling</h3>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <section id="featured2" class="featured featured-2 pb-50">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-4 col-md-4 wow fadeInUp" data-wow-delay="100ms">
                    <div class="feature-card">
                        <div class="feature-card-icon">
                            <i class="icon-lock"></i>
                        </div>
                        <div class="feature-card-content">
                            <h3 class="feature-card-title">Protection & Security</h3>
                            <p class="feature-card-desc">Stop loss and take profit orders will help secure
                                your investment. The system will automatically execute trades to realise gains.
                            </p>
                        </div>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-4 col-md-4 wow fadeInUp" data-wow-delay="200ms">
                    <div class="feature-card">
                        <div class="feature-card-icon">
                            <i class="icon-search"></i>
                        </div>
                        <div class="feature-card-content">
                            <h3 class="feature-card-title">Licensed Exchange</h3>
                            <p class="feature-card-desc">Our customers perform transactions not only in
                                cryptocurrency, but the major world currencies supported by the system.</p>
                        </div>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-4 col-md-4 wow fadeInUp" data-wow-delay="300ms">
                    <div class="feature-card">
                        <div class="feature-card-icon">
                            <i class="icon-puzzle"></i>
                        </div>
                        <div class="feature-card-content">
                            <h3 class="feature-card-title">Recurring Buys</h3>
                            <p class="feature-card-desc">Invest in digital currency slowly over time by
                                scheduling buys weekly or monthly, allows a trader to profit from a market move.
                            </p>
                        </div>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-4 col-md-4 wow fadeInUp" data-wow-delay="100ms">
                    <div class="feature-card">
                        <div class="feature-card-icon">
                            <i class="icon-recycle"></i>
                        </div>
                        <div class="feature-card-content">
                            <h3 class="feature-card-title">Unlimited Free Transfers</h3>
                            <p class="feature-card-desc">Send any currency to friends, family members or
                                business associates as many times as you want, 24 hours a day for free.</p>
                        </div>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-4 col-md-4 wow fadeInUp" data-wow-delay="200ms">
                    <div class="feature-card">
                        <div class="feature-card-icon">
                            <i class="icon-layers"></i>
                        </div>
                        <div class="feature-card-content">
                            <h3 class="feature-card-title">Multi Currency Accounts</h3>
                            <p class="feature-card-desc">Support major currencies: USD, EUR, GBP, and various
                                Cryptocurrencies. Funds exchanged between currencies at market rate.</p>
                        </div>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-4 col-md-4 wow fadeInUp" data-wow-delay="300ms">
                    <div class="feature-card">
                        <div class="feature-card-icon">
                            <i class="icon-documents"></i>
                        </div>
                        <div class="feature-card-content">
                            <h3 class="feature-card-title">Blockchain Smart Contracts</h3>
                            <p class="feature-card-desc">The first thing to know about blockchain smart
                                contracts is they're not contracts, smart, nor necessarily on a blockchain.</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>


    <section id="case" class="case case-standard case-3col pt-90 pb-60 bg-gray">
        <div class="container">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                    <div class="heading heading-1 mb-50 text--center">
                        <p class="heading--subtitle">Research Papers</p>
                        <h2 class="heading--title">Case Studies</h2>
                        <p class="heading--desc mb-0">We monitor the spectrum of available cryptocurrencies
                            and alert our users to market moving events as and when it happens.</p>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="carousel carousel-dots" data-slide="3" data-slide-rs="2" data-autoplay="false"
                        data-nav="false" data-dots="true" data-space="30" data-loop="true" data-speed="1000">

                        <div class="case-item filter-Cryptocurrency">
                            <div class="case-item-container">
                                <div class="case--img">
                                    <img src="{{ asset('front3/images/case/3col/1.jpg') }}" alt="case Item">
                                    <div class="case--hover">
                                        <div class="case--action">
                                            <a href="#" title="case Item"></a>
                                        </div>

                                    </div>

                                </div>

                                <div class="case--content">
                                    <div class="case--cat">
                                        <a href="#">Cryptocurrency</a>
                                    </div>
                                    <div class="case--title">
                                        <h4><a href="#">Solving Real World Problems With Cryptocurrency</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="case-item filter-Investment">
                            <div class="case-item-container">
                                <div class="case--img">
                                    <img src="{{ asset('front3/images/case/3col/2.jpg') }}" alt="case Item">
                                    <div class="case--hover">
                                        <div class="case--action">
                                            <a href="#" title="case Item"></a>
                                        </div>

                                    </div>

                                </div>

                                <div class="case--content">
                                    <div class="case--cat">
                                        <a href="#">Investment</a>
                                    </div>
                                    <div class="case--title">
                                        <h4><a href="#">33 Cases: Cryptocurrency Fraud Is on the Rise in Japan</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="case-item filter-Consulting">
                            <div class="case-item-container">
                                <div class="case--img">
                                    <img src="{{ asset('front3/images/case/3col/3.jpg') }}" alt="case Item">
                                    <div class="case--hover">
                                        <div class="case--action">
                                            <a href="#" title="case Item"></a>
                                        </div>

                                    </div>

                                </div>

                                <div class="case--content">
                                    <div class="case--cat">
                                        <a href="#">Consulting</a>
                                    </div>
                                    <div class="case--title">
                                        <h4><a href="#">Research Perspectives & Challenges for Cryptocurrencies
                                                Authors</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="case-item filter-Investment">
                            <div class="case-item-container">
                                <div class="case--img">
                                    <img src="{{ asset('front3/images/case/3col/4.jpg') }}" alt="case Item">
                                    <div class="case--hover">
                                        <div class="case--action">
                                            <a href="#" title="case Item"></a>
                                        </div>

                                    </div>

                                </div>

                                <div class="case--content">
                                    <div class="case--cat">
                                        <a href="#">Investment</a>
                                    </div>
                                    <div class="case--title">
                                        <h4><a href="#">Ripple’s Giving the Third-Largest Cryptocurrency a Second
                                                Look</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="case-item filter-Bitcoin">
                            <div class="case-item-container">
                                <div class="case--img">
                                    <img src="{{ asset('front3/images/case/3col/5.jpg') }}" alt="case Item">
                                    <div class="case--hover">
                                        <div class="case--action">
                                            <a href="#" title="case Item"></a>
                                        </div>

                                    </div>

                                </div>

                                <div class="case--content">
                                    <div class="case--cat">
                                        <a href="#">Bitcoin</a><a href="#">Cryptocurrency</a>
                                    </div>
                                    <div class="case--title">
                                        <h4><a href="#">Bitcoin’s Price Surge is Making Hobby Mining Profitable
                                                Again</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="case-item filter-Mining">
                            <div class="case-item-container">
                                <div class="case--img">
                                    <img src="{{ asset('/images/case/3col/6.jpg') }}" alt="case Item">
                                    <div class="case--hover">
                                        <div class="case--action">
                                            <a href="#" title="case Item"></a>
                                        </div>

                                    </div>

                                </div>

                                <div class="case--content">
                                    <div class="case--cat">
                                        <a href="#">Mining</a><a href="#">Bitcoin</a>
                                    </div>
                                    <div class="case--title">
                                        <h4><a href="#">The Rise of the Avalon 721 Bitcoin ASIC Miner</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </section>


    <section id="featured3" class="featured featured-3 bg-overlay  pb-0">
        <div class="bg-section"><img src="{{ asset('front3/images/background/6.jpg') }}" alt="background"></div>
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-4 wow fadeIn" data-wow-delay="100ms">
                    <div class="feature-card">
                        <div class="feature-card-icon">
                            <i class="icon-briefcase"></i>
                        </div>
                        <div class="feature-card-content">
                            <h3 class="feature-card-title">Sign Up For Free</h3>
                            <p class="feature-card-desc">Create a digital currency wallet for free, where you
                                can securely store all your digital currency.</p>
                            <a href="#" class="read--more"><i class="fa fa-plus"></i>Read More</a>
                        </div>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-4 wow fadeIn" data-wow-delay="200ms">
                    <div class="feature-card">
                        <div class="feature-card-icon">
                            <i class="icon-wallet"></i>
                        </div>
                        <div class="feature-card-content">
                            <h3 class="feature-card-title">Create Your Wallet</h3>
                            <p class="feature-card-desc">Bitcoin is received, stored, and sent using Bitcoin
                                Wallet’. Download official Bitcoin Wallet for free.</p>
                            <a href="#" class="read--more"><i class="fa fa-plus"></i>Read More</a>
                        </div>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-4 wow fadeIn" data-wow-delay="300ms">
                    <div class="feature-card">
                        <div class="feature-card-icon">
                            <i class="icon-bargraph"></i>
                        </div>
                        <div class="feature-card-content">
                            <h3 class="feature-card-title">Buy & Sell Digital Currency</h3>
                            <p class="feature-card-desc">Buy some Bitcoin, Ethereum, or any other Digital
                                Currency to begin using the future of money.</p>
                            <a href="#" class="read--more"><i class="fa fa-plus"></i>Read More</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 wow fadeInUp" data-wow-delay="100ms">
                    <div class="video-button">
                        <div class="video--content text-center mb-45">
                            <div class="bg-section">
                                <img src="{{ asset('front3/images/video/2.jpg') }}" alt="Background" />
                            </div>
                            <div class="video--button">
                                <div class="video-overlay">
                                    <div class="pos-vertical-center">
                                        <a class="popup-video" href="https://www.youtube.com/watch?v=nrJtHemSPW4">
                                            <span class="btn--animation"></span>
                                            <i class="fa fa-play"></i>
                                            <div>Watch Our Video!</div>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </section>


    <section id="testimonial1" class="testimonial testimonial-1 pt-90">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 wow fadeInUp" data-wow-delay="200ms">
                    <div id="testimonial-wide" class="carousel carousel-navs" data-slide="1" data-slide-rs="1"
                        data-autoplay="false" data-nav="true" data-dots="false" data-space="0" data-loop="true"
                        data-speed="800">

                        <div class="testimonial-panel">
                            <div class="testimonial--icon"></div>

                            <div class="testimonial--body">
                                <p>“Highly recommended & a great experience. The process was simple and easy to
                                    understand. Trading was straight forward, supports all major cryptocurrencies
                                    and the entire process was super smooth!”</p>
                            </div>

                            <div class="testimonial--meta">
                                <div class="testimonial--meta-img">
                                    <img src="{{ asset('front3/images/testimonial/2.png') }}" alt="Testimonial Author">
                                </div>
                                <h4>Mahmoud Baghagho</h4>
                                <p>7oroof Agency</p>
                            </div>

                        </div>


                        <div class="testimonial-panel">
                            <div class="testimonial--icon"></div>

                            <div class="testimonial--body">
                                <p>“Highly recommended & a great experience. The process was simple and easy to
                                    understand. Trading was straight forward, supports all major cryptocurrencies
                                    and the entire process was super smooth!”</p>
                            </div>

                            <div class="testimonial--meta">
                                <div class="testimonial--meta-img">
                                    <img src="{{ asset('front3/images/testimonial/1.png') }}" alt="Testimonial Author">
                                </div>
                                <h4>ayman fikry</h4>
                                <p>zytheme</p>
                            </div>

                        </div>


                        <div class="testimonial-panel">
                            <div class="testimonial--icon"></div>

                            <div class="testimonial--body">
                                <p>“Highly recommended & a great experience. The process was simple and easy to
                                    understand. Trading was straight forward, supports all major cryptocurrencies
                                    and the entire process was super smooth!”</p>
                            </div>

                            <div class="testimonial--meta">
                                <div class="testimonial--meta-img">
                                    <img src="{{ asset('front3/images/testimonial/3.png') }}" alt="Testimonial Author">
                                </div>
                                <h4>Fouad badawy</h4>
                                <p>Tie Labs Inc</p>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>

    </section>


    <section id="BitcoinEcosystem" class="bg-dark mb-70">
        <div class="container">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                    <div class="heading heading-4 mb-50 text--center">
                        <p class="heading--subtitle text-theme">Realtime Charts</p>
                        <h2 class="heading--title text-white">Bitcoin Ecosystem</h2>
                        <p class="heading--desc mb-0">Cryptocurrencies have become established investment
                            commodities, however as with any investment there are risks linked to market
                            movements!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <img class="img-responsive center-block mb-30" src="{{ asset('front3/images/chart/chart2.png') }}"
                        alt="chart">
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <img class="img-responsive center-block mb-30" src="{{ asset('front3/images/chart/chart3.png') }}"
                        alt="chart">
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <img class="img-responsive center-block mb-30" src="{{ asset('front3/images/chart/chart4.png') }}"
                        alt="chart">
                </div>
            </div>
        </div>
    </section>

    <section id="blog" class="blog blog-grid pb-60">
        <div class="container">
            <div class="row  wow flipInX" data-wow-delay="100ms">
                <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                    <div class="heading heading-3 mb-50 text--center">
                        <p class="heading--subtitle">Don’t Miss Latest</p>
                        <h2 class="heading--title">News & Headlines</h2>
                        <p class="heading--desc mb-0">Follow our latest news and thoughts which focuses
                            exclusively on investment strategy guide, blockchain tech, crypto-trading and
                            mining.</p>
                    </div>
                </div>

            </div>
            <div class="row wow fadeInUp" data-wow-delay="100ms">

                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="blog-entry">
                        <div class="entry--img">
                            <a href="#">
                                <img src="{{ asset('front3/images/blog/grid/1.jpg') }}" alt="entry image" />
                                <div class="entry--overlay"></div>
                            </a>
                        </div>

                        <div class="entry--content">
                            <div class="entry--meta">
                                <a href="#">Crypto News</a><a href="#">Apps</a>
                            </div>
                            <div class="entry--title">
                                <h4><a href="#">Blockchain-based Mobile Payments Service Developed by Gates</a>
                                </h4>
                            </div>
                            <div class="entry--bio">
                                The Bill and Melinda Gates Foundation are introducing an open-source software to
                                facilitate the creation of payment platforms for developing economies...
                            </div>
                            <div class="entry--footer">
                                <div class="entry--date">
                                    Apr 14, 2018
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="blog-entry">
                        <div class="entry--img">
                            <a href="#">
                                <img src="{{ asset('front3/images/blog/grid/2.jpg') }}" alt="entry image" />
                                <div class="entry--overlay"> </div>
                            </a>
                        </div>

                        <div class="entry--content">
                            <div class="entry--meta">
                                <a href="#">Cryptocurrency</a><a href="#">Tech</a>
                            </div>
                            <div class="entry--title">
                                <h4><a href="#">Governments Throwing Resources at Blockchain Technology!</a>
                                </h4>
                            </div>
                            <div class="entry--bio">
                                Despite the almost libertarian premise and a noble goal of complete
                                decentralization, realistically, blockchain technology will not be able to avoid
                                at least some level..
                            </div>
                            <div class="entry--footer">
                                <div class="entry--date">
                                    Apr 12, 2018
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="blog-entry">
                        <div class="entry--img">
                            <a href="#">
                                <img src="{{ asset('front3/images/blog/grid/3.jpg') }}" alt="entry image') }}" />
                                <div class="entry--overlay"></div>
                            </a>
                        </div>

                        <div class="entry--content">
                            <div class="entry--meta">
                                <a href="#">Bitcoin</a><a href="#">Tech</a>
                            </div>
                            <div class="entry--title">
                                <h4><a href="#">Southeast Asian Governments Embrace Blockchain Technology</a>
                                </h4>
                            </div>
                            <div class="entry--bio">
                                Hong Kong is embracing blockchain technology search for a new business identity
                                and opportunities. The city has a household name in shipping and finance...
                            </div>
                            <div class="entry--footer">
                                <div class="entry--date">
                                    Apr 11, 2018
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection
