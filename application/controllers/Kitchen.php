<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Kitchen extends CI_Controller
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
        $this->db->from('kitchen');
        $data['kitchens'] = $this->db->get()->result_array();

        $head['title'] = "Kitchens";
        $head['usernm'] = $this->aauth->get_user()->username;
        $this->load->view('fixed/header', $head);
        $this->load->view('kitchen/index', $data);
        $this->load->view('fixed/footer');
    }

    public function view_orders($kitchen_id)
    {
        $this->load->model('pos_invoices_model', 'invocies');
        $data['kitchen_orders'] = $this->invocies->drafts($kitchen_id);

        $head['title'] = "Kitchen Orders";
        $head['usernm'] = $this->aauth->get_user()->username;
        $this->load->view('fixed/header', $head);
        $this->load->view('kitchen/orders', $data);
        $this->load->view('fixed/footer');
    }


    public function add()
    {
        $head['title'] = "Add Kitchen";
        $head['usernm'] = $this->aauth->get_user()->username;
        $this->load->view('fixed/header', $head);
        $this->load->view('kitchen/add');
        $this->load->view('fixed/footer');
    }


    public function addkitchen()
    {
        
        $kitchen_name = $this->input->post('kitchen_name', true);
        $kitchen_description = $this->input->post('kitchen_description', true);
        
        $data = array(
            'kitchen_name' => $kitchen_name,
            'kitchen_description' => $kitchen_description,
            'status' => 1,
            'loc' => $this->aauth->get_user()->loc            
        );
        
        if ($this->db->insert('kitchen',$data)) {
            $url = "<a href='" . base_url('kitchen/add') . "' class='btn btn-blue btn-lg'><span class='fa fa-plus-circle' aria-hidden='true'></span>  </a> <a href='" . base_url('kitchen/index') . "' class='btn btn-grey-blue btn-lg'><span class='fa fa-list-alt' aria-hidden='true'></span>  </a>";
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
        $this->db->from('kitchen');
        $this->db->where('id', $id);
        $data['kitchen'] = $this->db->get()->row_array();
        $head['title'] = "Edit Kitchen";
        $head['usernm'] = $this->aauth->get_user()->username;
        $this->load->view('fixed/header', $head);
        $this->load->view('kitchen/edit', $data);
        $this->load->view('fixed/footer');

    }

    public function editkitchen()
    {
        
        $kitchen_id = $this->input->post('kitchen_id', true);
        $kitchen_name = $this->input->post('kitchen_name', true);
        $kitchen_description = $this->input->post('kitchen_description', true);
        
        $data = array(
            'kitchen_name' => $kitchen_name,
            'kitchen_description' => $kitchen_description  
        );
        $this->db->set($data);
        $this->db->where('id',$kitchen_id);
        if($this->db->update('kitchen')) {
            $url = "<a href='" . base_url('kitchen/index') . "' class='btn btn-grey-blue btn-lg'><span class='fa fa-list-alt' aria-hidden='true'></span>  </a>";
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
            $this->db->delete('kitchen', array('id' => $id));
            echo json_encode(array('status' => 'Success', 'message' => $this->lang->line('DELETED')));            
        } else {
            echo json_encode(array('status' => 'Error', 'message' => $this->lang->line('ERROR')));
        } 
    }
}