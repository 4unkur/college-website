@if (count($latestNews))
<aside class="col-md-3">
    @if ($randomNews)
    <h3><span>{{ $randomNews->title }}</span></h3>
    {!! Html::image('uploads/images/news/rect/' . $randomNews->image) !!}
    <div>
        {{ str_limit(strip_tags($randomNews->text), 100) }}
    </div>
    <p><a href="{{ route('news.show', [$randomNews->slug]) }}" role="button" class="btn btn-info btn-lg">{{ trans('p.read_more') }}</a></p>
    @endif

    @foreach ($latestNews as $news)
    <div class="icon-item">{!! Html::image('uploads/images/news/rect/' . $news->image) !!}
        <h4><a href="{{ route('news.show', $news->slug) }}">{{ $news->title }}</a></h4>
    </div>
    @endforeach
</aside>
@endif