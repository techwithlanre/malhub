<?php

/*
 *
 * Author: Olanrewaju Jamiu
 *
 * */
$students_query = $db->prepare('SELECT * FROM students');
$result = $students_query->execute();
$studentCount = $students_query->rowCount();
$studentList = $students_query->fetchAll();


function get_course_name ($id) {
    global $db;
    $course_query = $db->prepare('SELECT * FROM courses WHERE id = ? ');
    $result = $course_query->execute([$id]);
    $course = $course_query->fetch();
    return $course['name'];
}

function get_session_name($id) {
    global $db;
    $sessions_query = $db->prepare('SELECT * FROM sessions WHERE id = ? ');
    $result = $sessions_query->execute([$id]);
    $session = $sessions_query->fetch();
    return $session['name'];

}

?>

<div>
    <h2>Students List</h2>
    <p>This table displays a list of students</p>

    <a href="index.php?view=create-student" style="margin-bottom: 50px;">Create new student</a>

    <?php if ($studentCount > 0): ?>
        <table class="w3-table w3-striped">
            <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Session</th>
                <th>Course</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($studentList as $student): ?>
                <tr>
                    <td><?= $student['first_name'] ?></td>
                    <td><?= $student['last_name'] ?></td>
                    <td><?= $student['phone'] ?></td>
                    <td><?= $student['email'] ?></td>
                    <td><?= $student['gender'] ?></td>
                    <td><?= $student['address'] ?></td>
                    <td><?= get_session_name($student['session_id']) ?></td>
                    <td><?= get_course_name($student['course_id']) ?></td>
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

