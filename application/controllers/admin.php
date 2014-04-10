<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library('tank_auth');
        $this->lang->load('tank_auth');
        $this->load->model('user/application');
    }

    function index () {
        if (!$this->tank_auth->is_logged_in()) { // logged in
            redirect('/auth/login/');
            return;
        }
        $data =  $this->session->all_userdata();

        $data['application'] = $this->application->get_all_application();

        $this->load->view('public/header');
        $this->load->view('admin_panel/panel', $data);
        $this->load->view('public/footer');

    }

    function app_view($app_id){
        if (!$this->tank_auth->is_logged_in()) { // logged in
            redirect('/auth/login/');
            return;
        }

        $data['application'] = $this->application->get_application($app_id);

        $this->load->view('public/header');
        $this->load->view('admin_panel/form', $data);
        $this->load->view('public/footer');

    }

}