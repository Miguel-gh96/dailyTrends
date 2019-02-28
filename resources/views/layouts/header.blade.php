<header>
    <div class="navbar is-fixed-top">
        <div class="container">
            <a href="{{ url('') }}" class="logo">
                <label>DAILY</label>
                <label>TRENDS</label>
            </a>
            <div>
                @if (Request::is('dashboard/*') || Request::is('dashboard'))                    
                    <a href="{{ url('') }}" class="button is-info">HOME</a>    
                @else
                    <a href="{{ url('dashboard') }}" class="button is-info">DASHBOARD</a>    
                @endif
                
            </div>
        </div>
    </div>
</header>