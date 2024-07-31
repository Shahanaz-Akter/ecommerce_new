<li>
    <span style="background-color: #f0f0f0; padding: 5px; border-radius: 3px;">{{ $category->name }} (ID: {{ $category->id }})</span>
    
    @if($category->allChildren->isNotEmpty())
        <ul>
            @foreach($category->allChildren as $child)
                @include('backend.products.partials.category-item', ['category' => $child])
            @endforeach
        </ul>
    @endif
</li>
