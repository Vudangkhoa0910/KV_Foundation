@props(['categories'])
<x-layout page_title="Create new post">
    <div class="form-wrapper">
        <h1>Create new post</h1>
        @include('response.errors')
        <form action="{{route('post.store')}}" method="POST">
            @csrf
            {{--input for post title--}}
            <div class="input-wrapper">
                <label for="post_title">Post title</label>
                <input type="text" value="{{old('post_title', '')}}" name="post_title" id="post_title" placeholder="Post title">
            </div>
            {{--input for excerpt (optional field)--}}
            <div class="input-wrapper">
                <label for="post_excerpt">Post excerpt <i>(optional)</i></label>
                <input type="text" value="{{old('post_excerpt', '')}}" name="post_excerpt" id="post_excerpt" placeholder="Post excerpt (optional)">
            </div>
            {{--input for category--}}
            <div class="input-wrapper">
                <label for="category_id">Category</label>
                <select id="category_id" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->post_category_id}}" @selected(old('category_id') == $category->post_category_id)>
                            {{$category->post_category_name}}
                        </option>
                    @endforeach
                </select>
            </div>
            {{--input for post pody--}}
            <div class="input-wrapper">
                <label for="post_body">Content</label>
                <textarea id="post_body" name="post_body" rows="5">{{old('post_body', '')}}</textarea>
            </div>
            <input title="Create new post" type="submit" value="Create new post" class="form-submit-button">
        </form>
    </div>
</x-layout>
