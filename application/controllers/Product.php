<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Product extends CI_Controller {

        public function __construct() {
            parent::__construct();
            if($this->session->login['role'] != 'admin') redirect();
            $this->load->model('Product_model', 'product');
            $this->load->library('upload');
        }

        public function index() {
            $data['title'] = 'Master Product';
            $data['products'] = $this->product->getAll();
            $data['aktif'] = 'Product';
            
            $this->load->view('product/lihat', $data);
        }

        public function create() {
            $data['title'] = 'Tambah Product';
            $data['aktif'] = 'Product';

            if($this->input->post()) {
                $config['upload_path'] = './assets/images/products/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 10000;
                
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('gambar')) {
                    $gambar = $this->upload->data('file_name');
                    $data = [
                        'nama' => $this->input->post('nama'),
                        'deskripsi' => $this->input->post('deskripsi'),
                        'gambar' => $gambar
                    ];
                    
                    $this->product->insert($data);
                    $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
                    redirect('product');
                } else {
                    $this->session->set_flashdata('error', 'File upload error: ' . $this->upload->display_errors());
                }
            }

            $this->load->view('product/create', $data);
        }

        public function edit($id) {
            $data['title'] = 'Edit Product';
            $data['aktif'] = 'Product';
            $data['product'] = $this->product->getById($id);

            if (!$data['product']) {
                $this->session->set_flashdata('error', 'Product not found.');
                redirect('product');
            }

            if($this->input->post()) {
                $update_data = [
                    'nama' => $this->input->post('nama'),
                    'deskripsi' => $this->input->post('deskripsi')
                ];

                if($_FILES['gambar']['name']) {
                    $config['upload_path'] = './assets/images/products/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    
                    $this->upload->initialize($config);
                    
                    if($this->upload->do_upload('gambar')) {
                        @unlink('./assets/images/products/'.$data['product']->gambar);
                        $update_data['gambar'] = $this->upload->data('file_name');
                    }
                }

                $this->product->update($id, $update_data);
                $this->session->set_flashdata('success', 'Data berhasil diupdate');
                redirect('product');
            }

            $this->load->view('product/edit', $data);
        }

        public function delete($id) {
            $product = $this->product->getById($id);
            if (!$product) {
                $this->session->set_flashdata('error', 'Product not found.');
                redirect('product');
            }

            @unlink('./assets/images/products/'.$product->gambar);
            $this->product->delete($id);
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('product');
        }
    }
