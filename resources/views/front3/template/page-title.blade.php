<section id="page-title" class="page-title bg-overlay bg-overlay-dark bg-parallax">
    <div class="bg-section">
        <img src="{{ asset('front3/images/page-titles/2.jpg') }}" alt="Background" />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="title title-6 text-center">
                    <div class="title--heading">
                        <h1>{{ $title }}</h1>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb">
                        @foreach ($crumbs as $crumb)
                            <li @if ($loop->last) class="active" @endif>
                                @if (!$loop->last)
                                    <a href="{{ $crumb['url'] }}">{{ $crumb['name'] }}</a>
                                @else
                                    {{ $crumb['name'] }}
                                @endif
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
