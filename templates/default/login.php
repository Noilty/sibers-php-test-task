<?php
/**
 * @var $alerts
 */
?>

<h1>Page/Auth</h1>

<? foreach ($alerts as $alert) { ?>
    <div class="alert alert-info mb-0 pb-3 mb-3" role="alert">
        <?= $alert ?>
    </div>
<? } ?>

<form method="post">
    <div class="form-group">
        <label hidden for="login">Имя пользователя (Логин / Никнейм)</label>
        <input name="userLogin"
               type="text"
               class="form-control"
               id="login"
               placeholder="Имя пользователя (Логин / Никнейм)">
    </div>

    <div class="form-group">
        <label hidden for="password">Пароль</label>
        <input name="userPassword"
               type="password"
               class="form-control"
               id="password"
               placeholder="Пароль">
    </div>

    <div class="form-group">
        <button type="submit" name="submitAuth" class="btn btn-primary w-100">Вход</button>
    </div>
</form>