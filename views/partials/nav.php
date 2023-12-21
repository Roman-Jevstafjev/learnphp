<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="https://bulma.io">
            <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="/">
                Home
            </a>

            <a class="navbar-item" href="/about">
                About
            </a>
            <?php if(auth()): ?>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        Admin
                    </a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="/admin/posts">
                            Posts
                        </a>
                        <a class="navbar-item" href="/admin/users">
                            Users
                        </a>
                    </div>
                </div>
            <?php endif;?>
        </div>

        <div class="navbar-end">
            <?php if(auth()): ?>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        <?=auth()->email?>
                    </a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="/logout">
                            Logout
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <div class="navbar-item">
                    <div class="buttons">
                        <a href="/register" class="button is-primary">
                            <strong>Sign up</strong>
                        </a>
                        <a href="/login" class="button is-light">
                            Log in
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>