<?php
$result = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $value = $_POST['value'] ?? '';
    $type = $_POST['type'] ?? '';

    if ($value === '' || $type === '') {
        $result = "Invalid Input";
    } else {
        if ($type === 'c2f') {
            $result = ($value * 9/5) + 32 . " °F";
        } elseif ($type === 'f2c') {
            $result = ($value - 32) * 5/9 . " °C";
        } else {
            $result = "Invalid conversion type";
        }
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
    <h3>Temperature Converter</h3>
    <form method="post">
        <input type="number" name="value">
        <input type="radio" name="type" value="c2f" checked> Celcius to Fahrenheit
        <input type="radio" name="type" value="f2c"> Fahrenheit to Celsius
        <button type="submit">Convert</button>
    </form>
    <?php if ($result !== ''): ?>
        <p><strong>Result : </strong><?= htmlspecialchars($result) ?></p>
    <?php endif; ?>
</body>
</html>