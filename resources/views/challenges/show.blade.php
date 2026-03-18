<h1>{{ $challenge->title }}</h1>

<p><strong>Category:</strong> {{ $challenge->category->name ?? 'No category' }}</p>
<p><strong>Difficulty:</strong> {{ ucfirst($challenge->difficulty) }}</p>
<p><strong>Estimated time:</strong> {{ $challenge->estimated_minutes ?? 'N/A' }} mins</p>
<p><strong>Slug:</strong> {{ $challenge->slug }}</p>

<hr>

<p>{{ $challenge->description }}</p>
@auth
    @if (!auth()->user()->completedChallenges()->where('challenge_id', $challenge->id)->exists())
        <form method="POST" action="{{ route('challenges.complete', $challenge->id) }}">
            @csrf
            <button type="submit">Mark as Complete</button>
        </form>
    @else
        <p><strong>Completed ✅</strong></p>
    @endif
@endauth
@auth
  <a href="{{ route('challenges.edit', $challenge->id) }}">Edit</a>
@endauth
<a href="{{ route('challenges.index') }}">Back to Challenges</a>