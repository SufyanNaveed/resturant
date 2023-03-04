<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Tables extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("Aauth");
        if (!$this->aauth->is_loggedin()) {
            redirect('/user/', 'refresh');
        }
        if (!$this->aauth->premission(2)) {
            exit('<h3>Sorry! You have insufficient permissions to access this section</h3>');
        }
    }

    public function index()
    {

        $this->db->select('tables.*, fl.floor_num');
        $this->db->from('tables');
        $this->db->join('floors as fl','fl.id = tables.floor_id','left');
        $data['tables'] = $this->db->get()->result_array();
        // echo '<pre>'; print_r($data); exit;
        $head['title'] = "Tables";
        $head['usernm'] = $this->aauth->get_user()->username;
        $this->load->view('fixed/header', $head);
        $this->load->view('tables/index', $data);
        $this->load->view('fixed/footer');
    }


    public function add()
    {
        $this->db->select('*');
        $this->db->from('floors');
        $data['floors'] = $this->db->get()->result_array();
        
        $head['title'] = "Add Tables";
        $head['usernm'] = $this->aauth->get_user()->username;
        $this->load->view('fixed/header', $head);
        $this->load->view('tables/add', $data);
        $this->load->view('fixed/footer');
    }


    public function addtables()
    {
        
        $floor_id = $this->input->post('floor_id', true);
        $table = $this->input->post('table', true);
        $description = $this->input->post('description', true);
        
        $data = array(
            'floor_id' => $floor_id,
            'table_no' => $table,
            'description' => $description,
            'status' => 1,
            'loc' => $this->aauth->get_user()->loc            
        );
        
        if ($this->db->insert('tables',$data)) {
            $url = "<a href='" . base_url('tables/add') . "' class='btn btn-blue btn-lg'><span class='fa fa-plus-circle' aria-hidden='true'></span>  </a> <a href='" . base_url('tables/index') . "' class='btn btn-grey-blue btn-lg'><span class='fa fa-list-alt' aria-hidden='true'></span>  </a>";
            echo json_encode(array('status' => 'Success', 'message' =>
                $this->lang->line('ADDED') . " $url"));
        } else {
            echo json_encode(array('status' => 'Error', 'message' =>
                $this->lang->line('ERROR')));
        }
    }

    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('tables');
        $this->db->where('id',$id);
        $data['table'] = $this->db->get()->row_array();
        
        $this->db->select('*');
        $this->db->from('floors');
        $data['floors'] = $this->db->get()->result_array();

        $head['title'] = "Edit Tables";
        $head['usernm'] = $this->aauth->get_user()->username;
        $this->load->view('fixed/header', $head);
        $this->load->view('tables/edit', $data);
        $this->load->view('fixed/footer');

    }

    public function edittables()
    {
        
        $table_id = $this->input->post('table_id', true);
        $floor_id = $this->input->post('floor_id', true);
        $table = $this->input->post('table', true);
        $description = $this->input->post('description', true);
        
        $data = array(
            'floor_id' => $floor_id,
            'table_no' => $table,
            'description' => $description  
        );
        $this->db->set($data);
        $this->db->where('id',$table_id);
        if($this->db->update('tables')) {
            $url = "<a href='" . base_url('tables/index') . "' class='btn btn-grey-blue btn-lg'><span class='fa fa-list-alt' aria-hidden='true'></span>  </a>";
            echo json_encode(array('status' => 'Success', 'message' =>
                $this->lang->line('UPDATED') . " $url"));
        } else {
            echo json_encode(array('status' => 'Error', 'message' =>
                $this->lang->line('ERROR')));
        }
    }

    public function delete()
    {
        $id = $this->input->post('deleteid', true);
        if ($id) {
            $this->db->delete('tables', array('id' => $id));
            echo json_encode(array('status' => 'Success', 'message' => $this->lang->line('DELETED')));            
        } else {
            echo json_encode(array('status' => 'Error', 'message' => $this->lang->line('ERROR')));
        } 
    }
}