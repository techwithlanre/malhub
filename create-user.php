<?php

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $created_at = date("Y-m-d");

    $query = $db->prepare("INSERT INTO users (name, phone, email, password, gender, created_at) VALUES  (?, ?, ? , ?, ?, ?)");
    $result = $query->execute([$name, $phone, $email, $password, $gender, $created_at]);
    if ($result) {
        header('Location: index.php?view=users');
        exit;
    }
}


?>

<div>
    <div class="w3-container w3-teal" style="margin-top: 50px;">
        <h2>Create New User</h2>
    </div>

    <form class="w3-container" method="post" action="<?= $_SERVER['PHP_SELF']. '?view=create-user'; ?>">
        <label class="w3-text-teal"><b>Name</b></label>
        <input class="w3-input w3-border w3-light-grey" name="name" type="text" required>

        <label class="w3-text-teal"><b>Phone</b></label>
        <input class="w3-input w3-border w3-light-grey" name="phone" type="text" required>

        <label class="w3-text-teal"><b>Email</b></label>
        <input class="w3-input w3-border w3-light-grey" name="email" type="text" required>

        <label class="w3-text-teal"><b>Password</b></label>
        <input class="w3-input w3-border w3-light-grey" name="password" type="text" required>

        <label class="w3-text-teal"><b>Gender</b></label>
        <select class="w3-input w3-border w3-light-grey" name="gender" type="text" required>
            <option disabled selected value="">Select gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>

        <button class="w3-btn w3-blue-grey" style="margin-top: 30px;">CREATE USER</button>
    </form>
</div>
