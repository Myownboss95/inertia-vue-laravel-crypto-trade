<footer id="footer" class="footer footer-1">

    <div class="footer-widget">
        <div class="container">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-4 col-md-4 footer--widget widget-about">
                    <div class="widget-content">
                        <img class="footer-logo" src="{{ logo() }}" alt="logo">
                        <p>Exchange Cryptocurrency at the Best Rate by getting the best offer from all the
                            exchanges at one place.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-2 footer--widget widget-links">
                    <div class="widget-title">
                        <h5>Company</h5>
                    </div>
                    <div class="widget-content">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-2 footer--widget widget-links">
                    <div class="widget-title">
                        <h5>Help & Support</h5>
                    </div>
                    <div class="widget-content">
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">FAQs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 footer--widget widget-newsletter">
                    <div class="widget-title">
                        <h5>Stay Updated</h5>
                    </div>
                    <div class="widget-content">
                        <form class="form-newsletter mailchimp">
                            <input type="email" name="email" class="form-control"
                                placeholder="Subscribe Our Newsletter">
                            <button type="submit"><i class="fa fa-long-arrow-right"></i></button>
                        </form>
                        <div class="subscribe-alert"></div>
                        <div class="clearfix"></div>
                        <p>Get the latest updates and offers.</p>
                        {{-- <div class="footer-social-icon">
                            <a class="facebook" href="#">
                                <i class="fa fa-facebook"></i><i class="fa fa-facebook"></i>
                            </a>
                            <a class="twitter" href="#">
                                <i class="fa fa-twitter"></i><i class="fa fa-twitter"></i>
                            </a>
                            <a class="instagram" href="#">
                                <i class="fa fa-instagram"></i><i class="fa fa-instagram"></i>
                            </a>
                            <a class="linkedin" href="#">
                                <i class="fa fa-linkedin"></i><i class="fa fa-linkedin"></i>
                            </a>
                        </div> --}}
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <hr>
    <div class="footer--bar">
        <div class="container">
            <div class="copyright text-center">
                <span>All rights reserved, © {{ now()->format('Y') }}</span> {{ config('app.name') }} Inc.
            </div>
        </div>
    </div>
</footer>
<div id="back-to-top" class="backtop"><i class="fa fa-long-arrow-up"></i></div>
</div>

<script src="{{ asset('front3/js/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('front3/js/plugins.js') }}"></script>
<script src="{{ asset('front3/js/bitcoinTracker.js') }}"></script>
<script src="{{ asset('front3/js/bitcoinPrice.js') }}"></script>
<script src="{{ asset('front3/js/bitcoinPriceWidgets.js') }}"></script>
<script src="{{ asset('front3/js/functions.js') }}"></script>

<script src="{{ asset('front3/revolution/js/jquery.themepunch.tools.min838f.js?rev=5.0') }}"></script>
<script src="{{ asset('front3/revolution/js/jquery.themepunch.revolution.min838f.js?rev=5.0') }}"></script>
<script src="{{ asset('front3/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
<script src="{{ asset('front3/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('front3/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('front3/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('front3/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('front3/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('front3/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('front3/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>

<script src="{{ asset('front3/js/rsconfig.js') }}"></script>
@stack('js')
<x-live-chat />
</body>

</html>
