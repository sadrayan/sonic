<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_Profile extends CI_Controller {

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
    }

    function profile (){

        if (!$this->tank_auth->is_logged_in()) { // logged in
            redirect('/auth/login/');
            return;
        }

        $data =  $this->session->all_userdata();

        $user_id = $data['user_id'];
        $data['application'] = $this->application->get_user_application($user_id);

        $this->load->view('public/header');
        $this->load->view('user_profile/user_profile', $data);
        $this->load->view('public/footer');
    }

}