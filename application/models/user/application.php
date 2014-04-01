<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Application
 */
class Application extends CI_Model
{
    private $table_name = 'application'; // user application

    var $user_id;
    var $status;
    var $start_date;
    var $complete_date;
    var $title;
    var $description;

    function __construct()
    {
        parent::__construct();

        $ci =& get_instance();
        $this->table_name = $ci->config->item('db_table_prefix', 'tank_auth') . $this->table_name;
    }

    /**
     * @param $user_id
     * @return null
     */
    function get_user_application($user_id)
    {
        $this->db->where('user_id', $user_id);

        $query = $this->db->get($this->table_name);

        return $query->result();
    }

    /**
     * @param $app_id
     * @return mixed
     */
    function get_application($app_id)
    {
        $this->db->where('id', $app_id);

        $query = $this->db->get($this->table_name);

        return $query->result();
    }



    /**
     * @param $application
     * @return mixed
     */
    function insert_application($application)
    {
        $this->title = $application['title'];
        $this->description = $application['description'];
        $this->user_id = $application['user_id'];
        $this->status = $application['status'];
        $this->start_date = $application['start_date'];
        if (isset($application['complete_date'])) {
            $this->complete_date = $application['complete_date'];
        }

        $this->db->insert($this->table_name, $this);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    /**
     * @param $application
     */
    function update_application($application){

        $this->title = $application['title'];
        $this->description = $application['description'];
        $this->user_id = $application['user_id'];
        $this->status = $application['status'];
        $this->start_date = $application['start_date'];
        if (isset($application['complete_date'])) {
            $this->complete_date = $application['complete_date'];
        }

        $this->db->where('id', $application['id']);
        $this->db->update($this->table_name, $this);


    }


    function delete_application($user_id, $app_id){
        $where = array('id' => $app_id,
                       'user_id' => $user_id
                      );
        $this->db->delete($this->table_name, $where);


    }


}