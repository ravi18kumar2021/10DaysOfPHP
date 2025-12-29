<?php
$result = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $roll = trim($_POST['roll'] ?? '');
    $gender = $_POST['gender'] ?? '';
    $email = trim($_POST['email'] ?? '');
    $course = $_POST['course'] ?? '';

    if ($name === '' || $roll === '' || $gender === '' || $email === '' || $course === '') {
        $result = "Fill out all the inputs";
    } elseif (strlen($name) < 3) {
        $result = "Name must contain at least 3 characters";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = "Invalid email";
    } else {
        $result = "Form submitted successfully";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Student Information</h3>
    <form method="post">
        <input type="text" name="name" placeholder="Enter student name"><br><br>
        <input type="text" name="roll" placeholder="Enter Roll no."><br><br>
        <input type="radio" name="gender" value="male" checked> Male
        <input type="radio" name="gender" value="female"> Female
        <input type="radio" name="gender" value="others"> Others<br><br>
        <input type="email" name="email" placeholder="Enter email-id"><br><br>
        <select name="course">
            <option selected>Select Enrolled course</option>
            <option value="frontend">Frontend</option>
            <option value="backend">Backend</option>
            <option value="ai-ml">AI/ML</option>
            <option value="cyber">Cyber Security</option>
        </select><br><br>
        <input type="submit">
    </form>
    <?php if($result !== ''): ?>
        <p><?= htmlspecialchars($result) ?></p>
    <?php endif; ?>
</body>
</html>