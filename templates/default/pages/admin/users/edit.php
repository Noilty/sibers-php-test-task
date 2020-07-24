<?php
/**
 * @var $userData
 * @var $alerts
 */
$userData = $userData[0];
?>

<h1>Page/Admin/Users/Edit/<?= $userData['login'] ?: 'Пользователь не найден' ?></h1>

<div class="row">
    <div class="col-2">
        <?= view('widgets/admin/left-menu', [], false) ?>
    </div>
    <div class="col-10">
        <? if (!empty($userData)) { ?>
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/assets/images/no-photo.jpg" class="card-img" alt="No photo">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <? foreach ($alerts as $alert) { ?>
                                <div class="alert alert-info mb-0" role="alert">
                                    <?= $alert ?>
                                </div>
                            <? } ?>
                            <form method="post">
                                <fieldset>
                                    <legend>Данные профиля</legend>
                                    <div class="form-group">
                                        <label hidden for="login">Имя пользователя (Логин / Никнейм)</label>
                                        <input name="userLogin"
                                               type="text"
                                               value="<?= $userData['login'] ?>"
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
                                <div class="form-group">
                                    <button type="submit" name="submitEditUserDataProfile" class="btn btn-primary w-100">Сменить</button>
                                </div>
                            </form>

                            <form method="post">
                                <fieldset>
                                    <legend>Персональные данные</legend>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <label hidden for="name">Имя</label>
                                                <input name="userName"
                                                       type="text"
                                                       value="<?= $userData['name'] ?>"
                                                       class="form-control"
                                                       id="name"
                                                       placeholder="Имя">
                                                <small id="nameHelp" class="form-text text-muted">Длина от 3 до 32 символов</small>
                                            </div>

                                            <div class="col">
                                                <label hidden for="lastName">Фамилия</label>
                                                <input name="userSurname"
                                                       type="text"
                                                       value="<?= $userData['surname'] ?>"
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
                                               value="<?= $userData['birthday'] ?>"
                                               class="form-control"
                                               id="birthday"
                                               placeholder="Имя пользователя (Логин / Никнейм)">
                                        <small id="birthdayHelp" class="form-text text-muted">Укажите дату рождения</small>
                                    </div>
                                </fieldset>

                                <div class="form-group">
                                    <button type="submit" name="submitEditUserPersonalData" class="btn btn-primary w-100">Сменить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <? } else { ?>
            <div class="alert alert-primary" role="alert">
                Пользователь <strong>#<?= $_GET['id']?></strong> не найден
            </div>
        <? } ?>
    </div>
</div>