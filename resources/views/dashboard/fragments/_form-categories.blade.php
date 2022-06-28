@csrf
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name', $category->name) }}">

        <label for="slug">Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $category->slug) }}">

        <button type="submit" >Send</button>