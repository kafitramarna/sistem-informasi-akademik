<aside class="navbar navbar-vertical navbar-expand-sm navbar-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark">
            <a href="#">
                <img src="https://unimus.ac.id/wp-content/uploads/2014/07/logo-unimus.png" alt="Tabler"
                    class="navbar-brand-image" />
            </a>
        </h1>
        <div class="collapse navbar-collapse" id="sidebar-menu">
            @include('_partials.menu')
        </div>
        <hr class="navbar-divider my-3">
        <div class="mb-3 text-center">
            {{-- <form action="{{ route('logout') }}" method="POST">
                @csrf    --}}
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalOut">
                    Logout
                </button>
            {{-- </form> --}}
        </div>
    </div>
</aside>
