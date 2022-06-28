@csrf
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}">

        <label for="slug">Slug</label>
        <input type="text" class="form-control" name="slug" value="{{ old('slug', $post->slug) }}">

        <label for="description">Description</label>
        <input type="text" class="form-control" name="description" value="{{ old('description', $post->description) }}">

        <label for="content">Content</label>
        <textarea class="form-control" name="content" > {{ old('content', $post->content) }} </textarea>

        <label for="category_id"> Category </label>
        <select class="form-control" name="category_id">
            <option value=""></option>
            @foreach ($categories as $name => $id)
                <option value="{{ old("category_id", $id) }}" {{ old("category_id", $post->category_id) == $id ? "selected" : "" }} > {{ $name }} </option>                
            @endforeach
        </select>

        <label for="posted"> Posted </label>
        <select class="form-control" name="posted"> 
            <option {{ old("posted", $post->posted) == "yes" ? "selected" : "" }} value="yes">Yes</option>
            <option {{ old("posted", $post->posted) == "no" ? "selected" : "" }} value="no">No</option>
        </select>

        @if (isset($task) && $task == "edit")
            <label for="image">Image</label>
            <input class="form-control" type="file" name="image" >
        @endif

        <button class="btn btn-success mt-3" type="submit" >Send</button>