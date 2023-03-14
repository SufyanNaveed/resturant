<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Online_order extends CI_Controller
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
        $this->db->from('online_order');
        $data['online_orders'] = $this->db->get()->result_array();
        
        $head['title'] = "Online Orders";
        $head['usernm'] = $this->aauth->get_user()->username;
        $this->load->view('fixed/header', $head);
        $this->load->view('online_order/index', $data);
        $this->load->view('fixed/footer');
    }


    public function add()
    {
        $head['title'] = "Add Online Order";
        $head['usernm'] = $this->aauth->get_user()->username;
        $this->load->view('fixed/header', $head);
        $this->load->view('online_order/add', $data);
        $this->load->view('fixed/footer');
    }


    public function add_submit()
    {
        
        $name = $this->input->post('name', true);
        $description = $this->input->post('description', true);
        
        $data = array(
            'name' => $name,
            'description' => $description,
            'status' => 1,
            'loc' => $this->aauth->get_user()->loc            
        );
        
        if ($this->db->insert('online_order',$data)) {
            $url = "<a href='" . base_url('online_order/add') . "' class='btn btn-blue btn-lg'><span class='fa fa-plus-circle' aria-hidden='true'></span>  </a> <a href='" . base_url('online_order/index') . "' class='btn btn-grey-blue btn-lg'><span class='fa fa-list-alt' aria-hidden='true'></span>  </a>";
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
        $this->db->from('online_order');
        $this->db->where('id',$id);
        $data['online_order'] = $this->db->get()->row_array();
        
        $head['title'] = "Edit Online Order";
        $head['usernm'] = $this->aauth->get_user()->username;
        $this->load->view('fixed/header', $head);
        $this->load->view('online_order/edit', $data);
        $this->load->view('fixed/footer');

    }

    public function edit_submit()
    {
        
        $online_order_id = $this->input->post('online_order_id', true);
        $name = $this->input->post('name', true);
        $description = $this->input->post('description', true);
        
        $data = array(
            'name' => $name,
            'description' => $description  
        );
        $this->db->set($data);
        $this->db->where('id',$online_order_id);
        if($this->db->update('online_order')) {
            $url = "<a href='" . base_url('online_order/index') . "' class='btn btn-grey-blue btn-lg'><span class='fa fa-list-alt' aria-hidden='true'></span>  </a>";
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
            $this->db->delete('online_order', array('id' => $id));
            echo json_encode(array('status' => 'Success', 'message' => $this->lang->line('DELETED')));            
        } else {
            echo json_encode(array('status' => 'Error', 'message' => $this->lang->line('ERROR')));
        } 
    }
}