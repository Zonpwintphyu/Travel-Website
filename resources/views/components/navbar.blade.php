<style>
    .navbar {
        background-color: #333;
        color: #fff;
    }

    .navbar-nav .nav-link {
        color: #cac1c1;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    .navbar-nav .nav-link.active,
    .navbar-nav .nav-link:hover {
        color: rgb(12, 11, 11);
    }

    .navbar .btn-link {
        color: #887b7b;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    .navbar .btn-link:hover {
        color: rgb(18, 16, 16);
    }
</style>

<nav class="navbar navbar-expand-lg bg-light sticky-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                @auth
                    @if (auth()->user()->is_activated == 1)
                        @can('admin')
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/createPage">Dashboard</a>
                            </li>
                        @endcan
                        <li class="nav-item">
                            <a class="nav-link" href="/profile">My Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/posts">Travelling Posts</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/home">HomePage</a>
                        </li>
                    @endif
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link">Log Out</button>
                    </form>
                @else
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
