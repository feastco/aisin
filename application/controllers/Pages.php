<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{
    public function view($page = 'home')
    {
        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data = [];
        if ($page === 'products') {
            $this->load->model('Product_model');
            $data['products'] = $this->Product_model->getAll(); // Remove extra parentheses
            // Debugging statement
            log_message('debug', 'Products: ' . print_r($data['products'], true));
        }

        $data['title'] = ucfirst($page);

        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }
}
?>
