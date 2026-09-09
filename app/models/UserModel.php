<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: UserModel
 * 
 * Automatically generated via CLI.
 */
class UserModel extends Model {
    protected $table = 'users';
    protected $primary_key = 'id';
    protected $fillable = ['username', 'password', 'confirm_password', 'role'];
    protected $guarded = ['id'];

    public function __construct()
    {
        parent::__construct();
    }

     // Register User
    public function register($username, $password, $confirm_password) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        
        $data = [
            'username'         => $username,
            'password'         => $hashed_password,
            'confirm_password' => $hashed_password,
            'role'             => 'user'
        ];
        
        return $this->db->table($this->table)->insert($data);
    }

    
    // Login User
    public function login($username, $password) {
        $user = $this->db->table($this->table)->where('username', $username)->get();
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }


}




   

