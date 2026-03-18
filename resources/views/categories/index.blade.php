<h1>Categories</h1>

<a href="{{ route('categories.create') }}">Create New Category</a>

<hr>

@forelse ($categories as $category)
    <div>
        <h2>{{ $category->name }}</h2>
        <p>{{ $category->description }}</p>

        <a href="{{ route('categories.show', $category->id) }}">View</a>
        <a href="{{ route('categories.edit', $category->id) }}">Edit</a>

        <form method="POST" action="{{ route('categories.destroy', $category->id) }}" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>

        <hr>
    </div>
@empty
    <p>No categories found.</p>
@endforelse

{{ $categories->links() }}