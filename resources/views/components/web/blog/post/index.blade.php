<div>
    {{ $slot }}

    @foreach ($posts as $p)
        <div class="card card-white mb-2">
            <h3>{{ $p->title }}</h3>
            <a href="{{ route('web.blog.show', $p) }}">Go</a>
            <p>{{ $p->description }}</p>
        </div>

        
    @endforeach

    {{ $posts->links() }}
</div>