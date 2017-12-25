<?php
/**
 * Created by PhpStorm.
 * User: Seeeeej
 * Date: 11/17/2017
 * Time: 11:19 AM
 */

date_default_timezone_set('Asia/Manila');

class Dashboard extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library(array('session'));
    }

    public function index() {
        if($this->session->userdata('type') == "Super Administrator" OR $this->session->userdata('type') == "Administrator") {
            $present_employees = $this->item_model->getCount('attendance', array('date' => date('Y/m/d')));
            $total_employees = $this->item_model->getCount('employees');
            $sub_admin_active = $this->item_model->getCount('sub_admin', array('admin_status' => true));
            $emp_active = $this->item_model->getCount('employees', array('emp_sys_status' => true));
            $active = $sub_admin_active + $emp_active;
            $date = date('Y/m/d');
            $attendance_now = $this->item_model->fetch("attendance", array("date" => $date));
            $avg = $this->item_model->getAVG('tbl_payroll', 'net_pay');
            $avg = $avg[0];
            $highest = $this->item_model->getHighest('tbl_payroll', 'net_pay');
            $highest = $highest[0];
            $lowest = $this->item_model->getLowest('tbl_payroll', 'net_pay');
            $lowest = $lowest[0];
            $data = array(
                'title' => 'Payroll | Dashboard',
                'heading' => 'Dashboard',
                'side' => 'Dashboard',
                'user' => $this->session->userdata('type'),
                'user_image' => $this->session->userdata('image'),
                'present' => $present_employees,
                'total' => $total_employees,
                'active' => $active,
                'attendance_now' => $attendance_now,
                'average' => $avg->net_pay,
                'highest' => $highest->net_pay,
                'lowest' => $lowest->net_pay
            );
            $this->load->view('includes/header', $data);
            $this->load->view('dashboard');
            $this->load->view('includes/footer');
        } else {
            redirect('payroll/');
        }
    }
}