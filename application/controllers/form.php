<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Form extends CI_Controller
{

    public $form_validation = array(
        array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'required'
        ),
        array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'required'
        )
    );

    function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library('tank_auth');
        $this->lang->load('tank_auth');
        $this->load->model('user/application');
        $this->load->helper('date');
    }

    function index()
    {
        echo 'hello';
    }

    /**
     * @param $appId
     */
    public function app($appId)
    {
        if (!$this->tank_auth->is_logged_in()) { // logged in
            redirect('/auth/login/');
            return;
        }


        $data = $this->session->all_userdata();

        //$user_id = $data['user_id'];
        $data['application'] = $this->application->get_application($appId);

        $this->load->view('public/header');
        $this->load->view('user_application/form', $data);
        $this->load->view('public/footer');

    }

    public function add()
    {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
            return;
        }

       // $this->pdf();

        // $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $data = $this->session->all_userdata();

        $user_id = $data['user_id'];


        $form_validation = array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required'
            ),
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($form_validation);
        $post = $this->input->post();
        $post['form'] ='add';

        $submit = $this->input->post('submit');
        if (empty($submit)) {
            $this->load->view('public/header');
            $this->load->view('user_application/add', $post);
            $this->load->view('public/footer');
            return;
        }

        if ($submit == 'complete') {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('public/header');
                $this->load->view('user_application/add', $post);
                $this->load->view('public/footer');

            } else {

                $this->_inset_Application($user_id, 'complete');
            }
        } elseif ($submit == 'incomplete') {

            $this->_inset_Application($user_id, 'complete');
        }


    }


    function update($app_id)
    {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
            return;
        }

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $data = $this->session->all_userdata();


        $user_id = $data['user_id'];
        $data['application'] = $this->application->get_application($app_id);

        $post = $this->input->post();

        $application = json_decode(json_encode($data['application']), true);
        $application[0]['form'] = 'update';

        $form_validation = array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required'
            ),
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($form_validation);

        $submit = $this->input->post('submit');
        if (empty($submit)) {
            $this->load->view('public/header');
            $this->load->view('user_application/add', $application[0]);
            $this->load->view('public/footer');
            return;
        }

        if ($submit == 'complete') {
            if ($this->form_validation->run() == FALSE) {

                $post['form'] ='update';
                $post['id'] = $application[0]['id'];
                $this->load->view('public/header');
                $this->load->view('user_application/add', $post);
                $this->load->view('public/footer');
            } else {
                $this->_update_application($user_id, $app_id, $submit);
            }
        }elseif ($submit == 'incomplete') {
            $this->_update_application($user_id, $app_id, $submit);
        }

    }

    function delete($app_id)
    {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
            return;
        }

        $data = $this->session->all_userdata();


        $this->application->delete_application($data['user_id'], $app_id);

        $data['app_delete'] = 'success';

        $this->load->view('public/header');
        $this->load->view('user_profile/user_profile', $data);
        $this->load->view('public/footer');

    }

    /**
     * @param $user_id
     */
    public function _inset_Application($user_id, $status)
    {
        $application = array();
        $application['title'] = $this->input->post('title');
        $application['description'] = $this->input->post('description');
        $application['user_id'] = $user_id;
        $application['status'] = $status;
        $application['start_date'] = unix_to_human(time(), TRUE, 'us');
        $application['complete_date'] = unix_to_human(time(), TRUE, 'us');

        $this->application->insert_application($application);

        // process
        $this->load->view('public/header');
        $this->load->view('user_application/confirm', $application);
        $this->load->view('public/footer');
    }

    /**
     * @param $user_id
     */
    public function _update_application($user_id, $app_id, $status)
    {
        $application = array();
        $application['id'] = $app_id;
        $application['title'] = $this->input->post('title');
        $application['description'] = $this->input->post('description');
        $application['user_id'] = $user_id;
        $application['status'] = $status;
        $application['start_date'] = unix_to_human(time(), TRUE, 'us');
        $application['complete_date'] = unix_to_human(time(), TRUE, 'us');

        $this->application->update_application($application);

        // process
        $this->load->view('public/header');
        $this->load->view('user_application/confirm', $application);
        $this->load->view('public/footer');
    }

    function pdf()
    {
        $this->load->helper(array('dompdf', 'file'));
        $data['title'] = 'Title sample';
        $data['description'] = 'Description sample';
        // page info here, db calls, etc.
        $html = $this->load->view('user_application/formpdf', $data, true);
        pdf_create($html, '/opt/pdf/sampe.pdf');

//        $data = pdf_create($html, '', false);
//        write_file('name', $data);
        //if you want to write it to disk and/or send it as an attachment
    }

}