<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends CI_Controller
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
        $this->load->model('pos_invoices_model', 'invocies');

    }

    public function index()
    {

        $data['draft_list'] = $this->invocies->drafts();

        $head['title'] = "Kitchens";
        $head['usernm'] = $this->aauth->get_user()->username;
        $this->load->view('fixed/header', $head);
        $this->load->view('orders/index', $data);
        $this->load->view('fixed/footer');
    }

    
}