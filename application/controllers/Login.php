<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        $this->data['CI'] = &get_instance();
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_login');
        $this->load->library('form_validation');
    }
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->data['title_web'] = 'Login | Sistem Informasi Perpustakaan';
        $this->load->view('login2', $this->data);
    }

    public function auth()
    {
        $user = htmlspecialchars($this->input->post('user', TRUE), ENT_QUOTES);
        $pass = htmlspecialchars($this->input->post('pass', TRUE), ENT_QUOTES);
        // auth
        $proses_login = $this->db->query("SELECT * FROM tbl_login WHERE user='$user' AND pass = md5('$pass')");
        $row = $proses_login->num_rows();
        if ($row > 0) {
            $hasil_login = $proses_login->row_array();

            // create session
            $this->session->set_userdata('masuk_sistem_rekam', TRUE);
            $this->session->set_userdata('level', $hasil_login['level']);
            $this->session->set_userdata('ses_id', $hasil_login['id_login']);
            $this->session->set_userdata('anggota_id', $hasil_login['anggota_id']);

            if ($this->session->userdata('level') == 'Anggota') {
                echo '<script>window.location="' . base_url() . 'transaksi";</script>';
            } else {
                echo '<script>window.location="' . base_url() . 'dashboard";</script>';
            }
        } else {

            echo '<script>alert("Login Gagal, Periksa Kembali Username dan Password Anda");
            window.location="' . base_url() . '"</script>';
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        echo '<script>window.location="' . base_url() . '";</script>';
    }

    public function forgot()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'valid_email' => 'Mohon maaf format email kamu salah'
        ]);
        if ($this->form_validation->run() == false) {

            $this->load->view('lupapas/forgot');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('tbl_login', ['email' => $email])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'tanggal_dibuat' => time()
                ];

                $this->db->insert('user_token', $user_token);

                $this->_sendEmail($token);
                $this->session->set_flashdata('sukses', 'silahkan buka email kamu untuk ubah password');
                redirect(base_url('login/forgot'));
            } else {
                $this->session->set_flashdata('error', 'email tidak terdaftar');
                redirect(base_url('login/forgot'));
            }
        }
    }

    private function _sendEmail($token)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'siperpusman1@gmail.com',
            'smtp_pass' => 'SIperpusman1_',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('siperpusman1@gmail.com', 'MAN 1 Model Kota Bengkulu');
        $this->email->to($this->input->post('email'));
        $this->email->subject('Forgot Password');
        $this->email->message('Silahkan klik link berikut untuk mengubah password kamu : <a href="' . base_url() . 'Login/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Ubah Password</a>');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tbl_login', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->ubahpass();
            } else {
                $this->session->set_flashdata('error', 'Token mu salah');
                redirect(base_url('login'));
            }
        } else {
            $this->session->set_flashdata('error', 'Email tidak terdaftar');
            redirect(base_url('login'));
        }
    }

    public function ubahpass()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth/login');
        }
        $this->form_validation->set_rules('password1', 'Password1', 'trim|required|min_length[5]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password2', 'trim|required|min_length[5]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('lupapas/gantipass');
        } else {
            $password = $this->input->post('password1');
            $pass = md5($password);

            $email = $this->session->userdata('reset_email');

            $this->db->set('pass', $pass);
            $this->db->where('email', $email);
            $this->db->update('tbl_login');
            $this->db->delete('user_token', ['email' => $email]);

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('sukses', 'password berhasil di ubah');
            redirect(base_url('login'));
        }
    }
}
