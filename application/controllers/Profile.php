<?php
date_default_timezone_set('Asia/Manila');
class Profile extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->helper(array('string', 'form'));
        $this->load->library('form_validation', 'session');
    }

    public function index() {
        if($this->session->userdata('type') == "Super Administrator") {
            $account = $this->item_model->fetch('super_admin', array('s_admin_id' => $this->session->userdata('id')));
            $data = array(
                'title' => 'Payroll | Profile',
                'heading' => 'My Profile',
                'side' => 'Profile Page',
                'user' => $this->session->userdata('type'),
                'user_image' => $this->session->userdata('image'),
                'account' => $account
            );
            $this->load->view('includes/header', $data);
            $this->load->view('profile');
            $this->load->view('modal');
            $this->load->view('includes/footer');
        } else {
            redirect('payroll/');
        }
    }

    public function admin() {
        if($this->session->userdata('type') == "Administrator") {
            $account = $this->item_model->fetch('sub_admin', array('admin_id' => $this->session->userdata('id')));
            $data = array(
                'title' => 'Payroll | Profile',
                'heading' => 'My Profile',
                'side' => 'Profile Page',
                'user' => $this->session->userdata('type'),
                'user_image' => $this->session->userdata('image'),
                'account' => $account
            );
            $this->load->view('includes/header', $data);
            $this->load->view('sys_users/profile_admin');
            $this->load->view('modal');
            $this->load->view('includes/footer');
        } else {
            redirect('payroll/');
        }
    }

    public function update_profile() {
        if($this->session->userdata('type') == "Super Administrator") {
            $this->form_validation->set_rules('tf_s_lastname', 'Last name', 'required');
            $this->form_validation->set_rules('tf_s_firstname', 'First name', 'required');
            $this->form_validation->set_rules('tf_s_username', 'Username', 'required');
            $this->form_validation->set_rules('tf_s_email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('tf_s_phone_no', 'Phone No.', 'required|numeric');
            $this->form_validation->set_message('required', 'Please fill out the {field} field.');
            if ($this->form_validation->run()) {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 0;
                $this->load->library('upload', $config);
                # Check for image input
                if ($this->upload->do_upload('profile_pic') == TRUE) {
                    $image = $this->upload->data('file_name');
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] = './uploads/' . $image;
                    $config2['create_thumb'] = TRUE;
                    $config2['maintain_ratio'] = TRUE;
                    $config2['width'] = 75;
                    $config2['height'] = 50;
                    $this->load->library('image_lib', $config2);
                    $this->image_lib->resize();
                    $data = array(
                        's_admin_username' => $this->input->post('tf_s_username'),
                        's_admin_lastname' => ucwords($this->input->post('tf_s_lastname')),
                        's_admin_firstname' => ucwords($this->input->post('tf_s_firstname')),
                        's_admin_email' => $this->input->post('tf_s_email'),
                        's_admin_contact' => $this->input->post('tf_s_phone_no'),
                        's_admin_image_path' => $image
                    );
                } else {
                    $data = array(
                        's_admin_username' => $this->input->post('tf_s_username'),
                        's_admin_lastname' => ucwords($this->input->post('tf_s_lastname')),
                        's_admin_firstname' => ucwords($this->input->post('tf_s_firstname')),
                        's_admin_email' => $this->input->post('tf_s_email'),
                        's_admin_contact' => $this->input->post('tf_s_phone_no')
                    );
                }

                $for_log = array(
                    'username' => $this->session->userdata('username'),
                    'action' => "Update Profile",
                    'user_type' => $this->session->userdata('type'),
                    'time_and_date' => time()
                );
                $this->item_model->insertData("user_log", $for_log);
                $this->item_model->updatedata("super_admin", $data, array('s_admin_id' => $this->session->userdata('id')));
                redirect("profile/");
            } else {
                $this->index();
            }
        } else {
            redirect('payroll/');
        }
    }

    public function update_profile_admin() {
        if($this->session->userdata('type') == "Administrator") {
            $this->form_validation->set_rules('tf_admin_lastname', 'Last name', 'required');
            $this->form_validation->set_rules('tf_admin_firstname', 'First name', 'required');
            $this->form_validation->set_rules('tf_admin_username', 'Username', 'required');
            $this->form_validation->set_rules('tf_admin_email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('tf_admin_phone_no', 'Phone No.', 'required|numeric');
            $this->form_validation->set_message('required', 'Please fill out the {field} field.');
            if ($this->form_validation->run()) {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 0;
                $this->load->library('upload', $config);
                # Check for image input
                if ($this->upload->do_upload('profile_pic') == TRUE) {
                    $image = $this->upload->data('file_name');
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] = './uploads/' . $image;
                    $config2['create_thumb'] = TRUE;
                    $config2['maintain_ratio'] = TRUE;
                    $config2['width'] = 75;
                    $config2['height'] = 50;
                    $this->load->library('image_lib', $config2);
                    $this->image_lib->resize();
                    $data = array(
                        'admin_username' => $this->input->post('tf_admin_username'),
                        'admin_lastname' => ucwords($this->input->post('tf_admin_lastname')),
                        'admin_firstname' => ucwords($this->input->post('tf_admin_firstname')),
                        'admin_email' => $this->input->post('tf_admin_email'),
                        'admin_contact' => $this->input->post('tf_admin_phone_no'),
                        'admin_image_path' => $image
                    );
                } else {
                    $data = array(
                        'admin_username' => $this->input->post('tf_admin_username'),
                        'admin_lastname' => ucwords($this->input->post('tf_admin_lastname')),
                        'admin_firstname' => ucwords($this->input->post('tf_admin_firstname')),
                        'admin_email' => $this->input->post('tf_admin_email'),
                        'admin_contact' => $this->input->post('tf_admin_phone_no')
                    );
                }
                $for_log = array(
                    'username' => $this->session->userdata('username'),
                    'action' => "Update Profile",
                    'user_type' => $this->session->userdata('type'),
                    'time_and_date' => time()
                );
                $this->item_model->insertData("user_log", $for_log);
                $this->item_model->updatedata("sub_admin", $data, array('admin_id' => $this->session->userdata('id')));
                redirect("profile/admin");
            } else {
                $this->admin();
            }
        } else {
            redirect('payroll/');
        }
    }
}