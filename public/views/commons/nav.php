<nav class="grid nav">
    <div class="nav__hamburger icon">A</div>
    <a href="/">
        <img src="/public/img/logo_slim.png" alt="logo" class="nav__logo">
    </a>
    <div class="grid nav-items">
        <div class="nav-item">
            <a href="/explorer" class="nav-item__link">Explorer</a>
        </div>
        <div class="nav-item">
            <a href="/social" class="nav-item__link">Social</a>
        </div>
        <?php if (!($isUserLogged ?? false)): ?>
            <div class="nav-item">
                <a href="/login" class="nav-item__link">Login</a>
            </div>
            <div class="nav-item">
                <a href="/register" class="nav-item__link button-link">
                    <button>Sign Up</button>
                </a>
            </div>
        <?php else: ?>
            <div class="nav-item">
                <a href="/profile" class="nav-item__link">Profile</a>
            </div>
            <div class="nav-item">
                <a href="/logout" class="nav-item__link button-link">
                    <button>Log Out</button>
                </a>
            </div>
        <?php endif ?>
    </div>
</nav>