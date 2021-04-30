<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Migration_Create_patients_table extends CI_Migration { 
 
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
                                'null' => FALSE,
                                'unique' => TRUE
                        ),
                        'photo' => array(
                                'type' => 'BLOB',
                                'null' => TRUE
                        ),
                        'birthday' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                        'phone_number' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '13',
                            'null' => FALSE
                        ),
                        'cep' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '9',
                            'null' => FALSE
                        ),
                        'gender' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '6',
                            'null' => FALSE
                        ), 
                        'city' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '128',
                            'null' => FALSE
                        ), 
                        'neighborhood' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '128',
                            'null' => FALSE
                        ),  
                        'street' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '128',
                            'null' => FALSE
                        ),   
                        'state' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '128',
                            'null' => FALSE
                        ), 
                        'house_number' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'null' => FALSE
                        ),
                        'mother_name' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '128',
                            'null' => TRUE
                        ),
                        'father_name' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '128',
                            'null' => TRUE
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('patients', TRUE);
        }

        public function down()
        {
                $this->dbforge->drop_table('patients');
        }
}