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

        if($this->session->flashdata('success'))
        {
            $s_msg = $this->session->flashdata('success');
            $this->session->set_flashdata('success', false);
        } else {
            $s_msg = false;
        }

        if($this->session->flashdata('failure'))
        {
            $f_msg = $this->session->flashdata('failure');
            $this->session->set_flashdata('failure', false);
        } else {
            $f_msg = false;
        }

        $patients['success_message'] = $s_msg;
        $patients['failure_message'] = $f_msg;
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
            if($_FILES['photo']){
                $uploadDir = 'uploads/';
                $fileName = basename($_FILES["photo"]["name"]);
                $targetFilePath = $uploadDir.$fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                $allowTypes = array('jpg','png','jpeg');
                if(in_array($fileType, $allowTypes))
                {      
                    if(! file_exists($targetFilePath))
                    {
                        move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath);
                    }
                    $new_patient['photo'] = $fileName;
                }
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
            $this->session->set_flashdata('failure', 'Novo paciente com CPF: '.$new_patient['cpf'].' registrado');   
            redirect('patients', 'refresh');  
        } else {
            $this->session->set_flashdata('failure', 'Já existe um paciente registrado com esse CPF');
            redirect('patients', 'refresh');
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

    public function edit_patient()
    {    
        $id = $this->uri->segment(2);
        $result['patient'] = $this->patients_model->get_by_id($id);
        basefy('patients/update', $result);
    }

    public function update_patient_action()
    {
        logged_required();
        $patient['name'] = $this->input->post('name');
        $patient['birthday'] = $this->input->post('birthday');
        $patient['cpf'] = $this->input->post('cpf');
        $patient['cep'] = $this->input->post('cep');
        if($_FILES['photo']){
            $uploadDir = 'uploads/';
            $fileName = basename($_FILES["photo"]["name"]);
            $targetFilePath = $uploadDir.$fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            $allowTypes = array('jpg','png','jpeg');
            if(in_array($fileType, $allowTypes))
            {      
                if(! file_exists($targetFilePath))
                {
                    move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath);
                }
                $patient['photo'] = $fileName;
            }
        }else{
            $patient['photo'] = null;
        }  
        $patient['phone_number'] = $this->input->post('phone_number');
        $patient['mother_name'] = $this->input->post('mother_name');
        $patient['father_name'] = $this->input->post('father_name');
        $patient['neighborhood'] = $this->input->post('neighborhood');
        $patient['street'] = $this->input->post('street');
        $patient['city'] = $this->input->post('city');
        $patient['house_number'] = $this->input->post('house_number');
        $patient['state'] = $this->input->post('state');
        $patient['gender'] = $this->input->post('gender');
        $this->patients_model->update($patient);
        redirect('patients', 'refresh');
    }

}