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
                redirect('main', 'location');
            }else{
                echo 'senha errada';
            }
        }else{
            echo 'nenhum doutor com esse cpf';
        }
    }

    public function auth_logout()
    {
        logged_required();
        $this->session->unset_userdata('user_id');
        redirect('/', 'location');
    }

    public function get_profile()
    {
        $logged_id = logged_required();
        $doctor['doctor'] = $this->doctors_model->get_by_field('id', $logged_id);
        basefy('doctors/profile', $doctor);
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

}