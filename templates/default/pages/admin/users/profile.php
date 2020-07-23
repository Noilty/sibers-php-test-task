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
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="/assets/images/no-photo.jpg" class="card-img" alt="No photo">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h1 class="card-title"><?= $userData['name'] ?> <?= $userData['surname'] ?> #<?= $userData['id'] ?></h1>
                        <p class="card-text">Login: <strong><?= $userData['login'] ?></strong></p>
                        <p class="card-text">Gender: <strong><?= $userData['gender'] ?></strong></p>
                        <p class="card-text">Birthday: <strong><strong><?= date_format(date_create($userData['birthday']),'Y-m-d') ?></strong></p>
                        <p class="card-text">
                            <small class="text-muted">Registration date: <strong><?= date_format(date_create($userData['reg_date']),'Y-m-d') ?></strong></small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>