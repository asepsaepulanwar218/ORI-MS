<?php
$options = [
    'cost' => 10,
];

echo password_hash("secret password", PASSWORD_DEFAULT, $options);

$hashed = '$2y$10$RjqE27QBmS0TsPgq65gOf.UlAgmp7zwqektkT/I1KOpXO2AzYmnYu';

if (password_verify('$2y$10$kKw1o4zHjM3vLA5eVbx8GOhYpwCX43aCL4KSjBEFrOtPEm7N03yHW', $hashed)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}

// $date = new DateTimeImmutable();
// echo (date('Y-m-d h:i:sa'));
echo (time());
