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
                    <i class="fa fa-line-chart"></i>
                    Podsumowanie
                </a>
            </li>
            <li>
                <a @if(is_active('sales.dates')) class="active" @endif href="{{ route('sales.dates') }}">
                    <i class="fa fa-calendar"></i>
                    Okres
                </a>
            </li>
            <li>
                <a @if(is_active('sales.places')) class="active" @endif href="{{ route('sales.places') }}">
                    <i class="fa fa-globe"></i>
                    Miejsca
                </a>
            </li>
            <li>
                <a @if(is_active('sales.types')) class="active" @endif href="{{ route('sales.types') }}">
                    <i class="fa fa-pie-chart"></i>
                    Typy
                </a>
            </li>
            <li>
                <a @if(is_active('sales.popular')) class="active" @endif href="{{ route('sales.popular') }}">
                    <i class="fa fa-random"></i>
                    Popularne
                </a>
            </li>
            <li>
                <a @if(is_active('sales.category')) class="active" @endif href="{{ route('sales.category') }}">
                    <i class="fa fa-film"></i>
                    Kategorie
                </a>
            </li>
            <li>
                <a @if(is_active('sales.payments')) class="active" @endif href="{{ route('sales.payments') }}">
                    <i class="fa fa-usd"></i>
                    Płatności
                </a>
            </li>
        </ul>
    </nav>
</aside>