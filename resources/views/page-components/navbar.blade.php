<style>
    .login{
        text-decoration: none;
        background-color: #fff;
        color: red;
        padding: 6px 8px 6px 8px;
        border-radius: 4px;
    }
</style>
<nav class="navbar navbar-expand-lg bg-danger text-white">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#" style="margin-left:5%;">Rowdy Banter</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="{{url('../posts')}}">Home</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="{{url('add-post')}}">Create Post</a>
                </li>
            </ul>
        </div>
        @auth
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" 
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ auth()->user()->name }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ url('/profile') }}">
                                Settings
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        @else
            <a href="{{ url('/login') }}" class="login">Login</a>
        @endauth
    </div>
</nav>