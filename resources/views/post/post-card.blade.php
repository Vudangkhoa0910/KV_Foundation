@props(['post'])
@use(\Illuminate\Support\Carbon)
<div class="post-card">
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
    <h3 class="post-title">
        <a href="{{route('post.show', compact('post'))}}">
            {{$post->post_title}}
        </a>
    </h3>
    <p class="post-category">
        Category: {{$post->category->post_category_name}}
    </p>
    <p class="post-author">
        Created by {{$post->author->name}} at {{Carbon::parse($post->created_at)->toDateString()}}
    </p>
    <p class="post-excerpt">
        {{$post->excerpt}}
    </p>
    <a href="{{route('post.show', compact('post'))}}" class="action-link">Read More</a>
</div>
