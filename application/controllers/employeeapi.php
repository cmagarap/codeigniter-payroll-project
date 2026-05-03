<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employeeapi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->_rateLimit();
    }

    // =====================
    // RATE LIMITING
    // =====================
    private function _rateLimit() {
        $ip = $this->input->ip_address();
        $time = time();
        $minute_ago = $time - 60;

        // Count requests in last minute
        $count = $this->db
            ->where('ip', $ip)
            ->where('time >', $minute_ago)
            ->count_all_results('api_requests');

        if ($count >= 100) {
            header('HTTP/1.1 429 Too Many Requests');
            echo json_encode([
                "status" => "error",
                "message" => "Rate limit exceeded. Max 100 requests per minute."
            ]);
            exit();
        }

        // Log this request
        $this->db->insert('api_requests', [
            'ip'       => $ip,
            'time'     => $time,
            'endpoint' => $this->uri->uri_string()
        ]);
    }

    // =====================
    // ENCRYPTION HELPERS
    // =====================
 
    private $cipher = 'AES-256-CBC';
    private $key = 'P@yr0llS3cur3K3y#EmpMgmt2026!!X';
    
    private function _encrypt($value) {
        if (!$value) return '';
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cipher));
        $encrypted = openssl_encrypt($value, $this->cipher, $this->key, 0, $iv);
        return base64_encode($iv . $encrypted);
    }
    
    private function _decrypt($value) {
        if (!$value) return '';
        try {
            $data = base64_decode($value);
            $iv_length = openssl_cipher_iv_length($this->cipher);
            // Check if data is long enough to be encrypted
            if (strlen($data) <= $iv_length) {
                return $value; // return as plain text
            }
            $iv = substr($data, 0, $iv_length);
            $encrypted = substr($data, $iv_length);
            $decrypted = openssl_decrypt($encrypted, $this->cipher, $this->key, 0, $iv);
            // If decryption fails return original value
            return $decrypted !== false ? $decrypted : $value;
        } catch (Exception $e) {
            return $value;
        }
    }

    private function _decryptEmployee($emp) {
        $emp->emp_firstname   = $this->_decrypt($emp->emp_firstname);
        $emp->emp_lastname    = $this->_decrypt($emp->emp_lastname);
        $emp->emp_middlename  = $this->_decrypt($emp->emp_middlename);
        $emp->emp_email       = $this->_decrypt($emp->emp_email);
        $emp->emp_contact     = $this->_decrypt($emp->emp_contact);
        $emp->tin_num         = $this->_decrypt($emp->tin_num);
        $emp->sss_num         = $this->_decrypt($emp->sss_num);
        $emp->pagibig_num     = $this->_decrypt($emp->pagibig_num);
        $emp->philhealth_num  = $this->_decrypt($emp->philhealth_num);
        return $emp;
    }

    // =====================
    // EMPLOYEE ENDPOINTS
    // =====================
    public function getEmployees() {
        $query = $this->db->get('employees');
        $employees = $query->result();

        // Decrypt PII for each employee
        foreach ($employees as &$emp) {
            $emp = $this->_decryptEmployee($emp);
        }

        echo json_encode($employees);
    }

    public function addEmployee() {
        $data = json_decode(file_get_contents("php://input"), true);

        $employee = array(
            'emp_firstname'  => $this->_encrypt($data['emp_firstname']),
            'emp_lastname'   => $this->_encrypt($data['emp_lastname']),
            'emp_middlename' => $this->_encrypt($data['emp_middlename']),
            'emp_username'   => $data['emp_username'],
            'emp_email'      => $this->_encrypt($data['emp_email']),
            'emp_contact'    => $this->_encrypt($data['emp_contact']),
            'position'       => $data['position'],
            'department'     => $data['department'],
            'gross_salary'   => $data['gross_salary'],
            'emp_sys_status' => 1,
            'emp_password'   => password_hash('employee123', PASSWORD_BCRYPT)
        );

        $this->db->insert('employees', $employee);

        if ($this->db->affected_rows() > 0) {
            echo json_encode(["status" => "success", "id" => $this->db->insert_id()]);
        } else {
            echo json_encode(["status" => "error"]);
        }
    }

    public function updateEmployee() {
        $data = json_decode(file_get_contents("php://input"), true);

        $employee = array(
            'emp_firstname'  => $this->_encrypt($data['emp_firstname']),
            'emp_lastname'   => $this->_encrypt($data['emp_lastname']),
            'emp_middlename' => $this->_encrypt($data['emp_middlename']),
            'emp_username'   => $data['emp_username'],
            'emp_email'      => $this->_encrypt($data['emp_email']),
            'emp_contact'    => $this->_encrypt($data['emp_contact']),
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
        $data = json_decode(file_get_contents("php://input"), true);

        $employee = array(
            'tin_num'        => $this->_encrypt($data['tin_num']),
            'sss_num'        => $this->_encrypt($data['sss_num']),
            'pagibig_num'    => $this->_encrypt($data['pagibig_num']),
            'philhealth_num' => $this->_encrypt($data['philhealth_num'])
        );

        $this->db->where('emp_id', $data['emp_id']);
        $this->db->update('employees', $employee);

        if ($this->db->affected_rows() > 0) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error"]);
        }
    }

    // =====================
    // PAYROLL ENDPOINTS
    // =====================
    public function getPayroll() {
        $data = json_decode(file_get_contents("php://input"), true);
        $query = $this->db->get_where('tbl_payroll',
            array('emp_username' => $data['emp_username']));
        echo json_encode($query->result());
    }

    public function addPayroll() {
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

    // =====================
    // ATTENDANCE ENDPOINTS
    // =====================
    public function getAttendance() {
        $data = json_decode(file_get_contents("php://input"), true);
        $query = $this->db->get_where('attendance',
            array('emp_id' => $data['emp_id']));
        echo json_encode($query->result());
    }

    public function addAttendance() {
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