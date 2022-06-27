@csrf
        <label for="title">Title</label>
        <input type="text" name="title" value="{{ old('title', $post->title) }}">

        <label for="slug">Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $post->slug) }}">

        <label for="description">Description</label>
        <input type="text" name="description" value="{{ old('description', $post->description) }}">

        <label for="content">Content</label>
        <textarea name="content" > {{ old('content', $post->content) }} </textarea>

        <label for="category_id"> Category </label>
        <select name="category_id">
            <option value=""></option>
            @foreach ($categories as $name => $id)
                <option value="{{ old("category_id", $id) }}" {{ old("category_id", $post->category_id) == $id ? "selected" : "" }} > {{ $name }} </option>                
            @endforeach
        </select>

        <label for="posted"> Posted </label>
        <select name="posted"> 
            <option {{ old("posted", $post->posted) == "yes" ? "selected" : "" }} value="yes">Yes</option>
            <option {{ old("posted", $post->posted) == "no" ? "selected" : "" }} value="no">No</option>
        </select>

        @if (isset($task) && $task == "edit")
            <label for="image">Image</label>
            <input type="file" name="image" >
        @endif

        <button type="submit" >Send</button>