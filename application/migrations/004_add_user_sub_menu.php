<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_user_sub_menu extends CI_Migration
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
      'menu_id' => [
        'type' => 'INT',
        'constraint' => 5,
      ],
      'title' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
      ],
      'url' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
      ],
      'icon' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
      ],
      'is_active' => [
        'type' => 'INT',
        'constraint' => 1,
      ],
    ]);
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('user_sub_menu');
  }

  public function down()
  {
    $this->dbforge->drop_table('user_sub_menu');
  }
}
