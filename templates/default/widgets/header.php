<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light p-0 pt-2 pb-2">
        <a class="navbar-brand" href="/">
            <img src="/assets/images/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
            <?= $config['name'] ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/index.php">Главная</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/index.php?op=login">Войти</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/index.php?op=register">Зарегистрироваться</a>
                </li>
            </ul>
        </div>
    </nav>
</div>