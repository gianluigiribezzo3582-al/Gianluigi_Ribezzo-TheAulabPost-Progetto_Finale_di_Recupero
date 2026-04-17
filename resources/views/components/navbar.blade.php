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
                    <a class="nav-link active fw-medium" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium" href="#">Tutti gli Articoli</a>
                </li>
            </ul>
            
            <div class="d-none d-lg-flex align-items-center">
                <div class="ms-3">
                    <button class="btn btn-brand btn-sm px-3">Diventa Autore</button>
                </div>
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
</script>
