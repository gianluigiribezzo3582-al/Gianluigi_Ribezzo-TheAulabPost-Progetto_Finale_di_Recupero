<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center fw-bold fs-2 text-brand" href="{{ route('homepage') }}">
            The Aulab Post
        </a>
        
        <div class="d-flex align-items-center d-lg-none">
            <div id="themeToggleMobile" class="theme-toggle-btn me-2">
                <i class="bi bi-sun-fill text-warning d-none" id="themeIconSunMobile"></i>
                <i class="bi bi-moon-stars-fill text-primary" id="themeIconMoonMobile"></i>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item">
                    <a class="nav-link fw-medium" href="{{ route('article.index') }}">Tutti gli articoli</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium" href="{{ route('careers') }}">Lavora con noi</a>
                </li>
            </ul>
            
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center flex-row justify-content-end">
                @auth
                    @if(Auth::user()->is_writer)
                    <li class="nav-item me-3">
                        <a href="{{ route('article.create') }}" class="btn btn-brand btn-sm px-3">
                            <i class="bi bi-plus-circle me-1"></i> Pubblica articolo
                        </a>
                    </li>
                    @endif
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="{{ route('login') }}">Accedi</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a href="{{ route('register') }}" class="btn btn-brand btn-sm px-3 text-nowrap">Registrati</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-medium text-capitalize" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                            <li><a class="dropdown-item" href="#">Il tuo Quotidiano</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Esci
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>

            <div class="d-none d-lg-flex align-items-center ms-lg-3">
                <div id="themeToggle" class="theme-toggle-btn">
                    <i class="bi bi-sun-fill text-warning d-none" id="themeIconSun"></i>
                    <i class="bi bi-moon-stars-fill text-primary" id="themeIconMoon"></i>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    let getStoredTheme = () => localStorage.getItem('theme')
    let setStoredTheme = theme => localStorage.setItem('theme', theme)
    let getPreferredTheme = () => {
        let storedTheme = getStoredTheme()
        if (storedTheme) return storedTheme
        return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
    }

    let setTheme = theme => {
        document.documentElement.setAttribute('data-bs-theme', theme)
        updateThemeIcons(theme)
    }

    let updateThemeIcons = theme => {
        let suns = [document.getElementById('themeIconSun'), document.getElementById('themeIconSunMobile')]
        let moons = [document.getElementById('themeIconMoon'), document.getElementById('themeIconMoonMobile')]
        
        if (theme === 'dark') {
            suns.forEach(s => s?.classList.remove('d-none'))
            moons.forEach(m => m?.classList.add('d-none'))
        } else {
            suns.forEach(s => s?.classList.add('d-none'))
            moons.forEach(m => m?.classList.remove('d-none'))
        }
    }

    let currentTheme = getPreferredTheme()
    setTheme(currentTheme)

    let toggleTheme = () => {
        let activeTheme = document.documentElement.getAttribute('data-bs-theme')
        let newTheme = activeTheme === 'dark' ? 'light' : 'dark'
        setStoredTheme(newTheme)
        setTheme(newTheme)
    }

    document.getElementById('themeToggle')?.addEventListener('click', toggleTheme)
    document.getElementById('themeToggleMobile')?.addEventListener('click', toggleTheme)


    // Chiudi navbar allo scroll
    window.addEventListener('scroll', () => {
        let navbarCollapse = document.getElementById('navbarSupportedContent');
        let navbarToggler = document.querySelector('.navbar-toggler');
        if (navbarCollapse.classList.contains('show')) {
            navbarToggler.click();
        }
    });
</script>
