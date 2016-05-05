<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3>{{ trans('p.about') }}</h3>
            <div>
                {{ str_limit(strip_tags($aboutPage->content), 200) }}
                {!! link_to_route('page.show', trans('p.read_more'), [$aboutPage->slug]) !!}
            </div>
        </div>

        <div class="col-md-4">
            <h3>{!! trans('p.links') !!}</h3>
            <p>{!! link_to_route('contacts', trans('p.contacts')) !!}</p>
            <p>{!! link_to_route('user.index', trans('p.users')) !!}</p>
            <p>{!! link_to_route('terms', trans('p.terms_of_use')) !!}</p>
            <p>{!! link_to('https://github.com/4unkur', trans('p.authors')) !!}</p>
        </div>
        <div class="col-md-4">
            <h3>{{ trans('p.contacts') }}</h3>
            <p>{{ trans('p.location') }}: {{ Setting::get('location') }}</p>
            <p>{{ trans('p.phone') }}: {{ Setting::get('site_phone') }}</p>
            <p>{{ trans('p.email') }}: <a href="mailto:{{ Setting::get('site_email') }}">{{ Setting::get('site_email') }}</a></p>

            <div class="social" style="font-size:40px">
                <a href="https://fb.com/{{ Setting::get('fb') }}"><span class="fa fa-facebook"></span></a>
                <a href="https://plus.google.com/{{ Setting::get('gplus') }}"><span class="fa fa-google-plus"></span></a>
                <a href="https://twitter.com/{{ Setting::get('twitter') }}"><span class="fa fa-twitter"></span></a>
                <a href="https://instagram.com/{{ Setting::get('instagram') }}"><span class="fa fa-instagram"></span></a>
            </div>
        </div>
    </div>
    <hr>
    <p class="text-center">&copy; {{ date('Y') . ' - ' . trans('p.copyright') }}</p>
</div>
