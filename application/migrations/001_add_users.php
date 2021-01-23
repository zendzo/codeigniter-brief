<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_users extends CI_Migration
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
      ],
      'image' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
      ],
      'email' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
      ],
      'password' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
      ],
      'is_active' => [
        'type' => 'INT',
        'constraint' => '2',
      ],
      'role_id' => [
        'type' => 'INT',
        'constraint' => '2',
      ],
      'created_at' => [
        'type' => 'INT',
        'constraint' => '11',
      ],
    ]);
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('users');
  }

  public function down()
  {
    $this->dbforge->drop_table('users');
  }
}
