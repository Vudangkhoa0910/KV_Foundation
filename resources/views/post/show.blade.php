{{--show a specific post detail page--}}
@props(['post'])
<x-layout page_title="{{$post->post_title}}">
    <div class="post-page">
        @include('response.success')
        <h2>{{$post->post_title}}</h2>
        {{--only owner or admin can update or delete post--}}
        @can('update', $post)
            <div class="post-controls">
                <a href="{{route('post.edit', compact('post'))}}" class="action-link blue">Edit</a>
                <form action="{{route('post.delete', compact('post'))}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="X" class="action-link">
                </form>
            </div>
        @endcan
        <p class="post-category">
            Category: {{$post->category->post_category_name}}
        </p>
        <p class="post-author">
            Created by {{$post->author->name}} at {{\Illuminate\Support\Carbon::parse($post->created_at)->toDateString()}}
        </p>
        <p class="post-body">{{$post->post_body}}</p>
    </div>

</x-layout>
