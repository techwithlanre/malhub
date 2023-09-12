<?php

$query = $db->prepare('SELECT * FROM courses ORDER BY id DESC');
$result = $query->execute();
$courseCount = $query->rowCount();
$courses = $query->fetchAll();

?>

<div>
    <h2>Course List</h2>
    <p>This table displays a list of course</p>

    <a href="index.php?view=create-course" style="margin-bottom: 50px;">Create new course</a>

    <?php if ($courseCount > 0): ?>
        <table class="w3-table w3-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Date Created</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($courses as $course): ?>
                <tr>
                    <td><?= $course['name'] ?></td>
                    <td><?= $course['created_at'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>

        <div class="w3-margin-top">
            No course found
        </div>

    <?php endif; ?>
</div>

