<?php
class Klinik_model extends CI_Model
{

    public function admin_id()
    {
        $this->db->select('RIGHT(admin.id_admin,2) as id', false);
        $this->db->order_by('id_admin', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get('admin');

        if ($query->num_rows() != 0) {
            $data = $query->row();
            $id = intval($data->id) + 1;
        } else {
            $id = 1;
        }
        $idMax = str_pad($id, 2, "0", STR_PAD_LEFT);
        $adminId = "A" . $idMax;
        return $adminId;
    }

    public function admin_add()
    {
        $data = [
            'id_admin' => $this->input->post('id_admin', true),
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'date_created' => date('Y-m-d'),
        ];

        $this->db->insert('admin', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Congratulation! Your Account Has Been Created. Please Login </div>');
        redirect('auth');
    }

    public function admin_edit()
    {
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $name = $this->input->post('name');
        $email = $this->input->post('email');

        // cek jika ada gambar yang akan diedit
        $uploadImage = $_FILES['image']['name'];

        if ($uploadImage) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $oldImage = $data['admin']['image'];
                if ($oldImage != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/profile/' . $oldImage);
                }

                $newImage = $this->upload->data('file_name');
                $this->db->set('image', $newImage);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->db->set('name', $name);
        $this->db->where('email', $email);
        $this->db->update('admin');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your Profile Has Been Updated! </div>');
        redirect('auth/myprofile');
    }

    public function password_change()
    {
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $currentPassword = $this->input->post('currentPassword');
        $newPassword = $this->input->post('newPassword1');

        if (!password_verify($currentPassword, $data['admin']['password'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong Current Password! </div>');
            redirect('auth/changepassword');
        } else {
            if ($currentPassword == $newPassword) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> New Password Cannot Be The Same As Current Password! </div>');
                redirect('auth/changepassword');
            } else {
                // password sudah ok
                $password_hash = password_hash($newPassword, PASSWORD_DEFAULT);

                $this->db->set('password', $password_hash);
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('admin');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password Changed! </div>');
                redirect('auth/changepassword');
            }
        }
    }

    public function patient_medicalrecordnumber()
    {
        $this->db->select('RIGHT(patient.medical_record_number,6) as mrn', false);
        $this->db->order_by('medical_record_number', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get('patient');

        if ($query->num_rows() != 0) {
            $data = $query->row();
            $mrn = intval($data->mrn) + 1;
        } else {
            $mrn = 1;
        }
        $mrnMax = str_pad($mrn, 6, "0", STR_PAD_LEFT);
        $patientmrn = "MRN-" . $mrnMax;
        return $patientmrn;
    }

    public function patient_add()
    {
        $data = [
            'medical_record_number' => $this->input->post('medical_record_number', true),
            'name' => $this->input->post('name', true),
            'place_of_birth' => $this->input->post('place_of_birth', true),
            'date_of_birth' => $this->input->post('date_of_birth', true),
            'religion' => $this->input->post('religion', true),
            'gender' => $this->input->post('gender', true),
            'profession' => $this->input->post('profession', true),
            'phone_number' => $this->input->post('phone', true),
            'address' => $this->input->post('address', true),
            'date_registered' => date('Y-m-d'),
        ];

        $this->db->insert('patient', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New Patient Added! </div>');
        redirect('auth/patient');
    }

    public function patient_edit()
    {
        $data = [
            'medical_record_number' => $this->input->post('medical_record_number', true),
            'name' => $this->input->post('name', true),
            'place_of_birth' => $this->input->post('place_of_birth', true),
            'date_of_birth' => $this->input->post('date_of_birth', true),
            'religion' => $this->input->post('religion', true),
            'gender' => $this->input->post('gender', true),
            'profession' => $this->input->post('profession', true),
            'phone_number' => $this->input->post('phone_number', true),
            'address' => $this->input->post('address', true),
            'date_registered' => date('Y-m-d'),
        ];

        $this->db->where('medical_record_number', $this->input->post('medical_record_number'));
        $this->db->update('patient', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Patient Has Been Edited! </div>');
        redirect('auth/patient');
    }

    public function patient_delete($medical_record_number)
    {
        $this->db->where('medical_record_number', $medical_record_number);
        $this->db->delete('patient');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Patient Has Been Deleted! </div>');
        redirect('auth/patient');
    }

    public function patient_getall()
    {
        return $this->db->get('patient')->num_rows();
    }

    public function get_count($medical_record_number)
    {
        return $this->db->get_where('medical', ['medical_record_number' => $medical_record_number])->row_array();
    }

    public function medical_add($val)
    {
        $this->db->insert('medical', $val);
    }

    public function medical_total()
    {
        return $this->db->get('medical')->num_rows();
    }

    public function take_medical($mrn)
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get_where('medical', ['medical_record_number' => $mrn])->result_array();
    }

    public function detail_medical($id)
    {
        # code...
        return $this->db->get_where('medical', ['id' => $id])->row_array();
    }

    public function patient_getbyMedicalRecordNumber($medical_record_number)
    {
        return $this->db->get_where('patient', ['medical_record_number' => $medical_record_number])->row_array();
    }

    public function delete_mrn($mrn)
    {
        # code...
        $this->db->delete('patient', ['medical_record_number' => $mrn]);
        $this->db->delete('medical', ['medical_record_number' => $mrn]);
    }

    public function kosong()
    {
        # code...
        return 0;
    }
}
