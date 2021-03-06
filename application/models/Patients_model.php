<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patients_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function store(array $data): void
    {
        $this->db->insert('patients', $data);
    }

    public function get_all_patients(): array | null
    {
        $this->db->select('id, name, cpf');
        $patients = $this->db->get('patients')->result();
        return $patients;
    }

    public function get_by_field(string $field, string $value): array | bool 
    {
        $this->db->where($field, $value);
        if($field !== 'name'){
            $patient = $this->db->get('patients')->row_array();
        } else {
            $patient = $this->db->get('patients')->result();
        }    
        if($patient){
            return $patient;
        } else {
            return false;
        }
    }

    public function get_by_id(int $id): array
    {
        $this->db->where('id', $id);
        $patient = $this->db->get('patients')->row_array();
        return $patient;
    }

    public function update(array $data): void
    {
        $this->db->where('cpf', $data['cpf']);
        $this->db->update('patients', $data);
    }



    public function delete_by_id(int $id): array
    {
        $this->db->where('id', $id);
        if($this->db->delete('patients'))
        {
            return array('status'=>'ok');
        }
        else
        {
            return array('status'=>'fail');
        }
    }

}