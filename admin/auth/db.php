<?php

$login = function () use ($conn) {

    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');



    if (is_null($email) or is_null($password)) {
        return false;
    }

    $sql = "SELECT * FROM users WHERE email= '$email'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    $password = password_hash($password, PASSWORD_DEFAULT);

    if(!password_verify($user['password'], $password)) {
      return false;
    }
    unset($user['password']);
    $_SESSION['auth'] = $user;

    return true;

};