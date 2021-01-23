<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (! $this->session->userdata('email')) {
      redirect('login');
    }
  }
  public function index()
  {
    $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('user/index', $data);
  }
}
