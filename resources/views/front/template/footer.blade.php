<footer>
    <!-- footer content begin -->
    <div class="uk-section">
        <hr class="uk-margin-large">
        <div class="uk-container">
            <div class="uk-grid uk-flex uk-flex-middle">
                <div class="uk-width-2-3@m uk-text-small">
                    <ul class="uk-subnav uk-subnav-divider uk-visible@s" data-uk-margin>
                        <li><a href="/faqs">{{__('FAQs')}}</a></li>
                        <li><a href="/contact-us">{{__('Contact Us')}}</a></li>
                        <li><a href="/register">{{__('Sign up')}}</a></li>
                        <li><a href="/login">{{__('Log in')}}</a></li>
                    </ul>
                    <p class="copyright-text">©{{ now()->year }} {{ config('app.name') }}. All Rights Reserved.</p>
                </div>
                <div class="uk-width-1-3@m uk-flex uk-flex-right uk-visible@m">
                    <span class="uk-margin-right"><img src="{{asset('front/img/in-lazy.gif')}}" data-src="{{asset('front/img/in-footer-mastercard.svg')}}" alt="footer-payment" width="34" height="21" data-uk-img></span>
                    <span><img src="{{asset('front/img/in-lazy.gif')}}" data-src="{{asset('front/img/in-footer-visa.svg')}}" alt="footer-payment" width="50" height="16" data-uk-img></span>
                </div>
            </div>
        </div>
    </div>

    @if (config('app.show_popup'))
    <div class="mgm" style="display: none;">
        <div class="txt" style="color:black;">Someone from <b></b> just traded with
            <a href="javascript:void(0);" onclick="javascript:void(0);"></a>
        </div>
    </div>
    @endif

    <!-- footer content end -->
    <!-- totop begin -->
    <div class="uk-visible@m">
        <a href="#" class="in-totop fas fa-chevron-up" data-uk-scroll></a>
    </div>
    <!-- totop end -->
</footer>

<!-- javascript -->
<script src="{{asset('front/js/vendors/uikit.min.js')}}"></script>
<script src="{{asset('front/js/vendors/utilities.min.js')}}"></script>
<script src="{{asset('front/js/vendors/trading-widget.min.js')}}"></script>
<script src="{{asset('front/js/vendors/market-plugin.min.js')}}"></script>
<script src="{{asset('front/js/vendors/particles.min.js')}}"></script>
<script src="{{asset('front/js/config-particles.js')}}"></script>
<script src="{{asset('front/js/config-theme.js')}}"></script>
<x-live-chat />
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
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>s
<script type="text/javascript">
        var listCountries = ['South Africa', 'USA', 'Uganda', 'Kenya', 'Germany', 'France', 'Italy', 'South Africa',
            'Australia', 'South Africa', 'Canada', 'Argentina', 'Saudi Arabia', 'Mexico', 'South Africa',
            'South Africa', 'Venezuela', 'South Africa', 'Sweden', 'South Africa', 'South Africa', 'Italy',
            'South Africa', 'United Kingdom', 'South Africa', 'Greece', 'Cuba', 'South Africa', 'Portugal',
            'Austria', 'South Africa', 'Panama', 'South Africa', 'South Africa', 'Netherlands', 'Switzerland',
            'Belgium', 'Israel', 'Cyprus'
        ];
        var listPlans = ['$100', '$210', '$9000','$5,000', '$15,000', '$1,000', '$10,000', '$2,000', '$3,000', '$45,000', '$60,000', '$79,000', '$25,000'];
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
