<h1>{{ $category->name }}</h1>

<p><strong>Slug:</strong> {{ $category->slug }}</p>
<p>{{ $category->description }}</p>
@auth
  <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
@endauth

<a href="{{ route('categories.index') }}">Back to Categories</a>