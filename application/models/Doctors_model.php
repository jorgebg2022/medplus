<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function store(array $data): void
    {
        $this->db->insert('doctors', $data);
    }

    public function get_by_cpf(string $cpf): array | bool
    {
        $this->db->where('cpf', $cpf);

        $doctor = $this->db->get('doctors')->row_array();

        if($doctor)
        {
            return $doctor;

        } else 
        {
            return false;
        }
    }

    public function get_by_field(string $field, string $value): array | bool 
    {
        $this->db->where($field, $value);
        if($field !== 'name'){
            $doctor = $this->db->get('doctors')->row_array();
            if($doctor['photo'])
            {
                $doctor['photo'] = true;
            } else {
                $doctor['photo'] = false;
            }
        } else {
            $doctor = $this->db->get('doctors')->result();
        }    
        if($doctor){
            return $doctor;
        } else {
            return false;
        }
    }

    public function update(string $data): string
    {
        return 'save user method';
    }
}