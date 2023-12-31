<?php
$query = $db->prepare("SELECT id, name, phone, email, gender FROM users");
$query->execute();
$userCount = $query->rowCount();
$result = $query->fetchAll();
?>

<div>
    <h2>Users List</h2>
    <p>This table displays a list of users</p>

    <a href="index.php?view=create-user" style="margin-bottom: 50px;">Create new user</a>

    <?php if ($userCount > 0): ?>
        <table class="w3-table w3-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Gender</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $user): ?>
                <tr>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['phone'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['gender'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>

    <div>
        No user found
    </div>

    <?php endif; ?>
</div>
