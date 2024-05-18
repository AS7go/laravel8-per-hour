@extends('layouts.main-layout')

{{-- @section('title', $currentCategoryNameBlog ? $currentCategoryNameBlog->title : 'My blog') --}}
{{-- @section('title', $currentCategoryNameBlog->title ?? 'My blog') --}}
@section('title', $post->title)

@section('content')
    @include('includes.categories')
    <div>
        <a href="{{route('getPostsByCategory',$slug_category)}}" class="btn btn-outline-primary mb-4">Back</a>
    </div>
    <article>
        <article>
            {!! $post->text !!}
        </article>
    </article>
@endsection
