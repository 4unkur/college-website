@foreach($adminMenu as $item)
    <li class="@if ($item['route'] == app('request')->route()->getName()) active @endif @if (isset($item['children'])) treeview @endif">
        <a href="{!! route($item['route']) !!}">
            <i class="fa fa-{{ isset($item['icon']) ? $item['icon']: 'info' }}"></i>
            <span>{!! $item['title']!!}</span> @if (isset($item['children']))<span class="fa fa-angle-left pull-right"></span> @endif
        </a>
        @if (isset($item['children']))
            <ul class="treeview-menu">
                @include('admin.menu.left-sidebar', array('adminMenu' => $item['children']))
            </ul>
        @endif
    </li>
@endforeach