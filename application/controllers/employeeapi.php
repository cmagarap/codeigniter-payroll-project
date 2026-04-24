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
            'emp_sys_status' => 1
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
}