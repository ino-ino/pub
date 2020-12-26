 @if (session('message'))
        {{ session('message') }}
    @endif

    {{ $pub->title }}
    {{ $pub->content }} 

 <a href="/pubs/{{ $pub->id }}/edit">Edit</a>