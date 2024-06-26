@extends('layouts.main-layout')

{{-- @section('title', $currentCategoryNameBlog ? $currentCategoryNameBlog->title : 'My blog') --}}
@section('title', $currentCategoryNameBlog->title ?? 'My blog')

@section('content')
    @include('includes.categories')
    @foreach ($posts as $post)
        <div class="card mb-4">
            <div class="card-header">
                <a href="{{ route('getPostsByCategory', $post->category['slug']) }}">{{ $post->category['title'] }}</a>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->description }}</p>
                <a href="{{route('getPost', [$post->category['slug'], $post->slug])}}" class="btn btn-primary">Read more</a>
            </div>
        </div>
    @endforeach

    {{$posts->links('vendor.pagination.bootstrap-4')}}

    {{-- <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav> --}}
@endsection
