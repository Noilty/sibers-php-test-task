<?php
/**
 * @var $arrListUsers
 * @var $iPagination
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
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">#</th>
            </tr>
            </thead>
            <tbody>
            <? foreach ($arrListUsers as $user) { ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['surname'] ?></td>
                    <td>
                        <ul class="nav">
                            <li class="pr-3">
                                <a href="/admin/index.php?op=profile&id=<?= $user['id'] ?>">Profile</a>
                            </li>
                            <li class="pr-3">
                                <a href="/admin/index.php?op=edit&id=<?= $user['id'] ?>">Edit</a>
                            </li>
                            <li>
                                <a class="text-danger"
                                   href="/admin/index.php?op=deleted&id=<?= $user['id'] ?>">Deleted</a>
                            </li>
                        </ul>
                    </td>
                </tr>
            <? } ?>
            </tbody>
        </table>
        <ul class="pagination pagination-sm">
            <? for($i = 1; $i <= $iPagination; $i++) { ?>
                <a href="/admin/index.php?op=list&page=<?= $i ?>">
                    <li class="page-item<?= ((int)$_GET['page'] === $i ? ' active' : '') ?>">
                        <span class="page-link"><?= $i ?></span>
                    </li>
                </a>
            <? } ?>
        </ul>

    </div>
</div>