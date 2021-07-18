<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('klinik_model');
        // fungsi timespan pada detail pasien harus load helper
        $this->load->helper('date');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('auth/home');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $admin = $this->db->get_where('admin', ['email' => $email])->row_array();

        // jika ada admin
        if ($admin) {
            // cek password
            if (password_verify($password, $admin['password'])) {
                $data = [
                    'id_admin' => $admin['id_admin'],
                    'email' => $admin['email'],
                ];
                // nyimpan data login admin kedalam session
                $this->session->set_userdata($data);
                redirect('auth/home');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong Password! Try Again </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email is not registered. </div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('auth/home');
        }

        $data['id'] = $this->klinik_model->admin_id();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[admin.email]',
            [
                'is_unique' => 'This email has already registered!',
            ]
        );
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password not match!',
            'min_length' => 'Password too short!',
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Admin Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration', $data);
            $this->load->view('templates/auth_footer');
        } else {
            $this->klinik_model->admin_add();
        }
    }

    public function home()
    {
        if (!$this->session->userdata('id_admin')) {
            redirect('auth');
        }

        $data['title'] = 'Dashboard';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['patient'] = $this->db->get('patient')->result_array();
        $data['nik'] = $this->klinik_model->patient_getall();
        $data['medical_total'] = $this->klinik_model->medical_total();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('auth/home', $data);
        $this->load->view('templates/footer');
    }

    public function myprofile()
    {
        if (!$this->session->userdata('id_admin')) {
            redirect('auth');
        }

        $data['title'] = 'My Profile';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('auth/myprofile', $data);
        $this->load->view('templates/footer');
    }

    public function editprofile()
    {
        if (!$this->session->userdata('id_admin')) {
            redirect('auth');
        }

        $data['title'] = 'Edit Profile';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('auth/editprofile', $data);
            $this->load->view('templates/footer');
        } else {
            $this->klinik_model->admin_edit();
        }
    }

    public function changepassword()
    {
        if (!$this->session->userdata('id_admin')) {
            redirect('auth');
        }

        $data['title'] = 'Change Password ';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('currentPassword', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('newPassword1', 'New Password', 'required|trim|min_length[3]|matches[newPassword2]');
        $this->form_validation->set_rules('newPassword2', 'Confirm New Password', 'required|trim|min_length[3]|matches[newPassword1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('auth/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $this->klinik_model->password_change();
        }
    }

    public function patient()
    {
        if (!$this->session->userdata('id_admin')) {
            redirect('auth');
        }

        $data['title'] = 'Patients';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['patient'] = $this->db->get('patient')->result_array();
        $data['patientmrn'] = $this->klinik_model->patient_medicalrecordnumber();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('auth/patients', $data);
        $this->load->view('templates/footer');
    }

    public function medical()
    {
        if (!$this->session->userdata('id_admin')) {
            redirect('auth');
        }

        $data['title'] = 'Patients';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['medical'] = $this->db->get('medical')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('auth/medicals', $data);
        $this->load->view('templates/footer');
    }

    public function patient_add()
    {
        if (!$this->session->userdata('id_admin')) {
            redirect('auth');
        }

        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['patient'] = $this->db->get('patient')->result_array();

        $this->form_validation->set_rules('medical_record_number', 'Medical Record Number', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('auth/patients', $data);
            $this->load->view('templates/footer');

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Error!!! NIK & Address Must Be Filled </div>');
            redirect('auth/patient');
        } else {
            $this->klinik_model->patient_add();
        }
    }

    public function patient_edit($medical_record_number)
    {
        if (!$this->session->userdata('id_admin')) {
            redirect('auth');
        }

        $data['title'] = 'Edit Patient';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['patient'] = $this->klinik_model->patient_getbyMedicalRecordNumber($medical_record_number);
        // Generate data
        $data['religion'] = ['Islam', 'Kristen Katolik', 'Kristen Protestan', 'Hindu', 'Buddha'];
        $data['gender'] = ['Laki-laki', 'Perempuan'];

        $this->form_validation->set_rules('address', 'Address', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('auth/patients_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->klinik_model->patient_edit();
        }
    }

    public function patient_delete($medical_record_number)
    {
        $this->klinik_model->delete_mrn($medical_record_number);
        redirect('auth/patient');
    }

    public function add_medical()
    {
        $val = [
            'medical_record_number' => $this->input->post('medical_record_number'),
            'date' => date('Y-m-d H:i:s'),
            'dokter' => $this->input->post('dokter', true),
            'anamnesa' => $this->input->post('anamnesa', true),
            'diagnosa' => $this->input->post('diagnosa', true),
            'theraphy' => $this->input->post('theraphy', true),
        ];
        $this->klinik_model->medical_add($val);
        redirect('auth/patient_detail/' . $this->input->post('medical_record_number'));
    }

    public function medical_detail($id)
    {
        $data['title'] = 'Detail Medical';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $medical = $this->klinik_model->detail_medical($id);
        $data['patient'] = $this->klinik_model->patient_getbyMedicalRecordNumber($medical['medical_record_number']);
        $data['medical'] = $medical;
        // var_dump($data['medical']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('auth/medical_detail', $data);
        $this->load->view('templates/footer');
    }

    public function patient_detail($medical_record_number)
    {
        $data['title'] = 'Detail Patient';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['patient'] = $this->klinik_model->patient_getbyMedicalRecordNumber($medical_record_number);
        $data['medical'] = $this->klinik_model->take_medical($medical_record_number);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('auth/patients_detail', $data);
        $this->load->view('templates/footer');
    }

    public function logout()
    {
        $this->session->unset_userdata('id_admin');
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> You have been logout </div>');
        redirect('auth');
    }

    function print() {
        $data['title'] = 'Klinik Dr Ria - Print';
        $data['patient'] = $this->db->get('patient')->result_array();
        $this->load->view('auth/print', $data);
    }

    public function print_medical()
    {
        $data['title'] = "Klinik Dr Ria - Patient Print";
        $data['medical'] = $this->db->get('medical')->result_array();
        $this->load->view('auth/print_medical', $data);
    }
}
