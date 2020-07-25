<?php
/**
 * @var $userData
 * @var $alerts
 */
$userData = $userData[0];
?>
<h1>Page/Admin/Users/Deleted</h1>

<div class="row">
    <div class="col-2">
        <?= view('widgets/admin/left-menu', [], false) ?>
    </div>
    <div class="col-10">
        <? foreach ($alerts as $alert) { ?>
            <div class="alert alert-info mb-0 mb-3" role="alert">
                <?= $alert ?>
            </div>
        <? } ?>

        <? if (!empty($userData)) { ?>
            <h1 class="card-title"><?= $userData['name'] ?> <?= $userData['surname'] ?> <strong>#<?= $userData['id'] ?></strong></h1>
            <form method="post">
                <div class="form-group">
                    <button type="submit" name="submitDeleted" class="btn btn-danger w-100">Deleted</button>
                </div>
            </form>
        <? } else { ?>
            <div class="alert alert-primary" role="alert">
                Пользователь <strong>#<?= $_GET['id']?></strong> не найден
            </div>
        <? } ?>
    </div>
</div>