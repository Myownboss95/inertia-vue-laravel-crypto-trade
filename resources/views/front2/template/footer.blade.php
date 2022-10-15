<footer>
    <!-- footer content begin -->
    {{-- <div class="uk-section uk-section-muted uk-padding-large uk-padding-remove-horizontal uk-margin-medium-top">
        <div class="uk-container">
            <div class="uk-grid-medium" data-uk-grid>
                <div class="uk-width-expand@m">
                    <img class="uk-margin-small-right in-margin-top-30@s" src="{{asset('front2/img/in-lazy.gif')}}" data-src="{{asset(config('app.logo'))}}" alt="wave" width="134" height="23" data-uk-img>
                    <p class="uk-text-large uk-margin-small-top">Trade with financial thinking.</p>
                    <p class="uk-visible@m">Imperium Tower (Headquarters)<br>
                        Jl. Prof Dr Satrio, Kuningan<br>
                        12920<br>
                        Jakarta - Indonesia
                    </p>
                </div>
                <div class="uk-width-3-5@m">
                    <div class="uk-child-width-1-3@s uk-child-width-1-3@m" data-uk-grid>
                        <div>
                            <h4><span>Legal</span></h4>
                            <ul class="uk-list uk-link-text">
                                <li><a href="/terms-and-condition">Terms & Condition</a></li>
                                <li><a href="/privacy-policy">Synthetic indices</a></li>
                            </ul>
                        </div>
                        <div>
                            <h4><span>Help Center</span></h4>
                            <ul class="uk-list uk-link-text">
                                <li><a href="/faqs">FAQs</a></li>
                                <li><a href="#">Payment methods</a></li>
                            </ul>
                        </div>
                        <div>
                            <h4><span>Quick Links</span></h4>
                            <ul class="uk-list uk-link-text">

                                <li><a href="/about-us">About Us</a></li>
                                <li><a href="/packages">Packages</a></li>
                                <li><a href="/testimonials">Testimonials</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-1 uk-margin-large-top in-offset-bottom-20">
                    <h6><i class="fas fa-exclamation-triangle fa-sm uk-text-danger uk-margin-small-right"></i>Risk warning</h6>
                    <p class="uk-text-small">The financial products offered via this website include digitals, contracts for difference (CFDs), and other complex derivatives and financial products. Trading options may not be suitable for everyone. Trading CFDs carries a high level of risk since leverage can work both to your advantage and disadvantage. As a result, the products offered on this website may not be suitable for all investors because of the risk of losing all of your invested capital. You should never invest money that you cannot afford to lose, and never trade with borrowed money. Before trading in the complex financial products offered, please be sure to understand the risks involved and learn about <a href="#">Secure and responsible trading.</a></p>
                    <hr>
                    <div class="uk-grid uk-flex uk-flex-middle" data-uk-grid>
                        <div class="uk-width-1-2@m">
                            <div class="uk-grid-small uk-flex uk-child-width-1-4@s uk-flex uk-child-width-1-5@m in-payment-method uk-text-center" data-uk-grid>
                                <div>
                                    <div class="uk-card uk-card-default uk-card-small uk-card-body">
                                        <img src="{{asset('front2/img/in-lazy.gif')}}" data-src="{{asset('front2/img/in-wave-visa.svg')}}" alt="wave-payment" width="59" height="22" data-uk-img>
                                    </div>
                                </div>
                                <div>
                                    <div class="uk-card uk-card-default uk-card-small uk-card-body">
                                        <img src="{{asset('front2/img/in-lazy.gif')}}" data-src="{{asset('front2/img/in-wave-mastercard.svg')}}" alt="wave-payment" width="59" height="22" data-uk-img>
                                    </div>
                                </div>
                                <div>
                                    <div class="uk-card uk-card-default uk-card-small uk-card-body">
                                        <img src="{{asset('front2/img/in-lazy.gif')}}" data-src="{{asset('front2/img/in-wave-skrill.svg')}}" alt="wave-payment" width="59" height="22" data-uk-img>
                                    </div>
                                </div>
                                <div>
                                    <div class="uk-card uk-card-default uk-card-small uk-card-body">
                                        <img src="{{asset('front2/img/in-lazy.gif')}}" data-src="{{asset('front2/img/in-wave-paypal.svg')}}" alt="wave-payment" width="59" height="22" data-uk-img>
                                    </div>
                                </div>
                                <div>
                                    <div class="uk-card uk-card-default uk-card-small uk-card-body uk-visible@m">
                                        <img src="{{asset('front2/img/in-lazy.gif')}}" data-src="{{asset('front2/img/in-wave-neteller.svg')}}" alt="wave-payment" width="59" height="22" data-uk-img>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-1-2@m uk-text-right@m">
                            <div class="in-footer-socials in-margin-bottom-40@s">
                                <a href="#"><i class="fab fa-youtube"></i></a>
                                <a href="#"><i class="fab fa-facebook-square"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="uk-section uk-section-secondary uk-padding-remove-vertical" style="margin-top:50px;">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-3-4@m uk-visible@m">
                    <ul class="uk-subnav uk-subnav-divider">
                        <li><a href="/faqs">FAQs</a></li>
                        <li><a href="/contact-us">Contact Us</a></li>
                        <li><a href="/about-us">About Us</a></li>
                        <li><a href="/register">Register</a></li>
                        <li><a href="/login">Login</a></li>
                    </ul>
                </div>
                <div class="uk-width-expand@m uk-text-right@m">
                    <p>© {{ now()->year }} {{ config('app.name') }} Inc.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- footer content end -->

    @if (config('app.show_popup'))
    <div class="mgm" style="display: none;">
        <div class="txt" style="color:black;">Someone from <b></b> just traded with
            <a href="javascript:void(0);" onclick="javascript:void(0);"></a>
        </div>
    </div>
    @endif


    <!-- module totop begin -->
    <div class="uk-visible@m">
        <a href="#" class="in-totop fas fa-chevron-up" data-uk-scroll></a>
    </div>
    <!-- module totop begin -->
</footer>
<!-- Javascript -->
<script src="{{ asset('front2/js/vendors/uikit.min.js') }}"></script>
<script src="{{ asset('front2/js/vendors/indonez.min.js') }}"></script>
<script src="{{ asset('front2/js/config-theme.js') }}"></script>
@if (config('app.show_popup'))
    <style>
        .mgm {
            border-radius: 7px;
            position: fixed;
            z-index: 90;
            bottom: 80px;
            /* right: 50px; */
            left: 50px;
            background: #fff;
            padding: 10px 27px;
            box-shadow: 0px 5px 13px 0px rgba(0, 0, 0, .3);
        }

        .mgm a {
            font-weight: 700;
            display: block;
            color: #f2d516;
        }

        .mgm a,
        .mgm a:active {
            transition: all .2s ease;
            color: #f2d516;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var listCountries = ['South Africa', 'USA', 'Uganda', 'Kenya', 'Germany', 'France', 'Italy', 'South Africa',
            'Australia', 'South Africa', 'Canada', 'Argentina', 'Saudi Arabia', 'Mexico', 'South Africa',
            'South Africa', 'Venezuela', 'South Africa', 'Sweden', 'South Africa', 'South Africa', 'Italy',
            'South Africa', 'United Kingdom', 'South Africa', 'Greece', 'Cuba', 'South Africa', 'Portugal',
            'Austria', 'South Africa', 'Panama', 'South Africa', 'South Africa', 'Netherlands', 'Switzerland',
            'Belgium', 'Israel', 'Cyprus'
        ];
        var listPlans = ['$100', '$210', '$9000', '$5,000', '$15,000', '$1,000', '$10,000', '$2,000', '$3,000', '$45,000',
            '$60,000', '$79,000', '$25,000'
        ];
        interval = Math.floor(Math.random() * (10000 - 4000 + 1) + 4000);

        var run = setInterval(request, interval);

        function request() {
            clearInterval(run);
            interval = Math.floor(Math.random() * (10000 - 4000 + 1) + 4000);
            var country = listCountries[Math.floor(Math.random() * listCountries.length)];
            var plan = listPlans[Math.floor(Math.random() * listPlans.length)];
            var msg = 'Someone from <b>' + country +
                '</b> just traded with <a href="javascript:void(0);" onclick="javascript:void(0);">' + plan + ' .</a>';

            $(".mgm .txt").html(msg);
            $(".mgm").stop(true).fadeIn(300);
            window.setTimeout(function() {
                $(".mgm").stop(true).fadeOut(300);
            }, 6000);
            run = setInterval(request, interval);
        }
    </script>
@endif
</body>


<!-- Mirrored from www.indonez.com/html-demo/Wave/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Aug 2022 19:00:37 GMT -->

</html>
