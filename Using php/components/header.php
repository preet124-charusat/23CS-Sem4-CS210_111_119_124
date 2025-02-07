<header>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <nav class="container">
        <a href="index.php" class="logo">
            JobRecruit
        </a>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php?page=jobs">Jobs</a></li>
            <li><a href="index.php?page=resources">Resources</a></li>
            <li><a href="index.php?page=blog">Blog</a></li>
            <li><a href="index.php?page=about">About Us</a></li>
            <li><a href="index.php?page=contact">Contact</a></li>
        </ul>
        <div class="nav-actions">
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="user-menu">
                    <button class="user-menu-btn">
                        <img src="images/user-avatar.jpg" alt="User Avatar" class="user-avatar">
                        <span><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <ul class="user-dropdown">
                        <li><a href="index.php?page=dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li><a href="index.php?page=profile"><i class="fas fa-user"></i> Profile</a></li>
                        <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </div>
            <?php else: ?>
                <a href="index.php?page=login" class="btn btn-primary">Login / Sign Up</a>
            <?php endif; ?>
            <button id="theme-toggle" aria-label="Toggle theme">
                <i class="fas fa-sun"></i>
                <i class="fas fa-moon"></i>
            </button>
        </div>
        <button class="mobile-menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </nav>
</header>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const navLinks = document.querySelector('.nav-links');
    const userMenuBtn = document.querySelector('.user-menu-btn');
    const userDropdown = document.querySelector('.user-dropdown');

    mobileMenuToggle.addEventListener('click', () => {
        mobileMenuToggle.classList.toggle('active');
        navLinks.classList.toggle('active');
    });

    if (userMenuBtn) {
        userMenuBtn.addEventListener('click', () => {
            userDropdown.classList.toggle('active');
        });

        document.addEventListener('click', (e) => {
            if (!userMenuBtn.contains(e.target) && !userDropdown.contains(e.target)) {
                userDropdown.classList.remove('active');
            }
        });
    }
});
</script>

<style>
header {
    background-color: var(--bg-color);
    padding: 1rem 0;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 0;
    z-index: 1000;
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    display: flex;
    align-items: center;
    font-size: 1.5rem;
    font-weight: bold;
    color: var(--primary-color);
    text-decoration: none;
}

.logo-img {
    height: 40px;
    margin-right: 0.5rem;
}

.nav-links {
    display: flex;
    list-style-type: none;
    margin: 0;
    padding: 0;
}

.nav-links li {
    margin-left: 1.5rem;
}

.nav-links a {
    color: var(--text-color);
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s;
}

.nav-links a:hover {
    color: var(--primary-color);
}

.nav-actions {
    display: flex;
    align-items: center;
}

.user-menu {
    position: relative;
}

.user-menu-btn {
    display: flex;
    align-items: center;
    background: none;
    border: none;
    cursor: pointer;
    padding: 0.5rem;
}

.user-avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    margin-right: 0.5rem;
}

.user-dropdown {
    position: absolute;
    top: 100%;
    right: 0;
    background-color: var(--bg-color);
    border: 1px solid var(--border-color);
    border-radius: 4px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    display: none;
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.user-dropdown.active {
    display: block;
}

.user-dropdown li a {
    display: flex;
    align-items: center;
    padding: 0.75rem 1rem;
    color: var(--text-color);
    text-decoration: none;
    transition: background-color 0.3s;
}

.user-dropdown li a:hover {
    background-color: var(--bg-color-secondary);
}

.user-dropdown li a i {
    margin-right: 0.5rem;
}

#theme-toggle {
    background: none;
    border: none;
    color: var(--text-color);
    font-size: 1.2rem;
    cursor: pointer;
    margin-left: 1rem;
    transition: transform 0.3s;
}

#theme-toggle:hover {
    transform: scale(1.1);
}

.mobile-menu-toggle {
    display: none;
    background: none;
    border: none;
    cursor: pointer;
    padding: 0.5rem;
}

.mobile-menu-toggle span {
    display: block;
    width: 25px;
    height: 3px;
    background-color: var(--text-color);
    margin: 5px 0;
    transition: transform 0.3s, opacity 0.3s;
}

@media (max-width: 768px) {
    .nav-links {
        display: none;
        flex-direction: column;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background-color: var(--bg-color);
        padding: 1rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .nav-links.active {
        display: flex;
    }

    .nav-links li {
        margin-left: 0;
        margin-bottom: 1rem;
    }

    .mobile-menu-toggle {
        display: block;
    }

    .mobile-menu-toggle.active span:nth-child(1) {
        transform: rotate(45deg) translate(5px, 5px);
    }

    .mobile-menu-toggle.active span:nth-child(2) {
        opacity: 0;
    }

    .mobile-menu-toggle.active span:nth-child(3) {
        transform: rotate(-45deg) translate(7px, -6px);
    }
}
</style>

