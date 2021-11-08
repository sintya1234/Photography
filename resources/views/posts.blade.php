@extends('layouts/main')
@section('container')
    <h1 class="mb-3 text-center">{{ $title }}</h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari....." name="cari"
                        value="{{ request('cari') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>


    @if ($posts->count())
        <div class="card mb-3">
            @if ($posts[0]->image)
                <div style="max-height: 400px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}"
                        class="img-fluid mt-3">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top"
                    alt="{{ $posts[0]->category->name }}">
            @endif

            <div class="card-body text-center">
                <h5 class="card-title"><a href="/posts/{{ $posts[0]->slug }}"
                        class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h5>
                <p>

                    <small class="text-muted">
                        By. <a href="/posts?author={{ $posts[0]->author->username }}"
                            class="text-decoration-none">{{ $posts[0]->author->name }}</a>
                        category: <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">
                            {{ $posts[0]->category->name }}</a>

                        {{-- {{ $posts[0]->created_at->diffForHumans() }} --}}
                    </small>
                </p>

                <p class="card-text">{{ $posts[0]->excerpt }}</p>

                <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more...</a>
                </p>
            </div>
        </div>


        {{-- }<article class="mb-5">
        <h2>
            <a href="posts/{{ $poss["slug"] }}">{{ $poss["judul"] }}</a>    
        </h2>
        <h5>By : {{ $poss["author"] }}</h5>
        <h6>{{ $poss["body"] }}</h6>
    </article> --}}
        {{-- <article class="mb-5">
        <h2>
            <a href="posts/{{ $poss["id"] }}">{{ $poss["title"] }}</a>    
        </h2>
        <h5>By : {{ $poss["author"] }}</h5>
        <h6>{{ $poss["excerpt"] }}</h6>
    </article> --}}


        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $poss)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0,0, 0.7)"><a
                                    href="/posts?category={{ $poss->category->slug }}"
                                    class="text-white text-decoration-none">{{ $poss->category->name }}</a></div>
                            @if ($poss->image)
                                <div style="max-height: 350px; overflow:hidden;">
                                    <img src="{{asset('storage/' . $poss->image)}}"
                                        alt="{{ $poss->category->name }}" class="img-fluid mt-3">
                                </div>
                            @else
                                <img src="https://source.unsplash.com/500x400?{{ $poss->category->name }}"
                                    class="card-img-top" alt="..." class="card-img-top" alt="...">
                            @endif


                            <div class="card-body">
                                <h5 class="card-title">{{ $poss->title }}</h5>
                                <p>
                                    <small class="text-muted">
                                        By. <a href="/posts?author={{ $poss->author->username }}"
                                            class="text-decoration-none">{{ $poss->author->name }}</a>
                                        {{ $poss->category->name }}</a>

                                        {{-- {{ $poss->created_at->diffForHumans() }} --}}
                                    </small>
                                </p>
                                <p class="card-text">{{ $poss->excerpt }}</p>
                                <a href="/posts/{{ $poss->slug }}" class="btn btn-primary">Read more</a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">No Post Found.</p>

    @endif
    {{ $posts->links() }}
@endsection
