@extends('front3.template.app')
@section('title', 'FAQs')

@include('front3.template.page-title', [
    'title' => 'Frequently Asked Questions',
    'crumbs' => [
        ['url' => route('front.index'), 'name' => 'Home'],
        ['url' => route('front.about-us'), 'name' => 'About'],
        ['name' => 'FAQs'],
    ],
])

@section('content')
    <section id="faqs" class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-9">
                    <div class="accordion accordion-1" id="accordion01">

                        <div class="panel">
                            <div class="panel--heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion01"
                                    href="#collapse01-1">What is Bitcoin?</a>
                            </div>
                            <div id="collapse01-1" class="panel--body panel-collapse collapse">
                                Trends, vision dominates a lot of our subconscious interpretation of the world
                                around us. On top it, pleasing images create a better user experience. Rounding
                                up a bunch of specific designs.Trends, vision dominates a lot of our
                                subconscious interpretation of the world around us.
                            </div>
                        </div>

                        <div class="panel">
                            <div class="panel--heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion01"
                                    href="#collapse01-2">Can the rates change during the
                                    transaction?</a>
                            </div>
                            <div id="collapse01-2" class="panel--body panel-collapse collapse">
                                Trends, vision dominates a lot of our subconscious interpretation of the world
                                around us. On top it, pleasing images create a better user experience. Rounding
                                up a bunch of specific designs.Trends, vision dominates a lot of our
                                subconscious interpretation of the world around us.
                            </div>
                        </div>

                        <div class="panel">
                            <div class="panel--heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion01"
                                    href="#collapse01-3">What is our transaction fees?</a>
                            </div>
                            <div id="collapse01-3" class="panel--body panel-collapse collapse in">
                                Trends, vision dominates a lot of our subconscious interpretation of the world
                                around us. On top it, pleasing images create a better user experience. Rounding
                                up a bunch of specific designs.Trends, vision dominates a lot of our
                                subconscious interpretation of the world around us.
                            </div>
                        </div>

                        <div class="panel">
                            <div class="panel--heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion01"
                                    href="#collapse01-4">How do I get a wallet
                                    address?</a>
                            </div>
                            <div id="collapse01-4" class="panel--body panel-collapse collapse">
                                Trends, vision dominates a lot of our subconscious interpretation of the world
                                around us. On top it, pleasing images create a better user experience. Rounding
                                up a bunch of specific designs.Trends, vision dominates a lot of our
                                subconscious interpretation of the world around us.
                            </div>
                        </div>

                        <div class="panel">
                            <div class="panel--heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion01"
                                    href="#collapse01-5">What's the recipient’s
                                    address?</a>
                            </div>
                            <div id="collapse01-5" class="panel--body panel-collapse collapse">
                                Trends, vision dominates a lot of our subconscious interpretation of the world
                                around us. On top it, pleasing images create a better user experience. Rounding
                                up a bunch of specific designs.Trends, vision dominates a lot of our
                                subconscious interpretation of the world around us.
                            </div>
                        </div>

                        <div class="panel">
                            <div class="panel--heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion06"
                                    href="#collapse01-6">Why is my wallet address
                                    recognized as invalid?</a>
                            </div>
                            <div id="collapse01-6" class="panel--body panel-collapse collapse">
                                Trends, vision dominates a lot of our subconscious interpretation of the world
                                around us. On top it, pleasing images create a better user experience. Rounding
                                up a bunch of specific designs.Trends, vision dominates a lot of our
                                subconscious interpretation of the world around us.
                            </div>
                        </div>

                        <div class="panel">
                            <div class="panel--heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion01"
                                    href="#collapse01-7">What is the minimum/maximum
                                    amount?</a>
                            </div>
                            <div id="collapse01-7" class="panel--body panel-collapse collapse">
                                Trends, vision dominates a lot of our subconscious interpretation of the world
                                around us. On top it, pleasing images create a better user experience. Rounding
                                up a bunch of specific designs.Trends, vision dominates a lot of our
                                subconscious interpretation of the world around us.
                            </div>
                        </div>

                        <div class="panel">
                            <div class="panel--heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion01"
                                    href="#collapse01-8">When should I receive my
                                    money?</a>
                            </div>
                            <div id="collapse01-8" class="panel--body panel-collapse collapse">
                                Trends, vision dominates a lot of our subconscious interpretation of the world
                                around us. On top it, pleasing images create a better user experience. Rounding
                                up a bunch of specific designs.Trends, vision dominates a lot of our
                                subconscious interpretation of the world around us.
                            </div>
                        </div>

                        <div class="panel">
                            <div class="panel--heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion01"
                                    href="#collapse01-9">How do I cancel my
                                    transaction?</a>
                            </div>
                            <div id="collapse01-9" class="panel--body panel-collapse collapse">
                                Trends, vision dominates a lot of our subconscious interpretation of the world
                                around us. On top it, pleasing images create a better user experience. Rounding
                                up a bunch of specific designs.Trends, vision dominates a lot of our
                                subconscious interpretation of the world around us.
                            </div>
                        </div>

                        <div class="panel">
                            <div class="panel--heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion01"
                                    href="#collapse01-10">Why does my transaction take
                                    so long?</a>
                            </div>
                            <div id="collapse01-10" class="panel--body panel-collapse collapse">
                                Trends, vision dominates a lot of our subconscious interpretation of the world
                                around us. On top it, pleasing images create a better user experience. Rounding
                                up a bunch of specific designs.Trends, vision dominates a lot of our
                                subconscious interpretation of the world around us.
                            </div>
                        </div>

                        <div class="panel">
                            <div class="panel--heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion01"
                                    href="#collapse01-11">What will happen if I close
                                    the browser tab?</a>
                            </div>
                            <div id="collapse01-11" class="panel--body panel-collapse collapse">
                                Trends, vision dominates a lot of our subconscious interpretation of the world
                                around us. On top it, pleasing images create a better user experience. Rounding
                                up a bunch of specific designs.Trends, vision dominates a lot of our
                                subconscious interpretation of the world around us.
                            </div>
                        </div>

                        <div class="panel">
                            <div class="panel--heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion01"
                                    href="#collapse01-12">Why blockchain verification is
                                    taking long?</a>
                            </div>
                            <div id="collapse01-12" class="panel--body panel-collapse collapse">
                                Trends, vision dominates a lot of our subconscious interpretation of the world
                                around us. On top it, pleasing images create a better user experience. Rounding
                                up a bunch of specific designs.Trends, vision dominates a lot of our
                                subconscious interpretation of the world around us.
                            </div>
                        </div>

                        <div class="panel">
                            <div class="panel--heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion01"
                                    href="#collapse01-13">Sent funds to the wrong
                                    address. Can I recover my funds?</a>
                            </div>
                            <div id="collapse01-13" class="panel--body panel-collapse collapse">
                                Trends, vision dominates a lot of our subconscious interpretation of the world
                                around us. On top it, pleasing images create a better user experience. Rounding
                                up a bunch of specific designs.Trends, vision dominates a lot of our
                                subconscious interpretation of the world around us.
                            </div>
                        </div>

                        <div class="panel">
                            <div class="panel--heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion01"
                                    href="#collapse01-14">Why is my transaction still
                                    waiting for payment if I've already paid?</a>
                            </div>
                            <div id="collapse01-14" class="panel--body panel-collapse collapse">
                                Trends, vision dominates a lot of our subconscious interpretation of the world
                                around us. On top it, pleasing images create a better user experience. Rounding
                                up a bunch of specific designs.Trends, vision dominates a lot of our
                                subconscious interpretation of the world around us.
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-3">
                    <div class="widget widget-info">
                        <div class="widget--content">
                            <div class="info--title">
                                Still have questions?
                            </div>
                            <div class="info--content">
                                If you have not found the answers you seek, please contact us via the contact page or our
                                24/7 live chat service.
                            </div>
                            <a class="btn btn--primary btn--rounded" href="{{ route('front.contact-us') }}">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
