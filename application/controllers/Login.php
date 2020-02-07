<?php
class Login extends CI_Controller
{
    function login_check()
    {
        $this->load->view("header");
        $this->load->view("login");
    }

    // validate user login by role
    function auth()
    {
        $email    = $this->input->post('email');
        $password = $this->input->post('password');

        if (isset($email) && isset($password)) {
            $validate = $this->MainModel->selectAllFromWhere('users', array('email_id' => $email, 'password' => $password));
            if (!empty($validate)) {
                $data  = $validate;
                $id    = $data[0]['id'];
                $name  = $data[0]['f_name'] . " " . $data[0]['l_name'];
                $email = $data[0]['email_id'];
                $user_role = $data[0]['user_role'];
                $sesdata = array(
                    'id'       =>  $id,
                    'username'  => $name,
                    'email'     => $email,
                    'user_role'     => $user_role,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata("userInfo", $sesdata);
                //print_r($level);
                // access login for admin
                if ($user_role == "1") {
                    redirect('admin');
                }
                elseif ($user_role == "0") {
                    redirect('Home/common_users');
                }
            } else {
                echo $this->session->set_flashdata('msg', "Username or Password is Incorrect");
                redirect('Loginauth/index');
            }
        } else {
            redirect('Loginauth/index');
        }
    }
    
    function logout()
    {
        $this->session->sess_destroy();
        redirect('Loginauth/index');
    }
}
