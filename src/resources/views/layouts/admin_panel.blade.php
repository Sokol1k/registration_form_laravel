<div class="text-right">
    @if (Auth::check())
    <form method="POST" action="{{ route('logout') }}">
        {{ csrf_field() }}
        <button class="btn btn-primary" type="submit">Log out</button>
    </form>
    @else
    <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
    @endif
</div>