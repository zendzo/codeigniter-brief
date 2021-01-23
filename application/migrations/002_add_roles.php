<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_roles extends CI_Migration
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
      'name' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
      ]
    ]);
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('roles');
  }

  public function down()
  {
    $this->dbforge->drop_table('roles');
  }
}
