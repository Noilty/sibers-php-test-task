<?php
/**
 * @var $arrListUsers
 */
?>
<h1>Page/Admin/Users/List</h1>

<div class="row">
    <div class="col-2">
        <?= view('widgets/admin/left-menu', [], false) ?>
    </div>
    <div class="col-10">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">#</th>
            </tr>
            </thead>
            <tbody>
            <? foreach ($arrListUsers as $user) { ?>
                <tr>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['surname'] ?></td>
                    <td><a href="/admin/index.php?op=profile&id=<?= $user['id'] ?>">Profile</a></td>
                </tr>
            <? } ?>
            </tbody>
        </table>
    </div>
</div>