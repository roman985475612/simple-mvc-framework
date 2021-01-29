<?php

class User
{
    private  $db;

    public function __construct()
    {
        $this->db = new Db;
    }

    public function register($data)
    {
        $sql = QueryBuilder::insert('users', ['name', 'email', 'password']);
        $this->db->query($sql);
        $this->db->bind(':name'    , $data['name']);
        $this->db->bind(':email'   , $data['email']);
        $this->db->bind(':password', $data['password']);

        return $this->db->execute();
    }

    public function findByEmail($email)
    {
        $sql = QueryBuilder::select(['*'])
                           ->from('users')
                           ->where('email', ':email')
                           ->getQuery();

        $this->db->query($sql);
        $this->db->bind(':email', $email);

        return $this->db->single();
    }
    
    public function login($user, $password)
    {
        return password_verify($password, $user->password);
    }
}