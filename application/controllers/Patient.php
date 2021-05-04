<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('patients_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function get_patients_view()
    {
        logged_required();
        $patients['patients_list'] = $this->patients_model->get_all_patients();
        basefy('patients/list', $patients);
    }

    public function register_patient_form()
    {
        logged_required();
        basefy('patients/add');
    }

    public function register_patient_action()
    {
        logged_required();
        $patient = $this->patients_model->get_by_field('cpf', $this->input->post('cpf'));
        if(! $patient){
            $new_patient['name'] = $this->input->post('name');
            $new_patient['birthday'] = $this->input->post('birthday');
            $new_patient['cpf'] = $this->input->post('cpf');
            $new_patient['cep'] = $this->input->post('cep');
            if($_FILES['photo']['tmp_name']){
                $new_patient['photo'] = file_get_contents($_FILES['photo']['tmp_name']);
            }else{
                $new_patient['photo'] = null;
            }
            $new_patient['phone_number'] = $this->input->post('phone_number');
            $new_patient['mother_name'] = $this->input->post('mother_name');
            $new_patient['father_name'] = $this->input->post('father_name');
            $new_patient['neighborhood'] = $this->input->post('neighborhood');
            $new_patient['street'] = $this->input->post('street');
            $new_patient['city'] = $this->input->post('city');
            $new_patient['house_number'] = $this->input->post('house_number');
            $new_patient['state'] = $this->input->post('state');
            $new_patient['gender'] = $this->input->post('gender');
            $this->patients_model->store($new_patient);    
            redirect('patients', 'refresh');  
        } else {
            redirect($_SERVER['HTTP_REFERER']);
        }    
    }

    public function get_patient()
    {
        logged_required();
        $id = $this->input->post('id');
        $patient = $this->patients_model->get_by_id($id);
        echo json_encode($patient);
    }

    public function delete_patient()
    {
        logged_required();
        $id = $this->input->post('id');
        $response = $this->patients_model->delete_by_id($id);
        echo json_encode($response);     
    }

    public function get_photo()
    {
        logged_required();
        $id = $this->input->post('id');
        $response = $this->patients_model->get_photo_by_id($id);
        echo json_encode($response);  
    }
}