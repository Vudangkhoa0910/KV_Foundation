<header>
    <h1 class="header-title">
        <a title="Go to main page" href="{{route('dashboard.index')}}">Laravel blog example</a>
    </h1>
    <div class="header-right">
        @auth
            <p>Welcome back {{auth()->user()->name}}</p>
        @endauth
        <nav>
            <ul>
                <li>
                    <a href="{{route('dashboard.index')}}">Home</a>
                </li>
                <li>
                    <a href="{{route('post.create')}}">Create new post</a>
                </li>
                {{--links visible only for NOT logged in users--}}
                @guest
                    <li>
                        <a href="{{route('dashboard.login')}}">Login</a>
                    </li>
                @endguest
                {{--links visible only for logged in users--}}
                @auth
                    <li>
                        <form class="action-form" action="{{route('auth.logout')}}" method="POST">
                            @csrf
                            <input type="submit" value="Logout">
                        </form>
                    </li>
                @endauth
            </ul>
        </nav>
    </div>
</header>
