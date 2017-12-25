<?php
date_default_timezone_set('Asia/Manila');

class Payroll extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library(array('session', 'email'));
        $this->load->helper('string');
    }

	public function index() {
	    if(!$this->session->has_userdata('isloggedin') OR $this->session->userdata('type') != NULL) {
            $this->load->view('login_form');
        } else {
	        if($this->session->userdata('type') == "Super Administrator" OR $this->session->userdata('type') == "Administrator") {
	            redirect('dashboard/');
            } else {
	            redirect('employees/profile_emp');
            }
        }
	}

	public function random() {
	    echo "random controller for debugging<br>";
    }

    public function payroll() {
        if($this->session->userdata('type') == "Super Administrator" OR $this->session->userdata('type') == "Administrator") {
            $data = array(
                'title' => 'Payroll',
                'heading' => 'Payroll',
                'side' => 'Payroll',
                'user' => $this->session->userdata('type'),
                'user_image' => $this->session->userdata('image')
            );
        } else {
            $data = array(
                'title' => 'My Payroll',
                'heading' => 'My Payroll',
                'side' => 'Payroll',
                'user' => $this->session->userdata('type'),
                'user_image' => $this->session->userdata('image')
            );
        }
        $this->load->view('includes/header', $data);
        $this->load->view('payroll');
        $this->load->view('includes/footer');

    }

    public function about() {
        $data = array(
            'title' => 'Payroll | About',
            'heading' => 'About Us',
            'side' => 'About',
            'user' => $this->session->userdata('type'),
            'user_image' => $this->session->userdata('image')
        );

        $this->load->view('includes/header', $data);
        $this->load->view("about");
        $this->load->view('includes/footer');
    }

	public function login_submit() {
        $this->load->helper('form');
        $this->load->library('form_validation');
	    $this->form_validation->set_rules('tf_username', 'Username', 'required');
        $this->form_validation->set_rules('tf_password', 'Password', 'required');
        $this->form_validation->set_message('required', 'Please fill out the {field} field.');
        $s_admin = $this->item_model->fetch("super_admin", array('s_admin_username' => $this->input->post('tf_username')));
        $admin = $this->item_model->fetch("sub_admin", array('admin_username' => trim($this->input->post('tf_username'))));
        $emp = $this->item_model->fetch("employees", array('emp_username' => trim($this->input->post('tf_username'))));
        if($this->form_validation->run()) {
            # if SUPER ADMIN
            if($s_admin) {
                $s_admin = $s_admin[0];
                if (password_verify($this->input->post('tf_password'), $s_admin->s_admin_password)) {
                    if ($s_admin->s_admin_status != 1) {
                        $this->session->set_flashdata('error', 'Your account is inactive.');
                        $this->index();
                    } else {
                        $s_admin_data = array(
                            'id' => $s_admin->s_admin_id,
                            'username' => $s_admin->s_admin_username,
                            'image' => $s_admin->s_admin_image_path,
                            'date_login' => date("Y-m-d H:i:s"),
                            'type' => 'Super Administrator'
                        );
                        $this->session->set_userdata($s_admin_data, true);
                        $this->session->set_userdata('isloggedin', true);
                        $for_log = array(
                            'username' => $this->session->userdata('username'),
                            'action' => "Login",
                            'user_type' => $this->session->userdata('type'),
                            'time_and_date' => time()
                        );
                        $this->item_model->insertData("user_log", $for_log);
                        redirect('dashboard/');
                    }
                } else {
                    $this->session->set_flashdata('error', 'You entered a wrong password.');
                    $this->index();
                }
            }
            # IF EMPLOYEE
            elseif ($emp) {
                $emp = $emp[0];
                if (password_verify($this->input->post('tf_password'), $emp->emp_password)) {
                    if ($emp->emp_sys_status != 1) {
                        $this->session->set_flashdata('error', 'Your account is inactive.');
                        $this->index();
                    } else {
                        $emp_data = array(
                            'id' => $emp->emp_id,
                            'username' => $emp->emp_username,
                            'lastname' => $emp->emp_lastname,
                            'firstname' => $emp->emp_firstname,
                            'image' => $emp->emp_image_path,
                            'date_login' => date("Y-m-d H:i:s"),
                            'type' => 'Employee'
                        );
                        $this->session->set_userdata($emp_data);
                        $this->session->set_userdata('isloggedin', true);
                        $for_log = array(
                            'username' => $this->session->userdata('username'),
                            'action' => "Login",
                            'user_type' => $this->session->userdata('type'),
                            'time_and_date' => time()
                        );
                        $this->item_model->insertData("user_log", $for_log);
                        redirect('employees/profile_emp');
                    }
                } else {
                    $this->session->set_flashdata('error', 'You entered a wrong password.');
                    $this->index();
                }
            }
            # IF SUB ADMIN
            elseif ($admin) {
                $admin = $admin[0];
                if (password_verify($this->input->post('tf_password'), $admin->admin_password)) {
                    if ($admin->admin_status != 1) {
                        $this->session->set_flashdata('error', 'Your account is inactive.');
                        redirect('payroll/');
                    } else {
                        $admin_data = array(
                            'id' => $admin->admin_id,
                            'username' => $admin->admin_username,
                            'image' => $admin->admin_image_path,
                            'date_login' => date("Y-m-d H:i:s"),
                            'type' => 'Administrator'
                        );
                        $this->session->set_userdata($admin_data);
                        $this->session->set_userdata('isloggedin', true);
                        $for_log = array(
                            'username' => $this->session->userdata('username'),
                            'action' => "Login",
                            'user_type' => $this->session->userdata('type'),
                            'time_and_date' => time()
                        );
                        $this->item_model->insertData("user_log", $for_log);
                        redirect('dashboard/');
                    }
                } else {
                    $this->session->set_flashdata('error', 'You entered a wrong password.');
                    $this->index();
                }
            } else {
                $this->session->set_flashdata('error', 'No such user exists.');
                $this->index();
            }
        }
        else {
            $this->index();
        }
    }

    public function logout() {
        /*$flag = $this->session->userdata('isloggedin');
	    function checklog($session) {
	        if($session == NULL) {
                throw new Exception("You are already logged out.");
            }
            return true;
        }
        
        try {
	        checklog($flag);*/
            $for_log = array(
                'username' => $this->session->userdata('username'),
                'action' => "Logout",
                'user_type' => $this->session->userdata('type'),
                'time_and_date' => time()
            );
            $this->item_model->insertData("user_log", $for_log);
        /*} catch (Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }*/
        $this->session->unset_userdata('isloggedin', true);
        $this->session->sess_destroy();
        redirect('payroll/');
    }

    public function forgot() {
        if(!$this->session->has_userdata('isloggedin')) {
            $data = array("title" => "Forgot Password");
            $this->load->view("forgot_form", $data);
        } else {
            $this->index();
        }
    }

    public function forgot_checkmail() {
        if(!$this->session->has_userdata('isloggedin')) {
            $email = $this->item_model->fetch("employees", array("emp_email" => $this->input->post("email")));
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            if ($this->form_validation->run()) {
                if (!$email) {
                    $this->session->set_flashdata('forgot_error', "No such user exists with the email you just entered.");
                    $this->forgot();
                } else {
                    $email = $email[0];
                    $username = $email->emp_username;
                    $email_acc = $email->emp_email;
                    $hash = $email->emp_hash;
                    $tf_email = $this->input->post("email");
                    # FOR EMAIL
                    $this->email->from('seej.max@gmail.com', "Chris John Agarap");
                    $this->email->to($tf_email);
                    $for_email = array(
                        "subject" => "PS Request for Password Reset.",
                        "message" => "Hi $username, per your request, your password could be reset by clicking the link below.",
                        "link" => "http://localhost/payrollproject/payroll/reset_password?email=$email_acc&hash=$hash"
                    );
                    $this->email->subject("PS Request for Password Reset.");
                    $this->email->message($this->load->view('request_for_password_reset', $for_email, true));
                    if ($this->email->send()) {
                        $for_log = array(
                            'username' => $username,
                            'action' => "Request for password reset",
                            'user_type' => "Employee",
                            'time_and_date' => time()
                        );
                        $this->item_model->insertData("user_log", $for_log);
                        echo "<script>alert('Request for password reset has been sent. Please check your email');" . "window.location='" . base_url() . "payroll/'</script>";
                    } else {
                        echo "<script>alert('Request for password reset failed. Please try again');" . "window.location='" . base_url() . "payroll/'</script>";
                    }
                    $this->index();
                }
            } else {
                $this->forgot();
            }
        } else {
            $this->index();
        }
    }

    public function reset_password() {
        if(!$this->session->has_userdata('isloggedin')) {
            if (isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {
                $email = $this->input->get('email');
                $hash = $this->input->get('hash');
                $email_and_hash = $this->item_model->fetch("employees", array('emp_email' => $email, 'emp_hash' => $hash));
                if (!$email_and_hash) {
                    $this->load->view("invalid_url");
                } else {
                    $data = array(
                        "title" => "Reset Password",
                        "email" => $email,
                        "hash" => $hash
                    );
                    $this->load->view("resetpassword_form", $data);
                }
            } else {
                redirect("payroll/");
            }
        } else {
            $this->index();
        }
    }

    public function update_password() {
        if(!$this->session->has_userdata('isloggedin')) {
            $new_password = $this->input->post('new_password');
            $conf_password = $this->input->post('conf_password');
            $h_email = $this->input->post('h_email');
            $h_hash = $this->input->post('h_hash');
            $acc = $this->item_model->fetch("employees", array("emp_email" => $h_email, "emp_hash" => $h_hash));
            if($new_password != $conf_password) {
                $this->session->set_flashdata('new_password', "The passwords you entered do not match.");
                redirect("payroll/reset_password?email=$h_email&hash=$h_hash");
            } else {
                $acc = $acc[0];
                $update = $this->item_model->updatedata("employees", array("emp_password" => password_hash($new_password, PASSWORD_BCRYPT)), array("emp_email" => $h_email, "emp_hash" => $h_hash));
                if(!$update) { # BALIKTAD YUNG LOGIC WTF
                    $for_log = array(
                        'username' => $acc->emp_username,
                        'action' => "Password reset",
                        'user_type' => "Employee",
                        'time_and_date' => time()
                    );
                    $this->item_model->insertData("user_log", $for_log);
                    echo "<script>alert('Your password has successfully been reset.');" . "window.location='". base_url()."payroll/'</script>";
                } else {
                    echo "<script>alert('Password reset failed. Please try again');" . "window.location='". base_url()."payroll/'</script>";
                }
                $this->index();
            }
        } else {
            $this->index();
        }
    }

    public function change_pass() {
        if($this->session->userdata('type') == "Super Administrator") {
            # fetch super admin data
            $admin = $this->item_model->fetch("super_admin", array("s_admin_id" => $this->session->userdata("id")));
            $admin = $admin[0];
            # for changing password:
            $new_password = password_hash($this->input->post('new_pass'), PASSWORD_BCRYPT);
            $this->item_model->updatedata("super_admin", array("s_admin_password" => $new_password), array("s_admin_id" => $this->session->userdata('id')));
            $for_log = array(
                'username' => $admin->s_admin_username,
                'action' => "Change password",
                'user_type' => $this->session->userdata("type"),
                'time_and_date' => time()
            );
            $this->item_model->insertData("user_log", $for_log);
            redirect("profile/");
        } elseif($this->session->userdata('type') == "Administrator") {
            # fetch admin data
            $admin = $this->item_model->fetch("sub_admin", array("admin_id" => $this->session->userdata("id")));
            $admin = $admin[0];
            # for changing password:
            $new_password = password_hash($this->input->post('new_pass'), PASSWORD_BCRYPT);
            $this->item_model->updatedata("sub_admin", array("admin_password" => $new_password), array("admin_id" => $this->session->userdata('id')));
            $for_log = array(
                'username' => $admin->admin_username,
                'action' => "Change password",
                'user_type' => $this->session->userdata("type"),
                'time_and_date' => time()
            );
            $this->item_model->insertData("user_log", $for_log);
            redirect("profile/admin");
        } elseif($this->session->userdata('type') == "Employee") {
            # fetch admin data
            $emp = $this->item_model->fetch("employees", array("emp_id" => $this->session->userdata("id")));
            $emp = $emp[0];
            # for changing password:
            $new_password = password_hash($this->input->post('new_pass'), PASSWORD_BCRYPT);
            $this->item_model->updatedata("employees", array("emp_password" => $new_password), array("emp_id" => $this->session->userdata('id')));
            $for_log = array(
                'username' => $emp->emp_username,
                'action' => "Change password",
                'user_type' => $this->session->userdata("type"),
                'time_and_date' => time()
            );
            $this->item_model->insertData("user_log", $for_log);
            redirect("employees/profile_emp");
        }
    }
    public function destroy() {
        $this->session->sess_destroy();
        redirect('payroll/');
    }
}
