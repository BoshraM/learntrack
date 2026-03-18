<h1>Challenges</h1>

<a href="{{ route('challenges.create') }}">Create New Challenge</a>

<hr>

@forelse ($challenges as $challenge)
    <div>
        <h2>{{ $challenge->title }}</h2>
        <p>{{ $challenge->description }}</p>
        <p><strong>Category:</strong> {{ $challenge->category->name ?? 'No category' }}</p>
        <p><strong>Difficulty:</strong> {{ ucfirst($challenge->difficulty) }}</p>
        <p><strong>Estimated time:</strong> {{ $challenge->estimated_minutes ?? 'N/A' }} mins</p>

        <a href="{{ route('challenges.show', $challenge->id) }}">View</a>
        <a href="{{ route('challenges.edit', $challenge->id) }}">Edit</a>

        <form method="POST" action="{{ route('challenges.destroy', $challenge->id) }}" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>

        <hr>
    </div>
@empty
    <p>No challenges found.</p>
@endforelse

{{ $challenges->links() }}