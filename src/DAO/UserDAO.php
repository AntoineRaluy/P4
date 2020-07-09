<?php

namespace App\src\DAO;

class UserDAO extends DAO
{
    public function login($session)
    {
        $sql = 'SELECT id, password FROM user WHERE username = ?';
        $data = $this->createQuery($sql, $_SESSION['username']);
        $result = $data->fetch();
        $passwordOk = password_verify($_SESSION['password'], $result['password']);
        return [
            'result' => $result,
            'passwordOk' => $passwordOk
        ];
    }

    public function updatePassword($post, $username)
    {
        $sql = 'UPDATE user SET password = ? WHERE username = ?';
        $this->createQuery($sql, [
            password_hash($_POST['password'], PASSWORD_ARGON2ID, [
                'memory_cost' => 1024,
                'time_cost' => 2,
                'threads' => 2]),
            $username]);
    }
}