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
        $this->db->select('orders.*, tables.table_no, geopos_customers.name as cus_name, floors.floor_num,online_order.name as online_app_name');
        $this->db->from('orders');
        $this->db->join('geopos_invoices', 'geopos_invoices.id = orders.kot', 'left');
        $this->db->join('geopos_invoice_items', 'geopos_invoice_items.tid = orders.kot', 'left');
        $this->db->join('geopos_products', 'geopos_products.pid = geopos_invoice_items.pid', 'left');
        $this->db->join('kitchen', 'kitchen.id = geopos_products.kitchen_id', 'left');
        $this->db->join('tables', 'tables.id = orders.table_id', 'left');
        $this->db->join('online_order', 'online_order.id = orders.online_id', 'left');
        $this->db->join('floors', 'floors.id = tables.floor_id', 'left');
        $this->db->join('geopos_customers', 'geopos_customers.id = geopos_invoices.csd', 'left');
        $this->db->where('geopos_products.kitchen_id',$kitchen_id);
        $this->db->where('orders.status',0);
        $this->db->where('orders.draft_id',0);
        $this->db->group_by('orders.invoice_id');
        $paid_orders = $this->db->get()->result_array();

        $this->db->select('orders.*, tables.table_no, geopos_customers.name as cus_name, floors.floor_num,online_order.name as online_app_name');
        $this->db->from('orders');
        $this->db->join('geopos_draft', 'geopos_draft.id = orders.kot', 'left');
        $this->db->join('geopos_draft_items', 'geopos_draft_items.tid = orders.kot', 'left');
        $this->db->join('geopos_products', 'geopos_products.pid = geopos_draft_items.pid', 'left');
        $this->db->join('kitchen', 'kitchen.id = geopos_products.kitchen_id', 'left');
        $this->db->join('tables', 'tables.id = orders.table_id', 'left');
        $this->db->join('online_order', 'online_order.id = orders.online_id', 'left');
        $this->db->join('floors', 'floors.id = tables.floor_id', 'left');
        $this->db->join('geopos_customers', 'geopos_customers.id = geopos_draft.csd', 'left');
        $this->db->where('geopos_products.kitchen_id',$kitchen_id);
        $this->db->where('orders.status',0);
        $this->db->where('orders.draft_id',1);
        $this->db->group_by('orders.invoice_id');
        $unpaid_orders = $this->db->get()->result_array();
        $data['orders'] = array_merge($paid_orders, $unpaid_orders);
        
        $data['kitchen_id'] = $kitchen_id;

        //echo '<pre>'; print_r($this->db->last_query()); exit;
        //echo '<pre>'; print_r($data['orders']); exit;
        $head['title'] = "Kitchen Orders";
        $head['usernm'] = $this->aauth->get_user()->username;
        $this->load->view('fixed/header', $head);
        $this->load->view('kitchen/orders', $data);
        $this->load->view('fixed/footer');
    }
    

    public function order_detail()
    {
        $order_id = $this->input->post('order_id');
        $invoice_id = $this->input->post('invoice_id');

        $this->db->select('*');
        $this->db->from('orders');
        $this->db->where('orders.id',$order_id);
        $check_invoice_or_draft = $this->db->get()->row_array();

        $this->db->select('orders.*, tables.table_no, gp.product_name, gi.qty, online_order.name as online_app_name');
        $this->db->from('orders');
        $this->db->join('tables', 'tables.id = orders.table_id', 'left');
        $this->db->join('online_order', 'online_order.id = orders.online_id', 'left');
        if($check_invoice_or_draft['draft_id'] == 1){
            $this->db->join('geopos_draft', 'geopos_draft.tid = orders.invoice_id', 'left');
            $this->db->join('geopos_draft_items gi', 'gi.tid = geopos_draft.id', 'left');
            $this->db->join('geopos_products gp', 'gp.pid = gi.pid', 'left');
            $this->db->where('geopos_draft.tid',$invoice_id);
        }else{
            $this->db->join('geopos_invoices', 'geopos_invoices.tid = orders.invoice_id', 'left');
            $this->db->join('geopos_invoice_items gi', 'gi.tid = geopos_invoices.id', 'left');
            $this->db->join('geopos_products gp', 'gp.pid = gi.pid', 'left');
            $this->db->where('geopos_invoices.tid',$invoice_id);
        }
        $orders_products = $this->db->get()->result_array();
        $html ='';
        if($orders_products){
            $html = '
            <div class="row" style="padding: 7px 0px">
                <div class="col-sm-4"><strong>Date</strong></div>
                <div class="col-sm-8">'. $orders_products[0]['created_at']. '</div> 
            </div>
            <div class="row" style="padding: 7px 0px">
                <div class="col-sm-4"><strong>Customer</strong></div>
                <div class="col-sm-8">Walk-in Client</div> 
            </div>
            <div class="row" style="padding: 7px 0px">';
            if($orders_products[0]['table_id'] > 0){
                $html .= '<div class="col-sm-4"><strong>Floor - Table</strong></div><div class="col-sm-8">'.$orders_products[0]['table_no'].'</div></div>';
            }
            if($orders_products[0]['online_id']> 0){
                $html .= '<div class="col-sm-4"><strong>Online Order</strong></div><div class="col-sm-8">'.$orders_products[0]['online_app_name'].'</div></div>';
            }
            if($orders_products[0]['delivery_id'] == 1){
                $html .= '<div class="col-sm-4"><strong>Delivery Order</strong></div><div class="col-sm-8">Home Delivery</div></div>';
            }  
            $payment_status = $orders_products[0]['payment'] == 1 ? "Paid" : "Unpaid";
            $html .= '<div class="row" style="padding: 7px 0px">
                <div class="col-sm-4"><strong>Payment Status</strong></div>
                <div class="col-sm-8"><span class="alert alert-success">'. $payment_status .'</span></div> 
            </div>
            <hr>';
            $html .= '<div class="row" style="padding: 7px 0px"><div class="col-sm-6" style="padding-bottom: 10px;"><strong>Products</strong></div><div class="col-sm-6" style="padding-bottom: 10px;"><strong>Quantity</strong></div>';

            foreach($orders_products as $key=>$orders_product){
                $key++;
                $html .= '<div class="col-sm-6">'.$orders_product['product_name'] .'</div><div class="col-sm-6" style="padding-left: 40px;">'. number_format($orders_product['qty']) .'</div>';
            }
            $html .= '</div>';
            echo $html;
        }
        
    }

    public function add()
    {
        $head['title'] = "Add Kitchen";
        $head['usernm'] = $this->aauth->get_user()->username;
        $this->load->view('fixed/header', $head);
        $this->load->view('kitchen/add');
        $this->load->view('fixed/footer');
    }

    public function update_order_status($order=0)
    {
        $order = $this->input->post('order', true);
        $order_id = $order == 0 ? $this->input->post('order_id', true) : $order; 
        $status = $order == 0 ? 1 : 3; 
        
        $data = array(
            'status' => $status
        );
        // echo '<pre>'; print_r($data); exit;
        $this->db->set($data);
        $this->db->where('id',$order_id);
        if($this->db->update('orders')) {
            if($status == 3){
                redirect('pos_invoices/create');
            }else{
                echo true;
            }
        } else {
            echo false;
        }
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