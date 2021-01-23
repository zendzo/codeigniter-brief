<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function login()
  {
    $this->_islogedin();

    if ($this->form_validation->run() == false) {
      $this->load->view('auth/login');
    } else {
      $this->authenticate();
    }
  }

  private function authenticate()
  {
    $email = $this->input->post('email', true);
    $password = $this->input->post('password', true);

    $user = $this->db->get_where('users', ['email' => $email])->row_array();
    if ($user) {
      if ($user['is_active'] == 1) {
        if (password_verify($password, $user['password'])) {
          $data = [
            'email' => $user['email'],
            'role_id' => $user['role_id']
          ];
          $this->session->set_userdata($data);
          redirect('user');
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password is incorrect!</div>');
          redirect('login');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User is not active!</div>');
        redirect('login');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email not Registered!</div>');
      redirect('login');
    }
  }

  public function register()
  {
    $this->_islogedin();
    
    if ($this->form_validation->run() == false) {
      $this->load->view('auth/register');
    } else {
      $data = [
        'name' => htmlspecialchars($this->input->post('name')),
        'email' => $this->input->post('email'),
        'image' => 'default.jpg',
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'is_active' => 1,
        'role_id' => 2,
        'created_at' => time(),
      ];

      $this->db->insert('users', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You are now registered! Please Login!</div>');
      redirect('login');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You are now loged out!</div>');
    redirect('login');
  }

  private function _islogedin()
  {
    $this->load->library('form_validation');
    if ($this->session->userdata('email')) {
      redirect('user');
    }
  }
}
