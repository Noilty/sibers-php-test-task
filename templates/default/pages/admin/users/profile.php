<?php
/**
 * @var $userData
 */
$userData = $userData[0];
?>

<h1>Page/Admin/Users/Profile/<?= $userData['login'] ?></h1>

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
                            <h1 class="card-title"><?= $userData['name'] ?> <?= $userData['surname'] ?> <strong>#<?= $userData['id'] ?></strong></h1>
                            <p class="card-text">Login: <strong><?= $userData['login'] ?></strong></p>
                            <p class="card-text">Gender: <strong><?= $userData['gender'] ?></strong></p>
                            <p class="card-text">Birthday: <strong><?= dateFormat($userData['birthday'], 'Y-m-d') ?></strong></p>
                            <p class="card-text">
                                <small class="text-muted">Registration date: <strong><?= dateFormat($userData['reg_date'], 'Y-m-d') ?></strong></small>
                            </p>
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