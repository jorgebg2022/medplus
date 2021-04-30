<?php 

function logged_required()
{
    $ci = get_instance();
    $logged = $ci->session->userdata('user_id');
    if(! $logged)
    {
        $ci->session->set_flashdata('danger', 'Você não pode acessar essa página, pois não está logado');
        redirect('/', 'location');
    }
    return $logged;
}