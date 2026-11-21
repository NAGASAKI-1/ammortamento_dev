<?php
declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method Not Allowed');
}

$name  = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');

$errors = [];
if ($name === '') {
    $errors[] = 'Name is required.';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address.';
}

function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Form Result</title>
</head>
<body>
  <?php if (!empty($errors)): ?>
    <h2>Please fix the following:</h2>
    <ul>
      <?php foreach ($errors as $error): ?>
        <li><?= e($error) ?></li>
      <?php endforeach; ?>
    </ul>
    <a href="form.html">Back to form</a>
  <?php else: ?>
    <h1>Thanks, <?= e($name) ?>!</h1>
    <p>We recorded <strong><?= e($email) ?></strong>.</p>
  <?php endif; ?>
</body>
</html>