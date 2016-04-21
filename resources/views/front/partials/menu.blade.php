@foreach($menu as $item)
    <li class="@if ($item['route'] == app('request')->route()->getName()) active @endif">
        <a href="{!! route($item['route']) !!}">{!! $item['title']!!}</a>
    </li>
@endforeach