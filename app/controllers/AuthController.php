<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: AuthController
 * 
 * Automatically generated via CLI.
 */
class AuthController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->model('UserModel');
        $this->call->library('session');
    }

    //LOGIN
      public function login() {
        if ($this->session->userdata('logged_in')) {
            redirect('products');
        }

        if ($this->form_validation->submitted()) {
            $username = $this->io->post('username');
            $password = $this->io->post('password');

            $user = $this->UserModel->login($username, $password);
            if ($user) {
                $this->session->set_userdata([
                    'user_id'   => $user['id'],
                    'username'  => $user['username'],
                    'logged_in' => TRUE
                ]);
                redirect('products');
            } else {
                $data['error'] = 'Incorrect Username or Password!';
                $this->call->view('auth/login', $data);
                return;
            }
        }
        $this->call->view('auth/login');
    }


    //REGISTER
    public function register() {
        if ($this->form_validation->submitted()) {
            $username = isset($_POST['username']) ? $_POST ['username'] : '';
            $password = isset($_POST['password']) ? $_POST ['password'] : '';
            $confirm_password = isset($_POST['confirm_password']) ? $_POST ['confirm_password'] : '';

            if ($password !== $confirm_password) {
                $data['error'] = 'Password Does Not Match!';
                $this->call->view('auth/register', $data);

                return;
            }

            if ($this->UserModel->register($username, $password, $confirm_password)) {
                redirect('auth/login');
            }
        }
        $this->call->view('auth/register');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}




  

