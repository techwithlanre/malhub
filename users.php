<?php

$query = $db->prepare("SELECT * FROM user");
$query->execute();
$result = $query->fetchAll();
?>

<div>
    <h1>Users</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Gender</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $user) { ?>
            <tr>
                <td><?= $user['name'] ?></td>
                <td><?= $user['phone'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['gender'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
