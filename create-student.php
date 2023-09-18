<?php

$courses_query = $db->prepare('SELECT * FROM courses');
$result = $courses_query->execute();
$courses_list = $courses_query->fetchAll();

$sessions_query = $db->prepare('SELECT * FROM sessions');
$result = $sessions_query->execute();
$sessions_list = $sessions_query->fetchAll();

if (isset($_POST['first_name'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $course_id = $_POST['course_id'];
    $session_id = $_POST['session_id'];
    $reg_date = date('Y-m-d');


    $insert_query = $db->prepare('INSERT INTO students SET first_name = ?, last_name = ?, email = ?, 
                         phone = ?, gender = ?, address = ?, course_id = ?, session_id = ?, reg_date = ?');
    $result = $insert_query->execute([$first_name, $last_name,$email, $phone, $gender, $address, $course_id, $session_id, $reg_date]);

}

?>


<div>
    <div class="w3-container w3-teal" style="margin-top: 50px;">
        <h2>Create New Student</h2>
    </div>

    <form class="w3-container" method="post" action="<?= $_SERVER['PHP_SELF']. '?view=create-student'; ?>">
        <label class="w3-text-teal"><b>Name</b></label>
        <input class="w3-input w3-border w3-light-grey" name="first_name" type="text" required>

        <label class="w3-text-teal"><b>Name</b></label>
        <input class="w3-input w3-border w3-light-grey" name="last_name" type="text" required>

        <label class="w3-text-teal"><b>Phone</b></label>
        <input class="w3-input w3-border w3-light-grey" name="phone" type="text" required>

        <label class="w3-text-teal"><b>Email</b></label>
        <input class="w3-input w3-border w3-light-grey" name="email" type="text" required>

        <label class="w3-text-teal"><b>Address</b></label>
        <input class="w3-input w3-border w3-light-grey" name="address" type="text" required>

        <label class="w3-text-teal"><b>Gender</b></label>
        <select class="w3-input w3-border w3-light-grey" name="gender" type="text" required>
            <option disabled selected value="">Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>

        <select class="w3-input w3-border w3-light-grey" name="course_id" type="text" required>
            <option disabled selected value="">Select Course</option>
            <?php foreach ($courses_list as $course): ?>
                <option value="<?= $course['id'] ?>"><?= $course['name'] ?></option>
            <?php endforeach; ?>
        </select>

        <select class="w3-input w3-border w3-light-grey" name="session_id" type="text" required>
            <option disabled selected value="">Select Session</option>
            <?php  foreach ($sessions_list as $session) { ?>
                <option value="<?= $session['id'] ?>"><?= $session['name'] ?></option>
            <?php } ?>
        </select>

        <button class="w3-btn w3-blue-grey" style="margin-top: 30px;">CREATE USER</button>
    </form>
</div>

