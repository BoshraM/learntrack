<h1>Edit Challenge</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('challenges.update', $challenge->id) }}">
    @csrf
    @method('PUT')

    <label>Title</label>
    <input type="text" name="title" value="{{ old('title', $challenge->title) }}">

    <br><br>

    <label>Description</label>
    <textarea name="description">{{ old('description', $challenge->description) }}</textarea>

    <br><br>

    <label>Difficulty</label>
    <select name="difficulty">
        <option value="beginner" @selected(old('difficulty', $challenge->difficulty) == 'beginner')>Beginner</option>
        <option value="intermediate" @selected(old('difficulty', $challenge->difficulty) == 'intermediate')>Intermediate</option>
        <option value="advanced" @selected(old('difficulty', $challenge->difficulty) == 'advanced')>Advanced</option>
    </select>

    <br><br>

    <label>Estimated Minutes</label>
    <input type="number" name="estimated_minutes" value="{{ old('estimated_minutes', $challenge->estimated_minutes) }}">

    <br><br>

    <label>Category</label>
    <select name="category_id">
        <option value="">Select a category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected(old('category_id', $challenge->category_id) == $category->id)>
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <br><br>

    <button type="submit">Update Challenge</button>
</form>

<br>

<a href="{{ route('challenges.index') }}">Back to Challenges</a>