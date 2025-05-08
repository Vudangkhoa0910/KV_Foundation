<x-layout>
    <div class="index-wrapper">
        {{--display a list of posts--}}
        <section class="post-section">
            {{--post pagination--}}
            @include('response.errors')
            @include('response.success')
            <div class="post-pagination">
                {{$posts->links('pagination.index')}}
                <p>Page {{$posts->currentPage()}} of {{$posts->lastPage()}} pages</p>
            </div>
            <div class="post-list">
                {{--loop through posts--}}
                @each('post.post-card', $posts, 'post')
            </div>
        </section>
    </div>
</x-layout>
