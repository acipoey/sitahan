<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('captcha'));
        $this->load->model('account_model');
    }

    public function index()
    {
        $logged_in = $this->session->userdata('logged_in');
        $user_role = $this->session->userdata('user_role');

        if (!$logged_in) {

            $this->form_validation->set_message('required', '%s harus diisi');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('captcha', 'Captcha', 'required|callback_check_captcha');

            if ($this->form_validation->run() == FALSE) {
                $word = $this->generateRandomString(4);
                $vals = array(
                    'word'  => $word,
                    'font_path'     => './assets/Verdana.ttf',
                    'img_path' => './uploads/captcha/',
                    'img_url' => base_url('uploads/captcha') . '/',
                    'img_width'     => '150',
                    'img_height'    => 40,
                    'expiration'    => 7200,
                    'colors'        => array(
                        'background' => array(255, 255, 255),
                        'border' => array(255, 255, 255),
                        'text' => array(0, 0, 0),
                        'grid' => array(255, 40, 40)
                    )
                );

                //$data['role']=$this->enum_to_array('users','role');

                /* Generate the captcha */
                $data['captcha'] = create_captcha($vals);

                /* Store the captcha value (or 'word') in a session to retrieve later */
                $this->session->set_userdata('captchaWord', $word);
                $this->load->view('welcome_message', $data);
            } else {
                $username = $this->input->post('username', TRUE);
                $password = $this->input->post('password', TRUE);
                //$role = $this->input->post('role', TRUE);
                $temp_account = $this->account_model->check_user_account($username, $password)->row_array();
                // check account
                $num_account = count($temp_account);

                if ($num_account > 0) {
                    $usrol = $temp_account['role'];
                    $instansi = $temp_account['instansi'];
                    $array_items = array(
                        'username'          => $temp_account['username'],
                        'id_user'           => $temp_account['id_user'],
                        'nama'              => $temp_account['nama'],
                        'role'              => $usrol,
                        'instansi'          => $instansi,
                        'alamat'            => $temp_account['alamat'],
                        'level_instansi'    => $temp_account['level'],
                        'id_instansi'       => $temp_account['id_instansi'],
                        'logged_in'         => '1'
                    );
                    $this->session->set_userdata($array_items);
                    redirect(base_url('dashboard'));
                } else {
                    // kalau ga ada diredirect lagi ke halaman login
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger display-hide">
                                                                <button class="close" data-close="alert"></button>
                                                                <span> Username dan password tidak cocok. </span>
                                                            </div>');
                    $this->session->unset_userdata('captchaWord');
                    redirect(base_url('login'));
                }
            }
        } else {
            redirect(base_url('dashboard'));
        }
    }

    public function generateRandomString($length = 10)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function check_captcha($a)
    {
        $word = $this->session->userdata('captchaWord');
        if (strcmp(strtoupper($a), strtoupper($word)) != 0) {
            $this->form_validation->set_message('check_captcha', 'Terdapat kesalahan pada captcha');
            return false;
        } else return true;
    }
}
