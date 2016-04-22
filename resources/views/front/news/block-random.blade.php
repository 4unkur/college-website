@if (count($randomNews))
<aside class="col-md-3">
    @if ($randomNewsEntry)
    <h3><span>{{ $randomNewsEntry->title }}</span></h3>
    {!! Html::image('uploads/images/news/rect/' . $randomNewsEntry->image) !!}
    <div>
        {{ str_limit(strip_tags($randomNewsEntry->text), 100) }}
    </div>
    <p><a href="{{ route('news.show', [$randomNewsEntry->slug]) }}" role="button" class="btn btn-info btn-lg">{{ trans('p.read_more') }}</a></p>
    @endif

    @foreach ($randomNews as $news)
    <div class="icon-item">{!! Html::image('uploads/images/news/rect/' . $news->image) !!}
        <h4><a href="{{ route('news.show', $news->slug) }}">{{ $news->title }}</a></h4>
    </div>
    @endforeach
</aside>
@endif