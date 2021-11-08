@extends('dashboard.layouts.main')

@section('container')

    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $post->title }}</h1>

                <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span>Back to All My
                    Post</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span
                        data-feather="edit"></span>Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Beneran mau hapus?')">
                        <span data-feather="x-circle">Delete</span>
                    </button>
                </form>

                @if ($post->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                        class="img-fluid mt-3">
                </div>
                        @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                        alt="{{ $post->category->name }}" class="img-fluid mt-3">
                @endif

                <article class="my-3 fs-5">
                    {!! $post->body !!}{{-- supaya yag html terpakai tapi tidak dicetak good --}}
                </article>
                <a href="/posts" class="d-block mt-3">Back to posts</a>
            </div>
        </div>
    </div>

    {{-- <article>
<h2>{{ $post["judul"] }}</h2>
<h5>{{ $post["author"] }}</h5>
<h6>{{ $post["body"] }}</h6>
</article> --}}
@endsection
