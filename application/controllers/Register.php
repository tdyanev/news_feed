<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->has_userdata('email')) {
            redirect('profile');
        }
        $this->load->model('user_model');
    }
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {

        $this->load->view('base', [
            'content' => $this->load->view('form/register', [
                'errors' => validation_errors(),
            ], true),
            //'title'   => $this->lang->line('welcome'),
        ]);

    }

    public function submit() {
        $this->form_validation->set_rules('reg-email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('reg-password', 'Password', join('|', [
            'trim',
            'required',
            'min_length[8]',
            'max_length[30]',
            'is_unique[user.email]',
        ]));

        $this->form_validation->set_rules('reg-passconf', 'Password Confirmation', 'trim|required|matches[reg-password]');

        if ($this->form_validation->run() === TRUE) {
            $result = $this->user_model->register([
                'email'    => $this->input->post('reg-email'),
                'password' => $this->input->post('reg-password'),
            ]);


            $this->load->view('base', [
                'content' => $this->load->view('form/reg_submit', [
                    'result' => $result,
                ], true)
            ]);


        } else {
            $this->index();
        }


    }
}
