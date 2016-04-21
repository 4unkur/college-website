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
            <h3>Бул жерге дерСкий бир нерсе койулат</h3>
            <p>буюрса...</p>
            <br />
            {!! Html::image('http://loremflickr.com/300/200/mountain') !!}
        </div>
        <div class="col-md-4">
            <h3>{{ trans('p.contacts') }}</h3>
            <p>{{ trans('p.location') }}: Чуңкур, Бишкек, Кыргызстан</p>
            <p>{{ trans('p.phone') }}: +996 772 18 23 15</p>
            <p>{{ trans('p.email') }}: <a href="mailto:info@diploma.com">info@diploma.com</a></p>

            <div class="social">
                <span class="fa fa-facebook"><a href="#"></a></span>
                <span class="fa fa-google-plus"><a href="#"></a></span>
                <span class="fa fa-twitter"><a href="#"></a></span>
                <span class="fa fa-instagram"><a href="#"></a></span>
            </div>
        </div>
    </div>
    <hr>
    <p class="text-center">&copy; {{ date('Y') . ' - ' . trans('p.copyright') }}</p>
</div>
