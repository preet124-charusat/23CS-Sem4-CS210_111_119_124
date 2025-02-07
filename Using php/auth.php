<?php
session_start();
header('Content-Type: application/json');

// In a real application, you would connect to a database here
$users = [
    ['id' => 1, 'username' => 'john_doe', 'email' => 'john@example.com', 'password' => password_hash('password123', PASSWORD_DEFAULT)],
    ['id' => 2, 'username' => 'jane_smith', 'email' => 'jane@example.com', 'password' => password_hash('password456', PASSWORD_DEFAULT)],
];

function findUserByEmail($email) {
    global $users;
    foreach ($users as $user) {
        if ($user['email'] === $email) {
            return $user;
        }
    }
    return null;
}

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['action'])) {
    switch ($data['action']) {
        case 'login':
            $email = $data['email'];
            $password = $data['password'];
            $user = findUserByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                echo json_encode(['success' => true, 'message' => 'Login successful']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Invalid email or password']);
            }
            break;

        case 'signup':
            $username = $data['username'];
            $email = $data['email'];
            $password = $data['password'];

            if (findUserByEmail($email)) {
                echo json_encode(['success' => false, 'message' => 'Email already exists']);
            } else {
                // In a real application, you would insert the new user into the database
                $newUser = [
                    'id' => count($users) + 1,
                    'username' => $username,
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_DEFAULT)
                ];
                $users[] = $newUser;

                $_SESSION['user_id'] = $newUser['id'];
                $_SESSION['username'] = $newUser['username'];
                echo json_encode(['success' => true, 'message' => 'Sign up successful']);
            }
            break;

        default:
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
