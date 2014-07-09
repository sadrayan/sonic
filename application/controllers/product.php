<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library('tank_auth');
        $this->lang->load('tank_auth');
        $this->load->model('user/application');
    }

    function index () {

//        if (!$this->tank_auth->is_logged_in()) { // not logged in
//            redirect('/auth/login/');
//            return;
//        }
//
//        $data = $this->session->all_userdata();
//
//        if log in, but not admin
//        if ($data['user_type'] != '2'){
//            redirect('/auth/login/');
//        }
//
//        $data =  $this->session->all_userdata();
//
//        $data['application'] = $this->application->get_all_application();

        $this->load->view('public/header');
        $this->load->view('front/product');
        $this->load->view('public/footer');

    }

    public function  order() {


        $this->load->view('public/header');
        $this->load->view('front/order');
        $this->load->view('public/footer');

    }

}