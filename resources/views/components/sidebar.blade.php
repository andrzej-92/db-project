<aside class="sidebar">
    <div class="logo-wrapper">
        <a href="/" class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" />
        </a>
    </div>
    <nav>
        <ul>
            <li>
                <a @if(is_active('dashboard')) class="active" @endif href="{{ route('dashboard') }}">
                    Podsumowanie
                </a>
            </li>
            <li>
                <a @if(is_active('sales.dates')) class="active" @endif href="{{ route('sales.dates') }}">
                    Okres
                </a>
            </li>
            <li>
                <a @if(is_active('sales.places')) class="active" @endif href="{{ route('sales.places') }}">
                    Miejsca
                </a>
            </li>
            <li>
                <a @if(is_active('sales.types')) class="active" @endif href="{{ route('sales.types') }}">
                    Typy
                </a>
            </li>
        </ul>
    </nav>
</aside>