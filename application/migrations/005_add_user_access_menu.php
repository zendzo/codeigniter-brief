<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_user_access_menu extends CI_Migration
{
  public function up()
  {
    $this->dbforge->add_field([
      'id' => [
        'type' => 'INT',
        'constraint' => 5,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ],
      'role_id' => [
        'type' => 'INT',
        'role_id' => '11',
      ],
      'menu_id' => [
        'type' => 'INT',
        'role_id' => '11',
      ]
    ]);
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('user_access_menu');
  }

  public function down()
  {
    $this->dbforge->drop_table('user_access_menu');
  }
}
