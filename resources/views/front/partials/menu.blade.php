@foreach($menu as $item)
    <li class="@if ($item['route'] == app('request')->route()->getName()) active @endif">
        <a href="{!! route($item['route'], isset($item['param']) ? [$item['param']] : []) !!}">{!! $item['title']!!}</a>
    </li>
@endforeach
<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>{{ LaravelLocalization::getCurrentLocaleNative() }} </span><span class="fa fa-angle-down"></span></a>
    <ul class="dropdown-menu">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <li>
                <a rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                    {{ $properties['native'] }}
                </a>
            </li>
        @endforeach
    </ul>
</li>
@if (Auth::check())
<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">{!! Html::image('uploads/images/avatars/square/' . $activeUser->avatar, null, ['width' => '25px', 'height' => '25px', 'class' => 'img-circle']) !!} <span>{{ $activeUser->first_name }} </span><span class="fa fa-angle-down"></span></a>
    <ul class="dropdown-menu">
        @if ('admin' == $activeUser->type)
            <li><a href="{{ route('admin.dashboard') }}">{{ trans('p.dashboard') }}</a></li>
        @endif
        <li><a href="{{ route('user.show', [$activeUser->slug]) }}">{{ trans('p.view_profile') }}</a></li>
        <li><a href="{{ url('auth/logout') }}">{{ trans('p.logout') }}</a></li>
    </ul>
</li>
@else
    <li>
        <a href="{{ url('auth/login') }}"><span class="fa fa-user text-muted"></span> {{ trans('p.sign_in') }}</a>
    </li>
@endif