<!-- THIS CAN ONLY BE ACCESSED BY THE SUPER ADMINISTRATOR -->
<?php
date_default_timezone_set('Asia/Manila');
class Sys_users extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->helper(array('string', 'form'));
        $this->load->library(array('form_validation', 'session', 'email'));
    }

    public function index() {
        if($this->session->userdata('type') == "Super Administrator") {
            $this->db->order_by('admin_lastname', 'ASC');
            $activeUsers = $this->item_model->fetch('sub_admin', array("admin_status" => true));
            $this->db->order_by('admin_lastname', 'ASC');
            $inactiveUsers = $this->item_model->fetch('sub_admin', array("admin_status" => false));
            $data = array(
                'title' => 'Payroll | Users',
                'heading' => 'System Users',
                'side' => 'Users',
                'user' => $this->session->userdata('type'),
                'user_image' => $this->session->userdata('image'),
                'sys_user' => $activeUsers,
                'inactive' => $inactiveUsers
            );
            $this->load->view('includes/header', $data);
            $this->load->view('sys_users/system_users');
            $this->load->view('includes/footer');
        } else {
            redirect('payroll/');
        }
    }

    public function view_user() {
        if($this->session->userdata('type') == "Super Administrator") {
            $allUsers = $this->item_model->fetch('sub_admin', array('admin_id' => $this->uri->segment(3)));
            $data = array(
                'title' => "System User",
                'heading' => 'System Users',
                'side' => 'View User',
                'user' => 'Admin',
                'user_image' => $this->session->userdata('image'),
                'sys_user' => $allUsers
            );
            $for_log = array(
                'username' => $this->session->userdata('username'),
                'action' => "View an admin",
                'user_type' => $this->session->userdata('type'),
                'time_and_date' => time()
            );
            $this->item_model->insertData("user_log", $for_log);
            $this->load->view('includes/header', $data);
            $this->load->view('sys_users/view');
            $this->load->view('includes/footer');
        } else {
            redirect('payroll/');
        }
    }

    public function add_sys_user() {
        if($this->session->userdata('type') == "Super Administrator") {
            $data = array(
                'title' => "Add System User",
                'heading' => 'Add System Users',
                'side' => 'Add User',
                'user' => 'Admin',
                'user_image' => $this->session->userdata('image')
            );

            $this->load->view('includes/header', $data);
            $this->load->view('sys_users/add_user');
            $this->load->view('includes/footer');
        } else {
            redirect('payroll/');
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

    public function add_sys_user_exec() {
        if($this->session->userdata('type') == "Super Administrator") {
            $this->form_validation->set_rules('tf_sys_lastname', 'Last name', 'required');
            $this->form_validation->set_rules('tf_sys_firstname', 'First name', 'required');
            $this->form_validation->set_rules('tf_sys_username', 'Username', 'required');
            $this->form_validation->set_rules('pf_sys_password', 'Password', 'required');
            $this->form_validation->set_rules('pf_sys_conf_password', 'Confirm Password', 'required|matches[pf_sys_password]');
            $this->form_validation->set_rules('tf_sys_email', 'Email', 'required|valid_email|is_unique[sub_admin.admin_email]');
            $this->form_validation->set_rules('tf_sys_phone', 'Phone No.', 'required|numeric');
            $this->form_validation->set_message('required', 'Please fill out the {field} field.');
            $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha');
            $this->form_validation->set_message('validate_captcha', 'Please check the the captcha form');
            #$this->form_validation->set_message('required', '{field} please fill up the following field');
            $this->form_validation->set_message('required', 'Please fill out the {field} field.');

            # $this->form_validation->set_message('Username', 'The {field} you entered already exists.');

            # if (isset($data0->success) && $data0->success == "true") { # NOT YET SURE ABOUT THIS (BALIKTAD YUNG LOGIC)
            # $this->form_validation->set_rules('g-recaptcha-response', "My Captcha", "required|callback_recaptcha_checker");
            # Checking if rules are met.
            if ($this->form_validation->run()) {
                $hash = random_string('alnum', 15);
                # for image upload
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 0;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('f_profile_pic') == FALSE) {
                    $image = "default-user.png";
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] = './uploads/' . $image;
                    $config2['create_thumb'] = TRUE;
                    $config2['maintain_ratio'] = TRUE;
                    $config2['width'] = 75;
                    $config2['height'] = 50;
                    $this->load->library('image_lib', $config2);
                    $this->image_lib->resize();
                } else {
                    $image = $this->upload->data('file_name');
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] = './uploads/' . $image;
                    $config2['create_thumb'] = TRUE;
                    $config2['maintain_ratio'] = TRUE;
                    $config2['width'] = 75;
                    $config2['height'] = 50;
                    $this->load->library('image_lib', $config2);
                    $this->image_lib->resize();
                }
                $user = $this->input->post('tf_sys_username');
                $data = array(
                    'admin_username' => trim($user),
                    'admin_password' => password_hash($this->input->post('pf_sys_password'), PASSWORD_BCRYPT),
                    'admin_lastname' => trim(ucwords($this->input->post('tf_sys_lastname'))),
                    'admin_firstname' => trim(ucwords($this->input->post('tf_sys_firstname'))),
                    'admin_email' => trim($this->input->post('tf_sys_email')),
                    'admin_contact' => trim($this->input->post('tf_sys_phone')),
                    'admin_status' => 1,
                    'admin_hash' => $hash,
                    'admin_image_path' => $image,
                );
                $for_log = array(
                    'username' => $this->session->userdata('username'),
                    'action' => "Add an admin -- " . $user,
                    'user_type' => $this->session->userdata('type'),
                    'time_and_date' => time()
                );
                $this->item_model->insertData("user_log", $for_log);
                $this->item_model->insertData("sub_admin", $data);
                redirect("sys_users/");
            } else {
                $this->add_sys_user();
            }
        } else { # if not super admin:
            redirect('payroll/');
        }
    }

    public function edit_user() {
        if($this->session->userdata('type') == "Super Administrator") {
            $allUsers = $this->item_model->fetch('sub_admin', array('admin_id' => $this->uri->segment(3)));
            $data = array(
                'title' => "Edit System User",
                'heading' => 'Edit System Users',
                'side' => 'Edit User',
                'user' => 'Admin',
                'sys_user' => $allUsers,
                'user_image' => $this->session->userdata('image')
            );

            $this->load->view('includes/header', $data);
            $this->load->view('sys_users/edit');
            $this->load->view('includes/footer');
        } else {
            redirect('payroll/');
        }
    }

    public function edit_user_exec() {
        if($this->session->userdata('type') == "Super Administrator") {
            $this->form_validation->set_rules('tf_sys_lastname', 'Last name', 'required');
            $this->form_validation->set_rules('tf_sys_firstname', 'First name', 'required');
            $this->form_validation->set_rules('tf_sys_username', 'Username', 'required');
            $this->form_validation->set_rules('tf_sys_email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('tf_sys_phone', 'Phone No.', 'required|numeric');
            $this->form_validation->set_message('required', 'Please fill out the {field} field.');

            if ($this->form_validation->run()) {
                $user = $this->input->post('tf_sys_username');
                $data = array(
                    'admin_username' => trim($user),
                    'admin_lastname' => trim(ucwords($this->input->post('tf_sys_lastname'))),
                    'admin_firstname' => trim(ucwords($this->input->post('tf_sys_firstname'))),
                    'admin_email' => trim($this->input->post('tf_sys_email')),
                    'admin_contact' => trim($this->input->post('tf_sys_phone')),
                    'admin_status' => trim($this->input->post('tf_sys_status'))
                );
                $for_log = array(
                    'username' => $this->session->userdata('username'),
                    'action' => "Edit admin data -- " . $user,
                    'user_type' => $this->session->userdata('type'),
                    'time_and_date' => time()
                );
                $this->item_model->insertData("user_log", $for_log);
                $this->item_model->updatedata("sub_admin", $data, array('admin_id' => $this->uri->segment(3)));
                redirect("sys_users/");
            } else {
                $this->edit_user();
            }
        } else {
            redirect('payroll/');
        }
    }

    public function delete_user() {
        if($this->session->userdata('type') == "Super Administrator") {
            $this->item_model->updatedata("sub_admin", array('admin_status' => 0), array('admin_id' => $this->uri->segment(3)));
            $for_log = array(
                'username' => $this->session->userdata('username'),
                'action' => "Delete/Deactivate an admin",
                'user_type' => $this->session->userdata('type'),
                'time_and_date' => time()
            );
            $this->item_model->insertData("user_log", $for_log);
            redirect("sys_users/");
        } else {
            redirect('payroll/');
        }
    }

    public function restore_user() {
        if($this->session->userdata('type') == "Super Administrator") {
            $this->item_model->updatedata("sub_admin", array('admin_status' => 1), array('admin_id' => $this->uri->segment(3)));
            $for_log = array(
                'username' => $this->session->userdata('username'),
                'action' => "Restore an admin",
                'user_type' => $this->session->userdata('type'),
                'time_and_date' => time()
            );
            $this->item_model->insertData("user_log", $for_log);
            redirect("sys_users/");
        } else {
            redirect('payroll/');
        }
    }
}