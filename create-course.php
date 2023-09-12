<?php

if (isset($_POST['name'])) {
    $error = [];
    $name = $_POST['name'];

    if (strlen($name) < 4) {
        $error[] = 'Course name can not be less than 4 chars.';
    }

    //check if course exists
    $check_query = $db->prepare("SELECT name from courses WHERE name = ? ");
    $result = $check_query->execute([$name]);
    $courseCount = $check_query->rowCount();
    if ($courseCount > 0) {
        $error[] = "This course already exists.";
    }

    if (count($error) == 0) {
        try {
            $created_at = date('Y-m-d H:i:s');
            $insert_query = $db->prepare("INSERT INTO courses SET name = ?, created_at = ? ");
            $result = $insert_query->execute([$name, $created_at]);
            if ($result) {
                header("Location: index.php?view=courses");
                exit;
            }
        } catch (Throwable $e) {
            dd($e->getMessage());
        }



    }


}


?>


<div>
    <div class="w3-container w3-teal" style="margin-top: 50px;">
        <h2>Create New Course</h2>
    </div>

    <form class="w3-container" method="post" action="<?= $_SERVER['PHP_SELF']. '?view=create-course'; ?>">
        <label class="w3-text-teal"><b>Name</b></label>
        <input class="w3-input w3-border w3-light-grey" name="name" type="text" required>
        <button class="w3-btn w3-blue-grey" style="margin-top: 30px;">CREATE COURSE</button>
    </form>
</div>
