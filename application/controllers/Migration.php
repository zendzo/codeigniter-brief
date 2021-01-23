<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration extends CI_Controller
{
  public function up()
  {
    $this->load->library('migration');
    if ($this->migration->current() === FALSE) {
      show_error($this->migration->error_string());
    }else{
      echo "Migrate Successfully! \n";
    }
  }

  public function down()
  {
    $this->load->library('migration');
    echo "Latest Config Migrations Version : " . $this->migration->latest() . "\n";
    echo "Down to Version : " . ($this->migration->latest() - 1) . "\n";
    if ($this->migration->latest() !== 0) {
      $this->migration->version($this->migration->latest() - 1);
    }
  }
}
