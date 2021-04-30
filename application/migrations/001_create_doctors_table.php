<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Migration_Create_doctors_table extends CI_Migration { 
 
        public function up() 
        { 
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '128',
                                'null' => FALSE
                        ),
                        'cpf' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '14',
                                'null' => FALSE
                        ),
                        'photo' => array(
                                'type' => 'BLOB',
                                'null' => TRUE
                        ),
                        'password' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '256',
                                'null' => FALSE
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('doctors', TRUE);
        }

        public function down()
        {
                $this->dbforge->drop_table('doctors');
        }
}