<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends CI_Controller {

    function __construct()
    {
        header('Access-Control-Allow-Origin:*');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
        $this->load->model('doctors_model');
    }

    public function index()
    {
        $this->load->view('doctors/login');     
    }

    public function register($info=null)
    {
        $this->load->view('doctors/register');        
    }

    public function auth_login()
    {
        $cpf = $this->input->post('cpf');
        $password = $this->input->post('password');
        $doctor = $this->doctors_model->get_by_cpf($cpf);
        if($doctor)
        {
            if(password_verify($password, $doctor['password']))
            {
                $this->session->set_userdata('user_id', $doctor['id']);
                redirect('/main', 'location');
            }else{
                redirect('/', 'location');
            }
        }else{
            redirect('/', 'location');
        }
    }

    public function auth_logout()
    {
        logged_required();
        $this->session->unset_userdata('user_id');
        redirect('/', 'location');
    }

    public function update_profile()
    {
        $logged_id = logged_required();
        $doctor['doctor'] = $this->doctors_model->get_by_field('id', $logged_id);
        basefy('doctors/update', $doctor);
    }

    public function auth_register()
    {
        $name = $this->input->post('name');
        $cpf = $this->input->post('cpf');
        $password = $this->input->post('password');
        $re_password = $this->input->post('re-password');
        if($password === $re_password)
        {
            if($this->doctors_model->get_by_cpf($cpf))
            {
                redirect('/register', 'location');
                
            } else {
                $doctor['name'] = $name;
                $doctor['cpf'] = $cpf;
                $doctor['password'] = password_hash($password, PASSWORD_DEFAULT);
                $this->doctors_model->store($doctor);
                redirect('/', 'location');
            }
        } else {
            redirect('/register', 'location');
        }
    }

    public function update_doctor_action()
    {
        logged_required();
        $doctor['name'] = $this->input->post('name');
        $doctor['cpf'] = $this->input->post('cpf');
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
                $doctor['photo'] = $fileName;
            }
        }else{
            $doctor['photo'] = null;
        } 
        $this->doctors_model->update($doctor);
        redirect('main', 'refresh');
    }

    public function delete_doctor()
    {
        $logged_id = logged_required();
        $this->doctors_model->delete($logged_id);
        redirect('/', 'refresh');
    }

}