<?php

$query = $db->prepare('SELECT * FROM sessions ORDER BY id DESC');
$result = $query->execute();
$sessionCount = $query->rowCount();
$sessions = $query->fetchAll();

?>

<div>
    <h2>Sessions List</h2>
    <p>This table displays a list of session</p>

    <a href="index.php?view=create-session" style="margin-bottom: 50px;">Create new session</a>

    <?php if ($sessionCount > 0): ?>
        <table class="w3-table w3-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($sessions as $session): ?>
                <tr>
                    <td><?= $session['name'] ?></td>
                    <td><?= $session['start_date'] ?></td>
                    <td><?= $session['end_date'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>

        <div class="w3-margin-top">
            No session found
        </div>

    <?php endif; ?>
</div>

