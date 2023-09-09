<div class="dropdown">
    <a class="btn btn-secondary dropdown-toggle" href="/" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{ isset($currentCategory)? $currentCategory->name : "Filter By Category"}}
    </a>

    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="/">All</a></li>
        @foreach($categories as $category)
        <li><a class="dropdown-item" href="/?category={{$category->slug}} {{request('author')? '&author='.request('author'):''}} {{request('search')? '&search='.request('search'):''}}">{{ $category->name }}</a></li>
        @endforeach
    </ul>
</div>