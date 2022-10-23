@extends('front3.template.app')
@section('title', 'About Us')
@include('front3.template.page-title', [
    'title' => 'Contact Us',
    'crumbs' => [['url' => route('front.index'), 'name' => 'Home'], ['name' => 'Contact Us']],
])


@section('content')
    <section id="contactInfo" class="contact contact-info bg-white text--center pt-90 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="contact--info">
                        <h3>Our Address</h3>
                        <p>Alnahas Building, 2 AlBahr St, Tanta</p>
                        <p>AlGharbia, Egypt.</p>
                        <a class="link--styled" href="#">Get Directions</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="contact--info">
                        <h3>Our Email</h3>
                        <p>Main Email : <a href="https://zytheme.com/cdn-cgi/l/email-protection" class="__cf_email__"
                                data-cfemail="f0c79f829f9f96b0c79f829f9f96de939f9d">[email&#160;protected]</a>
                        </p>
                        <p>Inquiries : <a href="https://zytheme.com/cdn-cgi/l/email-protection" class="__cf_email__"
                                data-cfemail="bef7d0d8d1fe89d1ccd1d1d890ddd1d3">[email&#160;protected]</a>
                        </p>
                        <a class="link--styled" href="#">Send a Message</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="contact--info">
                        <h3>Our Support</h3>
                        <p>Main Support : <a href="https://zytheme.com/cdn-cgi/l/email-protection" class="__cf_email__"
                                data-cfemail="e8df879a87878ea8df879a87878ec68b8785">[email&#160;protected]</a>
                        </p>
                        <p>Sales : <a href="https://zytheme.com/cdn-cgi/l/email-protection" class="__cf_email__"
                                data-cfemail="bae9dbd6dfc9fa8dd5c8d5d5dc94d9d5d7">[email&#160;protected]</a>
                        </p>
                        <a class="link--styled" href="#">Open a Ticket</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="google-maps pb-0 pt-0">
        <div class="container">
            <div class="row">
                <div class="col-xs-12  col-sm-12  col-md-12">
                    <div id="googleMap" style="width:100%;height:490px;">
                    </div>
                </div>
            </div>
        </div>
        <script data-cfasync="false" src="https://zytheme.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">
        </script>
        <script src="{{ asset('front3/js/jquery-2.2.4.min.js') }}"></script>
        <script src="https://maps.google.com/maps/api/js"></script>
        <script src="{{ asset('front3/js/plugins/jquery.gmap.min.js') }}"></script>
        <script>
            $('#googleMap').gMap({
                address: "121 King St,Melbourne, Australia",
                zoom: 13,
                maptype: 'ROADMAP',
                markers: [{
                    address: "Melbourne, Australia",
                    maptype: 'ROADMAP',
                    icon: {
                        image: "{{ asset('front3/images/gmap/maker.png') }}",
                        iconsize: [76, 61],
                        iconanchor: [17, 35]
                    }
                }]
            });
        </script>
    </section>

    <section id="contact1" class="contact contact-1 pt-90 pb-90">
        <div class="container">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                    <div class="heading heading-3 mb-50 text--center">
                        <h2 class="heading--title">Get in touch</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
                    <div class="row">
                        <form class="mb-0">
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <input type="text" class="form-control" name="contact-name" id="name"
                                    placeholder="Your Name" required="">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <input type="email" class="form-control" name="contact-email" id="email"
                                    placeholder="Email">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <input type="text" class="form-control" name="contact-phone" id="Phone"
                                    placeholder="Phone">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <textarea class="form-control" name="contact-message" id="message" rows="2" placeholder="Request Details:"></textarea>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <input type="submit" value="Submit Request" name="submit"
                                    class="btn btn--primary btn--block">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="contact-result"></div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
