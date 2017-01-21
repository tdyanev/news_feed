<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
            'content' => $this->load->view('form/login', [
                'errors' => validation_errors(),
            ], true),
            //'title'   => $this->lang->line('welcome'),
        ]);

    }

    public function submit() {
        $this->form_validation->set_rules('login-email', 'Email', [
            'required',
        ]);

        $this->form_validation->set_rules('login-password', 'Password', [
            'required', [
                'credentials', [
                    $this->user_model, 'is_valid_post',
                ]
            ]
        ], [
            'credentials' => 'Wrong credentials, try again',
        ]);


        if ($this->form_validation->run() === TRUE) {

            $this->session->set_userdata('email',
                $this->input->post('login-email'));

            $this->session->set_flashdata('login_success', TRUE);

            redirect('profile');

        } else {
            $this->index();
        }


    }
}
