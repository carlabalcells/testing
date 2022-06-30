@csrf
        <label for="name">Name</label>
        <input class="form-control" type="text" name="name" value="{{ old('name', $user->name) }}">

        <label for="email">Email</label>
        <input class="form-control" type="text" name="email" value="{{ old('email', $user->email) }}">

        <button class="btn btn-success mt-3" type="submit" >Send</button>