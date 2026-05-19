<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employeeapi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->_rateLimit();
    }

    private function _rateLimit() {
        $ip = $this->input->ip_address();
        $time = time();
        $minute_ago = $time - 60;

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

        $this->db->insert('api_requests', [
            'ip'       => $ip,
            'time'     => $time,
            'endpoint' => $this->uri->uri_string()
        ]);
    }
    private function _encrypt($value) {
        if (!$value) return '';
        $iv_length = openssl_cipher_iv_length($this->cipher);
        $iv = openssl_random_pseudo_bytes($iv_length);
        $encrypted = openssl_encrypt($value, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv);
        return 'ENC:' . base64_encode($iv . $encrypted);
    }
    
    private function _decrypt($value) {
        if (!$value) return '';
        if (substr($value, 0, 4) !== 'ENC:') return $value;
        $data = base64_decode(substr($value, 4));
        $iv_length = openssl_cipher_iv_length($this->cipher);
        if (strlen($data) <= $iv_length) return $value;
        $iv = substr($data, 0, $iv_length);
        $encrypted = substr($data, $iv_length);
        $decrypted = openssl_decrypt($encrypted, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv);
        return $decrypted !== false ? $decrypted : $value;
    }

    public function getEmployees() {
        $query = $this->db->get('employees');
        echo json_encode($query->result());
    }

    public function addEmployee() {
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

    public function getContributions() {
        $data = json_decode(file_get_contents("php://input"), true);

        if (!$data || !isset($data['gross_salary'])) {
            echo json_encode(["status" => "error", "message" => "No data provided"]);
            return;
        }

        $gross = $data['gross_salary'];

        $sss = $this->db
            ->where('salary_range_from <=', $gross)
            ->where('salary_range_to >=', $gross)
            ->get('ssscontribution')
            ->row();

        $philhealth = $this->db
            ->where('range_from <=', $gross)
            ->where('range_to >=', $gross)
            ->get('philhealthcontribution')
            ->row();

        $pagibig = $this->db
            ->where('range_from <=', $gross)
            ->where('range_to >=', $gross)
            ->get('pagibigcontribution')
            ->row();

        echo json_encode([
            "status"     => "success",
            "sss"        => $sss ? $sss->employee_share : 0,
            "philhealth" => $philhealth ? $philhealth->employee_share : 0,
            "pagibig"    => $pagibig ? $pagibig->employee_share : 0
        ]);
    }
    public function updatePayroll() {
    $data = json_decode(file_get_contents("php://input"), true);

    $payroll = array(
        'gross_salary'    => $data['gross_salary'],
        'sss'             => $data['sss'],
        'philhealth'      => $data['philhealth'],
        'pagibig'         => $data['pagibig'],
        'wtax'            => $data['wtax'],
        'other_deduction' => $data['other_deduction'],
        'net_pay'         => $data['net_pay']
    );

    $this->db->where('id', $data['id']);
    $this->db->update('tbl_payroll', $payroll);

    if ($this->db->affected_rows() > 0) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
    }
}

public function deletePayroll() {
    $data = json_decode(file_get_contents("php://input"), true);

    $this->db->where('id', $data['id']);
    $this->db->delete('tbl_payroll');

    if ($this->db->affected_rows() > 0) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
    }
}
}