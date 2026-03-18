<h1>{{ $challenge->title }}</h1>

<p><strong>Category:</strong> {{ $challenge->category->name ?? 'No category' }}</p>
<p><strong>Difficulty:</strong> {{ ucfirst($challenge->difficulty) }}</p>
<p><strong>Estimated time:</strong> {{ $challenge->estimated_minutes ?? 'N/A' }} mins</p>
<p><strong>Slug:</strong> {{ $challenge->slug }}</p>

<hr>

<p>{{ $challenge->description }}</p>

<a href="{{ route('challenges.edit', $challenge->id) }}">Edit</a>
<a href="{{ route('challenges.index') }}">Back to Challenges</a>