<!-- CAN BE ACCESSED BY BOTH SUPER ADMIN AND SUB ADMIN -->
<?php
date_default_timezone_set('Asia/Manila');
class Employees extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->helper(array('string', 'form'));
        $this->load->library(array('form_validation', 'session', 'email'));
    }

    public function index() {
        if($this->session->userdata('type') == "Super Administrator" OR $this->session->userdata('type') == "Administrator") {
            $this->db->order_by('emp_lastname', 'ASC');
            $activeEmp = $this->item_model->fetch('employees', array("emp_sys_status" => true));
            $this->db->order_by('emp_lastname', 'ASC');
            $inactiveEmp = $this->item_model->fetch('employees', array("emp_sys_status" => false));
            $data = array(
                'title' => 'Payroll | Employees',
                'heading' => 'Employee Data',
                'side' => 'Employees',
                'user' => $this->session->userdata('type'),
                'user_image' => $this->session->userdata('image'),
                'active_emp' => $activeEmp,
                'inactive_emp' => $inactiveEmp
            );
            $this->load->view('includes/header', $data);
            $this->load->view('employees/employees');
            $this->load->view('includes/footer');
        } else {
            redirect('employees/profile_emp');
        }
    }

    public function add_emp() {
        if($this->session->userdata('type') == "Super Administrator" OR $this->session->userdata('type') == "Administrator") {
            $data = array(
                'title' => "Add Employee",
                'heading' => 'Add Employee',
                'side' => 'Add Employee',
                'user' => 'Admin',
                'user_image' => $this->session->userdata('image')
            );

            $this->load->view('includes/header', $data);
            $this->load->view('employees/add_emp');
            $this->load->view('includes/footer');
        } else {
            redirect('employees/profile_emp');
        }
    }

    function validate_captcha() {
        $captcha = $this->input->post('g-recaptcha-response');
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfuAzkUAAAAANp8G3aAozm0CKgQaG7I7S0bR2iP=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
        if ($response . 'success' == false) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function add_emp_exec() {
        if($this->session->userdata('type') == "Super Administrator" OR $this->session->userdata('type') == "Administrator") {
            $this->form_validation->set_rules('tf_emp_lastname', 'Last name', 'required|alpha_numeric_spaces');
            $this->form_validation->set_rules('tf_emp_firstname', 'First name', 'required|alpha_numeric_spaces');
            $this->form_validation->set_rules('tf_emp_middlename', 'Middle name', 'required|alpha_numeric_spaces');
            $this->form_validation->set_rules('tf_emp_username', 'Username', 'required|alpha_numeric_spaces');
            $this->form_validation->set_rules('pf_emp_password', 'Password', 'required');
            $this->form_validation->set_rules('pf_emp_conf_password', 'Confirm Password', 'required|matches[pf_emp_password]');
            $this->form_validation->set_rules('tf_emp_email', 'Email', 'required|valid_email|is_unique[employees.emp_email]');
            $this->form_validation->set_rules('tf_emp_phone', 'Phone No.', 'required|numeric');
            $this->form_validation->set_rules('tf_emp_tin', 'Tin', 'required');
            $this->form_validation->set_rules('tf_emp_sss', 'SSS', 'required');
            $this->form_validation->set_rules('tf_emp_pagibig', 'PAGIBIG', 'required');
            $this->form_validation->set_rules('tf_emp_phealth', 'Philhealth', 'required');
            $this->form_validation->set_rules('tf_emp_gsalary', 'Gross Salary', 'required|numeric');
            $this->form_validation->set_rules('tf_emp_position', 'Position', 'required');
            $this->form_validation->set_rules('tf_emp_dept', 'Department', 'required');
            $this->form_validation->set_message('required', 'Please fill out the {field} field.');
            $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha');
            $this->form_validation->set_message('validate_captcha', 'Please check the the captcha form');
            #$this->form_validation->set_message('required', '{field} please fill up the following field');
            $this->form_validation->set_message('required', 'Please fill out the {field} field.');


            if ($this->form_validation->run()) {
                $hash = random_string('alnum', 15);

                # for image upload
                $config['upload_path'] = './uploads_employee/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 0;
                $this->load->library('upload', $config);

                #if (isset($data0->success) && $data0->success == "true") {
                if ($this->upload->do_upload('f_emp_profile_pic') == FALSE) {
                    $image = "default-user.png";
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] = './uploads_employee/' . $image;
                    $config2['create_thumb'] = TRUE;
                    $config2['maintain_ratio'] = TRUE;
                    $config2['width'] = 75;
                    $config2['height'] = 50;
                    $this->load->library('image_lib', $config2);
                    $this->image_lib->resize();
                } else {
                    $image = $this->upload->data('file_name');
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] = './uploads_employee/' . $image;
                    $config2['create_thumb'] = TRUE;
                    $config2['maintain_ratio'] = TRUE;
                    $config2['width'] = 75;
                    $config2['height'] = 50;
                    $this->load->library('image_lib', $config2);
                    $this->image_lib->resize();
                }
                $user = $this->input->post('tf_emp_username');
                $data = array(
                    'emp_username' => trim($user),
                    'emp_password' => password_hash($this->input->post('pf_emp_password'), PASSWORD_BCRYPT),
                    'emp_lastname' => trim(ucwords($this->input->post('tf_emp_lastname'))),
                    'emp_firstname' => trim(ucwords($this->input->post('tf_emp_firstname'))),
                    'emp_middlename' => trim(ucwords($this->input->post('tf_emp_middlename'))),
                    'emp_email' => trim($this->input->post('tf_emp_email')),
                    'emp_contact' => trim($this->input->post('tf_emp_phone')),
                    'tin_num' => trim($this->input->post('tf_emp_tin')),
                    'sss_num' => trim($this->input->post('tf_emp_sss')),
                    'pagibig_num' => trim($this->input->post('tf_emp_pagibig')),
                    'philhealth_num' => trim($this->input->post('tf_emp_phealth')),
                    'status' => trim($this->input->post('s_status')),
                    'gross_salary' => trim($this->input->post('tf_emp_gsalary')),
                    'position' => trim(ucwords($this->input->post('tf_emp_position'))),
                    'department' => trim(ucwords($this->input->post('tf_emp_dept'))),
                    'emp_sys_status' => 1,
                    'emp_image_path' => $image,
                    'emp_hash' => $hash
                );
                $for_log = array(
                    'username' => $this->session->userdata('username'),
                    'action' => "Add an employee -- " . $user,
                    'user_type' => $this->session->userdata('type'),
                    'time_and_date' => time()
                );

                $this->item_model->insertData("employees", $data);

                # FOR PAYROLL VALUES:
                $sss = $this->item_model->get_sss(($this->input->post('tf_emp_gsalary')));
                $phil = $this->item_model->get_philhealth(($this->input->post('tf_emp_gsalary')));
                $wtax = $this->item_model->get_witholdingtax(($this->input->post('tf_emp_gsalary')));
                $pagibig = $this->item_model->get_pagibig(($this->input->post('tf_emp_gsalary')));

                $gsalary = $this->item_model->fetch("employees", array("emp_username" => $this->input->post('tf_emp_username')));
                $gsalary = $gsalary[0];
                $temp_net = $gsalary->gross_salary - $phil - $wtax - $sss - $pagibig;

                $for_payroll = array(
                    'emp_username' => $this->input->post('tf_emp_username'),
                    'gross_salary' => $this->input->post('tf_emp_gsalary'),
                    'sss' => $sss,
                    'philhealth' => $phil,
                    'pagibig' => $pagibig,
                    'wtax' => $wtax,
                    'net_pay' => $temp_net
                );
                $this->item_model->insertData("user_log", $for_log);
                $this->item_model->insertData("tbl_payroll", $for_payroll);

                redirect("employees/");
            } else {
                $this->add_emp();
            }
        } else {
            redirect('employees/profile_emp');
        }
    }

    public function edit_employee() {
        if($this->session->userdata('type') == "Super Administrator" OR $this->session->userdata('type') == "Administrator") {
            $employee = $this->item_model->fetch('employees', array('emp_id' => $this->uri->segment(3)));
            $data = array(
                'title' => "Edit Employee",
                'heading' => 'Edit Employee',
                'side' => 'Employees',
                'user' => 'Admin',
                'employee' => $employee,
                'user_image' => $this->session->userdata('image')
            );

            $this->load->view('includes/header', $data);
            $this->load->view('employees/edit');
            $this->load->view('includes/footer');
        } else {
            redirect('employees/profile_emp');
        }
    }

    public function edit_employee_exec() {
        if($this->session->userdata('type') == "Super Administrator" OR $this->session->userdata('type') == "Administrator") {
            $this->form_validation->set_rules('tf_emp_lastname', 'Last name', 'required');
            $this->form_validation->set_rules('tf_emp_firstname', 'First name', 'required');
            $this->form_validation->set_rules('tf_emp_middlename', 'Middle Name', 'required');

            $this->form_validation->set_rules('tf_emp_email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('tf_emp_phone', 'Phone No.', 'required|numeric');
            $this->form_validation->set_message('required', 'Please fill out the {field} field.');

            if ($this->form_validation->run()) {

                $data = array(
                    'emp_lastname' => trim(ucwords($this->input->post('tf_emp_lastname'))),
                    'emp_firstname' => trim(ucwords($this->input->post('tf_emp_firstname'))),
                    'emp_middlename' => trim(ucwords($this->input->post('tf_emp_middlename'))),
                    'emp_email' => trim($this->input->post('tf_emp_email')),
                    'emp_contact' => trim($this->input->post('tf_emp_phone')),
                    'emp_sys_status' => trim($this->input->post('tf_emp_sys_status'))
                );
                $for_log = array(
                    'username' => $this->session->userdata('username'),
                    'action' => "Edit employee data",
                    'user_type' => $this->session->userdata('type'),
                    'time_and_date' => time()
                );
                $this->item_model->insertData("user_log", $for_log);
                $this->item_model->updatedata("employees", $data, array('emp_id' => $this->uri->segment(3)));
                redirect("employees/");
            } else {
                $this->edit_employee();
            }
        } else {
            redirect('employees/profile_emp');
        }
    }

    public function view_employee() {
        if($this->session->userdata('type') == "Super Administrator" OR $this->session->userdata('type') == "Administrator") {
            $employee = $this->item_model->fetch('employees', array('emp_id' => $this->uri->segment(3)));
            $data = array(
                'title' => "Employees",
                'heading' => 'Employees',
                'side' => 'View Employee',
                'user' => 'Admin',
                'employee' => $employee,
                'user_image' => $this->session->userdata('image')
            );
            $for_log = array(
                'username' => $this->session->userdata('username'),
                'action' => "View an employee",
                'user_type' => $this->session->userdata('type'),
                'time_and_date' => time()
            );
            $this->item_model->insertData("user_log", $for_log);
            $this->load->view('includes/header', $data);
            $this->load->view('employees/view');
            $this->load->view('includes/footer');
        } else {
            redirect('employees/profile_emp');
        }
    }

    public function delete_employee() {
        if($this->session->userdata('type') == "Super Administrator" OR $this->session->userdata('type') == "Administrator") {
            $this->item_model->updatedata("employees", array('emp_sys_status' => 0), array('emp_id' => $this->uri->segment(3)));
            $for_log = array(
                'username' => $this->session->userdata('username'),
                'action' => "Delete/Deactivate an employee",
                'user_type' => $this->session->userdata('type'),
                'time_and_date' => time()
            );
            $this->item_model->insertData("user_log", $for_log);
            redirect("employees/");
        } else {
            redirect('employees/profile_emp');
        }
    }

    public function restore_employee() {
        if($this->session->userdata('type') == "Super Administrator" OR $this->session->userdata('type') == "Administrator") {
            $this->item_model->updatedata("employees", array('emp_sys_status' => 1), array('emp_id' => $this->uri->segment(3)));
            $for_log = array(
                'username' => $this->session->userdata('username'),
                'action' => "Restore an employee",
                'user_type' => $this->session->userdata('type'),
                'time_and_date' => time()
            );
            $this->item_model->insertData("user_log", $for_log);
            redirect("employees/");
        } else {
            redirect('employees/profile_emp');
        }
    }

    # PROFILE OF THE EMPLOYEE WHO IS CURRENTLY LOGGED IN
    public function profile_emp() {
        if($this->session->userdata('type') == "Employee") {
            $account = $this->item_model->fetch('employees', array('emp_id' => $this->session->userdata('id')));
            $data = array(
                'title' => 'Payroll | Profile',
                'heading' => 'My Profile',
                'side' => 'Profile Page',
                'user' => 'Employee',
                'employees' => $account,
                'user_image' => $this->session->userdata('image')
            );
            $this->load->view('includes/header', $data);
            $this->load->view('employees/profile_emp');
            $this->load->view('modal');
            $this->load->view('includes/footer');
        } else {
            redirect('dashboard/');
        }
    }

    public function edit_payroll_info() {
        if($this->session->userdata('type') == "Employee") {
            $account = $this->item_model->fetch('employees', array('emp_id' => $this->session->userdata('id')));
            $data = array(
                'title' => 'Payroll | Profile',
                'heading' => 'My Profile',
                'side' => 'Edit Payroll',
                'user' => 'Employee',
                'employees' => $account,
                'user_image' => $this->session->userdata('image')
            );
            $this->load->view('includes/header', $data);
            $this->load->view('employees/edit_payroll');
            $this->load->view('includes/footer');
        } else {
            redirect('dashboard/');
        }
    }

    public function update_payroll_info() {
        if($this->session->userdata('type') == "Employee") {
            $this->form_validation->set_rules('tf_emp_tin', 'Tin', 'required');
            $this->form_validation->set_rules('tf_emp_sss', 'SSS', 'required');
            $this->form_validation->set_rules('tf_emp_pagibig', 'PAGIBIG', 'required');
            $this->form_validation->set_rules('tf_emp_phealth', 'Philhealth', 'required');
            #$this->form_validation->set_rules('tf_emp_gsalary', 'Gross Salary', 'required|numeric');
            #$this->form_validation->set_rules('tf_emp_position', 'Position', 'required');
            #$this->form_validation->set_rules('tf_emp_dept', 'Department', 'required');
            $this->form_validation->set_message('required', 'Please fill out the {field} field.');

            if ($this->form_validation->run()) {
                $data = array(
                    'tin_num' => $this->input->post('tf_emp_tin'),
                    'sss_num' => $this->input->post('tf_emp_sss'),
                    'pagibig_num' => $this->input->post('tf_emp_pagibig'),
                    'philhealth_num' => $this->input->post('tf_emp_phealth'),
                    'status' => $this->input->post('s_status'),
             #       'gross_salary' => $this->input->post('tf_emp_gsalary'),
              #      'position' => ucwords($this->input->post('tf_emp_position')),
               #     'department' => ucwords($this->input->post('tf_emp_dept'))
                );
                $for_log = array(
                    'username' => $this->session->userdata('username'),
                    'action' => "Edit payroll info",
                    'user_type' => $this->session->userdata('type'),
                    'time_and_date' => time()
                );
                $this->item_model->insertData("user_log", $for_log);
                $this->item_model->updatedata("employees", $data, array('emp_id' => $this->session->userdata('id')));
                redirect("employees/profile_emp");
            } else {
                $this->edit_payroll_info();
            }
        } else {
            redirect('dashboard/');
        }
    }
    public function update_profile() {
        if($this->session->userdata('type') == "Employee") {
            $this->form_validation->set_rules('tf_emp_lastname', 'Last name', 'required');
            $this->form_validation->set_rules('tf_emp_firstname', 'First name', 'required');
            $this->form_validation->set_rules('tf_emp_email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('tf_emp_phone_no', 'Phone No.', 'required|numeric');
            $this->form_validation->set_message('required', 'Please fill out the {field} field.');

            if ($this->form_validation->run()) {
                $config['upload_path'] = './uploads_employee/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 0;
                $this->load->library('upload', $config);
                # Check for image input
                if ($this->upload->do_upload('profile_pic') == TRUE) {
                    $image = $this->upload->data('file_name');
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] = './uploads_employee/' . $image;
                    $config2['create_thumb'] = TRUE;
                    $config2['maintain_ratio'] = TRUE;
                    $config2['width'] = 75;
                    $config2['height'] = 50;
                    $this->load->library('image_lib', $config2);
                    $this->image_lib->resize();
                    $data = array(
                        'emp_lastname' => ucwords($this->input->post('tf_emp_lastname')),
                        'emp_firstname' => ucwords($this->input->post('tf_emp_firstname')),
                        'emp_email' => $this->input->post('tf_emp_email'),
                        'emp_contact' => $this->input->post('tf_emp_phone_no'),
                        'emp_image_path' => $image
                    );
                } else {
                    $data = array(
                        'emp_lastname' => ucwords($this->input->post('tf_emp_lastname')),
                        'emp_firstname' => ucwords($this->input->post('tf_emp_firstname')),
                        'emp_email' => $this->input->post('tf_emp_email'),
                        'emp_contact' => $this->input->post('tf_emp_phone_no')
                    );
                }
                $for_log = array(
                    'username' => $this->session->userdata('username'),
                    'action' => "Update Employee Profile",
                    'user_type' => $this->session->userdata('type'),
                    'time_and_date' => time()
                );
                $this->item_model->insertData("user_log", $for_log);
                $this->item_model->updatedata("employees", $data, array('emp_id' => $this->session->userdata('id')));
                redirect("profile/");
            } else {
                $this->profile_emp();
            }
        } else {
            redirect('payroll/');
        }
    }

}