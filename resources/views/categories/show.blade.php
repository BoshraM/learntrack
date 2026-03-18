<h1>{{ $category->name }}</h1>

<p><strong>Slug:</strong> {{ $category->slug }}</p>
<p>{{ $category->description }}</p>

<a href="{{ route('categories.edit', $category->id) }}">Edit</a>
<a href="{{ route('categories.index') }}">Back to Categories</a>