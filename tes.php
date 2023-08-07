<?php
$options = [
    'cost' => 10,
];

echo password_hash("Admin123$", PASSWORD_DEFAULT, $options);

$hashed = '$2y$10$TdAvZDcU95rvKcHb9qDyx.VRjz871Y.dL.qiBIpuhfWqkfK8bIK9e';

if (password_verify('secret password', $hashed)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
