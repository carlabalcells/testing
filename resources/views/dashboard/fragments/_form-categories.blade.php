@csrf
        <label for="name">Name</label>
        <input class="form-control" type="text" name="name" value="{{ old('name', $category->name) }}">

        <label for="slug">Slug</label>
        <input class="form-control" type="text" name="slug" value="{{ old('slug', $category->slug) }}">

        <button class="btn btn-success mt-3" type="submit" >Send</button>