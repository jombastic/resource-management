<div class="container">
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="{{ route('admin') }}" class="nav-link px-2 text-muted">Admin</a></li>
        </ul>
        <p class="text-center text-muted">&copy; {{ date('Y') }} - Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
    </footer>
</div>
