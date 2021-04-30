<?php

function basefy(string $view=null, array $data=null): void
{
    $ci = get_instance();
    $ci->load->view('main_init');
    if($view){
        $ci->load->view($view, $data);
    }
    $ci->load->view('main_end');
}