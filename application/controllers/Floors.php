<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Floors extends CI_Controller
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

        $this->db->select('*');
        $this->db->from('floors');
        $data['floors'] = $this->db->get()->result_array();
        // echo '<pre>'; print_r($data); exit;
        $head['title'] = "Floors";
        $head['usernm'] = $this->aauth->get_user()->username;
        $this->load->view('fixed/header', $head);
        $this->load->view('floors/index', $data);
        $this->load->view('fixed/footer');
    }


    public function add()
    {
        $this->db->select('*');
        $this->db->from('kitchen');
        $data['kitchen'] = $this->db->get()->result_array();
        
        $head['title'] = "Add Floors";
        $head['usernm'] = $this->aauth->get_user()->username;
        $this->load->view('fixed/header', $head);
        $this->load->view('floors/add', $data);
        $this->load->view('fixed/footer');
    }


    public function addfloor()
    {
        
        $floor_num = $this->input->post('floor_name', true);
        $description = $this->input->post('description', true);
        
        $data = array(
            'floor_num' => $floor_num,
            'description' => $description,
            'status' => 1,
            'loc' => $this->aauth->get_user()->loc            
        );
        
        if ($this->db->insert('floors',$data)) {
            $url = "<a href='" . base_url('floors/add') . "' class='btn btn-blue btn-lg'><span class='fa fa-plus-circle' aria-hidden='true'></span>  </a> <a href='" . base_url('floors/index') . "' class='btn btn-grey-blue btn-lg'><span class='fa fa-list-alt' aria-hidden='true'></span>  </a>";
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
        $this->db->from('floors');
        $this->db->where('id',$id);
        $data['floor'] = $this->db->get()->row_array();

        $head['title'] = "Edit Floors";
        $head['usernm'] = $this->aauth->get_user()->username;
        $this->load->view('fixed/header', $head);
        $this->load->view('floors/edit', $data);
        $this->load->view('fixed/footer');

    }

    public function editfloors()
    {
        
        $floor_id = $this->input->post('floor_id', true);
        $floor_num = $this->input->post('floor_num', true);
        $description = $this->input->post('description', true);
        
        $data = array(
            'floor_num' => $floor_num,
            'description' => $description  
        );
        $this->db->set($data);
        $this->db->where('id',$floor_id);
        if($this->db->update('floors')) {
            $url = "<a href='" . base_url('floors/index') . "' class='btn btn-grey-blue btn-lg'><span class='fa fa-list-alt' aria-hidden='true'></span>  </a>";
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
            $this->db->delete('floors', array('id' => $id));
            echo json_encode(array('status' => 'Success', 'message' => $this->lang->line('DELETED')));            
        } else {
            echo json_encode(array('status' => 'Error', 'message' => $this->lang->line('ERROR')));
        } 
    }
}