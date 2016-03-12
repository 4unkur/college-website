@foreach($items as $item)
    <li @if($item->hasChildren()) class="treeview" @endif>
        <a href="{!! $item->url() !!}">{!! $item->title !!} @if($item->hasChildren())<span class="fa fa-angle-left pull-right"></span> @endif</a>
        @if($item->hasChildren())
            <ul class="treeview-menu">
                @include('admin.menu.left-sidebar', array('items' => $item->children()))
            </ul>
        @endif
    </li>
@endforeach