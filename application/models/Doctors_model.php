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

    public function get_by_cpf(string $cpf): array | null
    {
        $this->db->where('cpf', $cpf);
        $doctor = $this->db->get('doctors')->row_array();
        return $doctor;
    }

    public function get_by_field(string $field, string $value): array 
    {
        $this->db->where($field, $value);
        if($field !== 'name'){
            $doctor = $this->db->get('doctors')->row_array();
        } else {
            $doctor = $this->db->get('doctors')->result();
        }    
        unset($doctor['password']);
        return $doctor;
    }

    public function update(array $data): void
    {
        $this->db->where('cpf', $data['cpf']);
        $this->db->update('doctors', $data);
    }

    public function delete(int $id): void
    {
        $this->db->where('id', $id);
        $this->db->delete('doctors');     
    }
}