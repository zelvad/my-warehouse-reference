<ul>
    @foreach($categories as $category)
        <li>
            <ul>
                <li>
                    id: {{ $category->id }}
                </li>
                <li>
                    parent_id: {{ $category->parent_id }}
                </li>
                <li>
                    category_name: {{ $category->category_name  }}
                </li>
                <li>
                    archived: {{ $category->archived  }}
                </li>
            </ul>
        </li>
    @endforeach
</ul>
