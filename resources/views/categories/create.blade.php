<h1>Create Category</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('categories.store') }}">
    @csrf

    <label>Name</label>
    <input type="text" name="name" value="{{ old('name') }}">

    <br><br>

    <label>Description</label>
    <textarea name="description">{{ old('description') }}</textarea>

    <br><br>

    <button type="submit">Save Category</button>
</form>

<br>

<a href="{{ route('categories.index') }}">Back to Categories</a>