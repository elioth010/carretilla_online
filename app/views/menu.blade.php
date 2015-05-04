<ul class="nav navbar-nav">
    @foreach($menus as $menu)
    <li title="{{$menu->title}}"><a href="{{ URL::to($menu->route) }}">{{$menu->title}}</a></li>
    @endforeach 
</ul>
