<?php
$subject = 'EMAIL TEST';
echo '============' . "\n";
echo $subject . "\n";
echo '============' . "\n";
$firstName = 'Illia';
$secondName = 'Smyrnov';
$message = "First Name: {$firstName}\nSecond Name: {$secondName}\n";
echo $message;
$headers = 'From: rav i.d.smyrnov@student.khai.edu';
mail('i.d.smyrnov@student.khai.edu', $subject, $message, $headers);
?>