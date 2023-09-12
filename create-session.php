<?php

if (isset($_POST['name'])) {
    $error = [];
    $name = $_POST['name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    if (strlen($name) < 4) {
        $error[] = 'Session name can not be less than 4 chars.';
    }

    //check if session exists
    $check_query = $db->prepare("SELECT name from sessions WHERE name = ? ");
    $result = $check_query->execute([$name]);
    $sessionCount = $check_query->rowCount();
    if ($sessionCount > 0) {
        $error[] = "This session already exists.";
    }

    $check_query = $db->prepare("SELECT name from sessions WHERE start_date BETWEEN ? AND ? ");
    $result = $check_query->execute([$start_date, $end_date]);
    $sessionCount = $check_query->rowCount();
    if ($sessionCount > 0) {
        $error[] = "This session already exists.";
    }

    if (count($error) == 0) {
        try {
            $insert_query = $db->prepare("INSERT INTO sessions SET name = ?, start_date = ?, end_date = ? ");
            $result = $insert_query->execute([$name, $start_date, $end_date]);
            if ($result) {
                header("Location: index.php?view=sessions");
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
        <h2>Create New Session</h2>
    </div>

    <form class="w3-container" method="post" action="<?= $_SERVER['PHP_SELF']. '?view=create-session'; ?>">
        <label class="w3-text-teal"><b>Name</b></label>
        <input class="w3-input w3-border w3-light-grey" name="name" type="text" required>

        <label class="w3-text-teal"><b>Start Date</b></label>
        <input class="w3-input w3-border w3-light-grey" name="start_date" type="date" required>

        <label class="w3-text-teal"><b>End Date</b></label>
        <input class="w3-input w3-border w3-light-grey" name="end_date" type="date" required>

        <button class="w3-btn w3-blue-grey" style="margin-top: 30px;">CREATE COURSE</button>
    </form>
</div>
