<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employeeapi extends CI_Controller {

    public function getEmployees() {
        $this->load->database();
        $query = $this->db->get('employees');
        echo json_encode($query->result());
    }

    public function addEmployee() {
        $this->load->database();
        $data = json_decode(file_get_contents("php://input"), true);
        $employee = array(
            'emp_firstname'  => $data['emp_firstname'],
            'emp_lastname'   => $data['emp_lastname'],
            'emp_middlename' => $data['emp_middlename'],
            'emp_username'   => $data['emp_username'],
            'emp_email'      => $data['emp_email'],
            'emp_contact'    => $data['emp_contact'],
            'position'       => $data['position'],
            'department'     => $data['department'],
            'gross_salary'   => $data['gross_salary'],
            'emp_sys_status' => 1,
            'emp_password'   => password_hash('password', PASSWORD_BCRYPT)
        );
        $this->db->insert('employees', $employee);
        if ($this->db->affected_rows() > 0) {
            echo json_encode(["status" => "success", "id" => $this->db->insert_id()]);
        } else {
            echo json_encode(["status" => "error"]);
        }
    }

    public function updateEmployee() {
        $this->load->database();
        $data = json_decode(file_get_contents("php://input"), true);
        $employee = array(
            'emp_firstname'  => $data['emp_firstname'],
            'emp_lastname'   => $data['emp_lastname'],
            'emp_middlename' => $data['emp_middlename'],
            'emp_username'   => $data['emp_username'],
            'emp_email'      => $data['emp_email'],
            'emp_contact'    => $data['emp_contact'],
            'position'       => $data['position'],
            'department'     => $data['department'],
            'gross_salary'   => $data['gross_salary']
        );
        $this->db->where('emp_id', $data['emp_id']);
        $this->db->update('employees', $employee);
        if ($this->db->affected_rows() > 0) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error"]);
        }
    }

    public function deleteEmployee() {
        $this->load->database();
        $data = json_decode(file_get_contents("php://input"), true);
        $this->db->where('emp_id', $data['emp_id']);
        $this->db->delete('employees');
        if ($this->db->affected_rows() > 0) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error"]);
        }
    }
    public function updateGovNumbers() {
        $this->load->database();
        $data = json_decode(file_get_contents("php://input"), true);

        $employee = array(
            'tin_num'        => $data['tin_num'],
            'sss_num'        => $data['sss_num'],
            'pagibig_num'    => $data['pagibig_num'],
            'philhealth_num' => $data['philhealth_num']
        );

        $this->db->where('emp_id', $data['emp_id']);
        $this->db->update('employees', $employee);

        if ($this->db->affected_rows() > 0) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error"]);
        }
    }
    public function getPayroll() {
    $this->load->database();
    $data = json_decode(file_get_contents("php://input"), true);
    $query = $this->db->get_where('tbl_payroll', 
        array('emp_username' => $data['emp_username']));
    echo json_encode($query->result());
}

    public function addPayroll() {
        $this->load->database();
        $data = json_decode(file_get_contents("php://input"), true);

        $payroll = array(
            'emp_username'    => $data['emp_username'],
            'gross_salary'    => $data['gross_salary'],
            'sss'             => $data['sss'],
            'philhealth'      => $data['philhealth'],
            'pagibig'         => $data['pagibig'],
            'wtax'            => $data['wtax'],
            'other_deduction' => $data['other_deduction'],
            'net_pay'         => $data['net_pay']
        );

        $this->db->insert('tbl_payroll', $payroll);

        if ($this->db->affected_rows() > 0) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error"]);
        }
    }
    public function getAttendance() {
    $this->load->database();
    $data = json_decode(file_get_contents("php://input"), true);
    $query = $this->db->get_where('attendance',
        array('emp_id' => $data['emp_id']));
    echo json_encode($query->result());
}

    public function addAttendance() {
        $this->load->database();
        $data = json_decode(file_get_contents("php://input"), true);
    
        $attendance = array(
            'username'  => $data['username'],
            'lastname'  => $data['lastname'],
            'firstname' => $data['firstname'],
            'emp_id'    => $data['emp_id'],
            'time_in'   => $data['time_in'],
            'time_out'  => $data['time_out'],
            'status'    => $data['status'],
            'date'      => $data['date']
        );
    
        $this->db->insert('attendance', $attendance);
    
        if ($this->db->affected_rows() > 0) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error"]);
        }
    }
}