<?php
/**
 * Created by PhpStorm.
 * User: Seeeeej
 * Date: 11/17/2017
 * Time: 11:11 AM
 */
date_default_timezone_set('Asia/Manila');

class Attendance extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library(array('session'));
    }

    public function page() {
        $this->load->library('pagination');
        $perpage = 20;
        $config['base_url'] = base_url()."attendance/page";
        $config['total_rows'] = $this->item_model->getCount('attendance');
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
        $this->pagination->initialize($config);

        if($this->session->userdata('type') == "Super Administrator" OR $this->session->userdata('type') == "Administrator") {
            $attendance_table = $this->item_model->getAttendanceWithLimit($perpage, $this->uri->segment(3));
            $data = array(
                'title' => 'Payroll | Attendance',
                'heading' => 'Employee Attendance',
                'side' => 'Attendance',
                'user' => $this->session->userdata('type'),
                'user_image' => $this->session->userdata('image'),
                'attendance' => $attendance_table,
                'links' => $this->pagination->create_links()
            );
            $for_log = array(
                'username' => $this->session->userdata('username'),
                'action' => "Checked employees' attendance",
                'user_type' => $this->session->userdata('type'),
                'time_and_date' => time()
            );
            $this->item_model->insertData("user_log", $for_log);
            $this->load->view('includes/header', $data);
            $this->load->view('attendance');
            $this->load->view('includes/footer');
        } else { # FROM THE EMPLOYEE'S PERSPECTIVE
            $attendance_table = $this->item_model->getAttendanceWithLimitforEmp($perpage, $this->uri->segment(3), array('emp_id' => $this->session->userdata('id')));
            $data = array(
                'title' => 'Payroll | Attendance',
                'heading' => 'Attendance',
                'side' => 'My Attendance',
                'user' => $this->session->userdata('type'),
                'user_image' => $this->session->userdata('image'),
                'attendance' => $attendance_table
            );
            $for_log = array(
                'username' => $this->session->userdata('username'),
                'action' => "Checked his/her attendance",
                'user_type' => $this->session->userdata('type'),
                'time_and_date' => time()
            );
            $this->item_model->insertData("user_log", $for_log);
            $this->load->view('includes/header', $data);
            $this->load->view('attendance_emp');
            $this->load->view('includes/footer');
        }
    }
}