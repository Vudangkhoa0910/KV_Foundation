@props(['categories', 'post'])
<x-layout page_title="Update post">
    <div class="form-wrapper">
        <h1>Update post</h1>
        @include('response.errors')
        <form action="{{route('post.update', compact('post'))}}" method="POST">
            @csrf
            @method('PUT')
            {{--input for post title--}}
            <div class="input-wrapper">
                <label for="post_title">Post title</label>
                <input type="text" value="{{$post->post_title}}" name="post_title" id="post_title" placeholder="Post title">
            </div>
            {{--input for excerpt (optional field)--}}
            <div class="input-wrapper">
                <label for="post_excerpt">Post excerpt <i>(optional)</i></label>
                <input type="text" value="{{$post->attributes['excerpt'] ?? ''}}" name="post_excerpt" id="post_excerpt" placeholder="Post excerpt (optional)">
            </div>
            {{--input for category--}}
            <div class="input-wrapper">
                <label for="category_id">Category</label>
                <select id="category_id" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->post_category_id}}" @selected($post->category_id == $category->post_category_id)>
                            {{$category->post_category_name}}
                        </option>
                    @endforeach
                </select>
            </div>
            {{--input for post pody--}}
            <div class="input-wrapper">
                <label for="post_body">Content</label>
                <textarea id="post_body" name="post_body" rows="5">{{$post->post_body}}</textarea>
            </div>
            <input title="Update post" type="submit" value="Update post" class="form-submit-button">
        </form>
    </div>
</x-layout>
