<?php
/**
 * Created by PhpStorm.
 * User: Seeeeej
 * Date: 11/17/2017
 * Time: 11:03 AM
 */
date_default_timezone_set('Asia/Manila');

class User_log extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library(array('session'));
    }

    public function page() {
        $this->load->library('pagination');
        $perpage = 20;
        $config['base_url'] = base_url()."user_log/page";
        $config['per_page'] = $perpage;
        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close']= ' </ul></nav>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['first_url']='';
        $config['last_link']='Last';
        $config['last_tag_open']='<li>';
        $config['last_tag_close']='</li>';
        $config['next_link']='&raquo;';
        $config['next_tag_open']='<li>';
        $config['next_tag_close']='</li>';
        $config['prev_link'] ='&laquo;';
        $config['prev_tag_open']='<li>';
        $config['prev_tag_close']='</li>';
        $config['cur_tag_open']='<li class="active"><a href="#">';
        $config['cur_tag_close']='</a></li>';
        $config['num_tag_open']='<li>';
        $config['num_tag_close']='</li>';

        if($this->session->userdata('type') == "Super Administrator") {
            $config['total_rows'] = $this->item_model->getCount('user_log');
            $this->pagination->initialize($config);
            $user_log = $this->item_model->getLogWithLimit($perpage, $this->uri->segment(3));
            $data = array(
                'title' => 'Payroll | Log',
                'heading' => 'User Log',
                'side' => 'Log',
                'user' => $this->session->userdata('type'),
                'user_image' => $this->session->userdata('image'),
                'user_log' => $user_log,
                'links' => $this->pagination->create_links()
            );
            $this->load->view('includes/header', $data);
            $this->load->view('userlog');
            $this->load->view('includes/footer');
        } elseif($this->session->userdata('type') == "Administrator") {
            $config['total_rows'] = $this->item_model->getCount('user_log', array("user_type" => "Employee"));
            $this->pagination->initialize($config);
            $user_log = $this->item_model->getLogWithLimitforEmp($perpage, $this->uri->segment(3), array("user_type" => "Employee"));
            $data = array(
                'title' => 'Payroll | Log',
                'heading' => 'User Log',
                'side' => 'Log',
                'user' => $this->session->userdata('type'),
                'user_image' => $this->session->userdata('image'),
                'user_log' => $user_log,
                'links' => $this->pagination->create_links()
            );
            $this->load->view('includes/header', $data);
            $this->load->view('userlog');
            $this->load->view('includes/footer');
        } else {
            redirect('payroll/');
        }
    }
}