@if (count($blockData))
    <?php $random = is_array($random) ? $random : $news[rand(0, $news->total() - 1)]; ?>
<aside class="col-md-3">
    @if (isset($random) && $random)
    <h3><span>{{ $random->title }}</span></h3>
    {!! Html::image('uploads/images/news/rect/' . $random->image) !!}
    <div>
        {{ str_limit(strip_tags($random->text), 100) }}
    </div>
    <p><a href="{{ route('news.show', [$random->slug]) }}" role="button" class="btn btn-info btn-lg">{{ trans('p.read_more') }}</a></p>
    @endif

    @foreach ($blockData as $news)
    <div class="icon-item">{!! Html::image('uploads/images/news/rect/' . $news->image) !!}
        <h4><a href="{{ route('news.show', $news->slug) }}">{{ $news->title }}</a></h4>
    </div>
    @endforeach
</aside>
@endif