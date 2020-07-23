<?php
/**
 * @var $alerts
 */
?>
<h1>Page/Admin/Users/Add</h1>

<div class="row">
    <div class="col-2">
        <?= view('widgets/admin/left-menu', [], false) ?>
    </div>
    <div class="col-10">
        <? if (!empty($alerts)) { ?>
            <? foreach ($alerts as $alert) { ?>
                <div class="alert alert-info mb-0 mt-3" role="alert">
                    <?= $alert ?>
                </div>
            <? } ?>
        <? } ?>


        <form method="post">
            <fieldset>
                <legend>Данные профиля</legend>
                <div class="form-group">
                    <label hidden for="login">Имя пользователя (Логин / Никнейм)</label>
                    <input name="userLogin"
                           type="text"
                           class="form-control"
                           id="login"
                           placeholder="Имя пользователя (Логин / Никнейм)">
                    <small id="loginHelp" class="form-text text-muted">Длина от 3 до 16 символов</small>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label hidden for="password">Пароль</label>
                            <input name="userPassword"
                                   type="password"
                                   class="form-control"
                                   id="password"
                                   placeholder="Пароль">
                            <small id="passwordHelp" class="form-text text-muted">Длина от 3 до 16 символов</small>
                        </div>

                        <div class="col">
                            <label hidden for="rePassword">Повторите пароль</label>
                            <input name="userRePassword"
                                   type="password"
                                   class="form-control"
                                   id="rePassword"
                                   placeholder="Повторите пароль">
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>Персональные данные</legend>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label hidden for="name">Имя</label>
                            <input name="userName"
                                   type="text"
                                   class="form-control"
                                   id="name"
                                   placeholder="Имя">
                            <small id="nameHelp" class="form-text text-muted">Длина от 3 до 32 символов</small>
                        </div>

                        <div class="col">
                            <label hidden for="lastName">Фамилия</label>
                            <input name="userSurname"
                                   type="text"
                                   class="form-control"
                                   id="lastName"
                                   placeholder="Фамилия">
                            <small id="lastNameHelp" class="form-text text-muted">Длина от 3 до 32 символов</small>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label hidden for="gender">Пол</label>
                    <select name="userGender"
                            class="form-control"
                            id="gender">
                        <option>Мужчина</option>
                        <option>Женщина</option>
                    </select>
                    <small id="loginHelp" class="form-text text-muted">Укажите пол</small>
                </div>

                <div class="form-group">
                    <label hidden for="birthday">Дата рождения</label>
                    <input name="userBirthday"
                           type="date"
                           class="form-control"
                           id="birthday"
                           placeholder="Имя пользователя (Логин / Никнейм)">
                    <small id="birthdayHelp" class="form-text text-muted">Укажите дату рождения</small>
                </div>
            </fieldset>

            <div class="form-group">
                <button type="submit" name="submitRegister" class="btn btn-primary w-100">Регистрация</button>
            </div>
        </form>
    </div>
</div>