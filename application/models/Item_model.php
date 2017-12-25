<?php

class Item_model extends CI_Model {
    function fetch($table, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }

        $query = $this->db->get($table);
        return ($query->num_rows()) ? $query->result() : FALSE;
    }

    function search($table, $where, $like) {
        $this->db->like($where, $like);
        $query = $this->db->get($table);
        return ($query-> num_rows()) ? $query->result() : FALSE;
    }

    function insertData($table, $arrayData) {
        $this->db->insert($table, $arrayData);
    }

    function updatedata($table, $data, $where = NULL) {
        if(!empty( $where)) {
            $this->db->where($where);
        }

        /* $query = */ $this->db->update($table, $data);
        #return ($query->num_rows()) ? $query->result() : FALSE;
    }

    function delete($table, $where = NULL) {
        if (!empty ( $where)) {
            $this->db->where($where);
        }

        $this->db->delete($table);
    }

    function getCount($table, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return $query->num_rows();
    }

    function getLogWithLimit($limit, $offset) {
        $this->db->limit($limit);
        $this->db->offset($offset);
        $this->db->order_by('userlog_id', 'DESC');
        $query = $this->db->get('user_log');
        return $query->result();
    }

    function getLogWithLimitforEmp($limit, $offset, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }

        $this->db->limit($limit);
        $this->db->offset($offset);
        $this->db->order_by('userlog_id', 'DESC');
        $query = $this->db->get('user_log');
        return $query->result();
    }

    function getAttendanceWithLimit($limit, $offset) {
        $this->db->limit($limit);
        $this->db->offset($offset);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('attendance');
        return $query->result();
    }

    function getAttendanceWithLimitforEmp($limit, $offset, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->limit($limit);
        $this->db->offset($offset);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('attendance');
        return $query->result();
    }

    function get_sss($gross_salary){
        //    $where = "$gross_salary BETWEEN salary_range_from AND salary_range_to";
        //  $this->db->where($where);
        $query_string = "SELECT employee_share FROM ssscontribution WHERE $gross_salary BETWEEN salary_range_from AND salary_range_to";
        $query  = $this->db->query($query_string);
        return $query->row()->employee_share;
    }

    function get_philhealth($gross_salary){
        $query_string = "SELECT employee_share FROM philhealthcontribution WHERE $gross_salary BETWEEN range_from AND range_to";
        $query  = $this->db->query($query_string);
        return $query->row()->employee_share;
    }

    function get_pagibig($gross_salary){
        $pagibig = 100;
        return $pagibig;
        //return ($query->row(6)) ? $query->result() : FALSE;
    }

    function get_witholdingtax($gross_salary){
        if($gross_salary > 0 && $gross_salary <4167){
            $exemption = 0;
            $percent = 0.00;
            $wtax = ($exemption + (($gross_salary - 1) * $percent));
            $result = number_format($wtax, 2, '.', '');
            return $result;
        }
        elseif($gross_salary >= 4167 && $gross_salary <5000){
            $exemption = 0;
            $percent = 0.05;
            $wtax = ($exemption + (($gross_salary - 5000) * $percent));
            $result = number_format($wtax, 2, '.', '');
            return $result;
        }
        elseif($gross_salary >= 6667 && $gross_salary <10000){
            $exemption = 208.33;
            $percent = 0.15;
            $wtax = ($exemption + (($gross_salary - 6667) * $percent));
            $result = number_format($wtax, 2, '.', '');
            return $result;
        }
        elseif($gross_salary >= 10000 && $gross_salary <15833){
            $exemption = 708.33;
            $percent = 0.20;
            $wtax = ($exemption + (($gross_salary - 10000) * $percent));
            $result = number_format($wtax, 2, '.', '');
            return $result;
        }
        elseif($gross_salary >= 15833 && $gross_salary <25000){
            $exemption = 1875.00;
            $percent = 0.25;
            $wtax = ($exemption + (($gross_salary - 15833) * $percent));
            $result = number_format($wtax, 2, '.', '');
            return $result;
        }
        elseif($gross_salary >= 25000 && $gross_salary <45833){
            $exemption = 4166.67;
            $percent = 0.30;
            $wtax = ($exemption + (($gross_salary - 25000) * $percent));
            $result = number_format($wtax, 2, '.', '');
            return $result;
        }
        elseif($gross_salary >=45833 ){
            $exemption = 10416.67;
            $percent = 0.32;
            $wtax = ($exemption + (($gross_salary - 45833) * $percent));

            $result = number_format($wtax, 2, '.', '');
            return $result;
        }
    }

    function gross_salary($gross_salary, $where) {
        $query_string = "SELECT $gross_salary - wtax - pagibig - philhealth - sss FROM tbl_payroll WHERE emp_username = '$where'";
        $query  = $this->db->query($query_string);
        return ($query->num_rows()) ? $query->result() : FALSE;
    }

    function getValue($column, $username) {
        $query_string = "SELECT $column FROM tbl_payroll WHERE emp_username = '$username'";
        $query  = $this->db->query($query_string);
        #return ($query->num_rows()) ? $query->result() : FALSE;
        return $query->row()->$column;
    }

    function getAVG($table, $column) {
        $this->db->select_avg($column);
        $query = $this->db->get($table);
        return ($query->num_rows()) ? $query->result() : FALSE;
    }

    function getHighest($table, $column) {
        $this->db->select_max($column);
        $query = $this->db->get($table);
        return ($query->num_rows()) ? $query->result() : FALSE;
    }

    function getLowest($table, $column) {
        $this->db->select_min($column);
        $query = $this->db->get($table);
        return ($query->num_rows()) ? $query->result() : FALSE;
    }
}
