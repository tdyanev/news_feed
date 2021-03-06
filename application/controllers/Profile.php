<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    private $email;

    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('email')) {
            $this->_redirect();
        }

        $this->load->model('source_model');
        $this->load->model('user_model');

        $this->email = $this->session->userdata('email');
        //$this->lang->load('welcome', 'english');
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
            'content' => $this->load->view('profile', [
                'title' => null,
                'user'  => $this->user_model->get($this->email),
            ], true),
        ]);
    }

    public function get_box_view() {
        $this->load->view('box', [
            'sources' => $this->source_model->get_all(),
        ]);
    }

    public function save() {
        $result = $this->user_model->update($this->email, [
            'settings' => $this->input->post('settings'),
        ]);

        $view = $result > 0 ? 'save/success' : 'save/fail';
        $this->load->view($view);
    }

    public function read() {
        $id = $this->input->post('id');
        $url = $this->source_model->get_source($id);

        //$url = 'https://www.vesti.bg/rss.php';

        if (!$url) {
            return NULL;
        }

        $this->load->view('item', [
            'xml' => $this->_read($url)
        ]);
    }

    private function _read($url) {
        //some logic
        $xml = simplexml_load_file($url, null, LIBXML_NOCDATA);

        return $xml->channel;
    }

    private function _redirect() {
        redirect('login');
    }

    public function logout() {
        $this->session->unset_userdata('email');
        $this->_redirect();
    }
}
