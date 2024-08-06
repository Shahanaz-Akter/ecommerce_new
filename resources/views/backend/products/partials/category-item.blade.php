<ul>
    @foreach($children as $child)
        <li>
            {{ $child['name'] }}
            @if(!empty($child['all_children']))
                @include('categories.partials.category', ['children' => $child['all_children']])
            @endif
        </li>
    @endforeach
</ul>
