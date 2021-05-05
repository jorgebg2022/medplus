<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        logged_required();
        basefy('main/main_middle');
    }
}