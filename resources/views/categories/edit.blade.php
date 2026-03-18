<h1>Edit Category</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('categories.update', $category->id) }}">
    @csrf
    @method('PUT')

    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $category->name) }}">

    <br><br>

    <label>Description</label>
    <textarea name="description">{{ old('description', $category->description) }}</textarea>

    <br><br>

    <button type="submit">Update Category</button>
</form>

<br>

<a href="{{ route('categories.index') }}">Back to Categories</a>