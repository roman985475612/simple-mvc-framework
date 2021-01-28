<?php

class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        $data = [
            'name'                 => '',
            'email'                => '',
            'password'             => '',
            'confirm_password'     => '',
            'name_err'             => '',
            'password_err'         => '',
            'email_err'            => '',
            'confirm_password_err' => '',
        ];
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $postData = $_POST['register'];
            
            $data['name']             = trim($postData['name']);
            $data['email']            = trim($postData['email']);
            $data['password']         = trim($postData['password']);
            $data['confirm_password'] = trim($postData['confirm_password']);

            $validation_successful = true;
            if (empty($data['name'])) {
                $validation_successful = false;
                $data['name_err'] = 'Please enter name!';
            } else {
                if ($this->userModel->findByEmail($data['email'])) {
                    $validation_successful = false;
                    $data['name_err'] = 'Email is already taken!';
                }
            }

            if (empty($data['email'])) {
                $validation_successful = false;
                $data['email_err'] = 'Please enter email!';
            }

            if (empty($data['password'])) {
                $validation_successful = false;
                $data['password_err'] = 'Please enter password!';
            } elseif (strlen($data['password']) < 6) {
                $validation_successful = false;
                $data['password_err'] = 'Password must be at least 6 characters!';
            }

            if (empty($data['confirm_password'])) {
                $validation_successful = false;
                $data['confirm_password_err'] = 'Please enter confirm password!';
            } else {
                if ($data['password'] !== $data['confirm_password']) {
                    $validation_successful = false;
                    $data['confirm_password_err'] = 'Password do not match!';
                }
            }

            if ($validation_successful) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if ($this->userModel->register($data)) {
                    flash('success', '<strong>Success!</strong> You are registered and can log in');
                    redirect('users/login');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('users/register', $data);
            }

        } else {
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        $data = [
            'email'        => '',
            'password'     => '',
            'email_err'    => '',
            'password_err' => '',
        ];
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data['email']    = trim($_POST['email']);
            $data['password'] = trim($_POST['password']);

            $validation_successful = true;
            if (empty($data['email'])) {
                $validation_successful = false;
                $data['email_err'] = 'Please enter email!';
            }

            if (empty($data['password'])) {
                $validation_successful = false;
                $data['password_err'] = 'Please enter password!';
            }

            if ($validation_successful) {
                $user = $this->userModel->findByEmail($data['email']);
                if ($user) {
                    $loggedInUser = $this->userModel->login($user, $data['password']);
                    if ($loggedInUser) {
                        $this->createUserSession($user);
                        flash('success', '<strong>Success!</strong> Welcome, ' . $_SESSION['user_name'] . '!');
                        return redirect('pages/index');
                    } else {
                        flash('danger', '<strong>Error!</strong> Password incorrect!');
                    }
                    
                } else {
                    flash('danger', '<strong>Error!</strong> User Not Found!');
                }
            }

            $this->view('users/login', $data);

        } else {
            $this->view('users/login', $data);
        }
    }
    
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);
        
        session_destroy();
        
        redirect('users/login');
    }
    
    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = ucfirst($user->name);
        $_SESSION['user_email'] = $user->email;
    }
}