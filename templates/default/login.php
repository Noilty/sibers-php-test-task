<h1>Page/Auth</h1>

<form action="index.php" method="post">
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
               type="text"
               class="form-control"
               id="password"
               placeholder="Пароль">
    </div>

    <div class="form-group">
        <button type="submit" name="submitAuth" class="btn btn-primary w-100">Вход</button>
    </div>
</form>