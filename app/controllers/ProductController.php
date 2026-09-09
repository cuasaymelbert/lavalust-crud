<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: ProductController
 * 
 * Automatically generated via CLI.
 */
class ProductController extends Controller {
    public function __construct()
    {
        parent::__construct();
         $this->call->library('session');
        $this->call->helper('auth');
        
        // PROTECT ALL PRODUCT ROUTES
        check_auth();

        $this->call->model('ProductModel');
    }

    //HOMEPAGE
    public function index() {
        $data['products'] = $this->ProductModel->get_all();
        $this->call->view('products/index', $data);
    }

    //CREATE
     public function create() {
        if ($this->form_validation->submitted()) {
            $data = [
                'product_name' => $this->io->post('product_name'),
                'description'  => $this->io->post('description'),
                'price'        => $this->io->post('price'),
                'quantity'     => $this->io->post('quantity')
            ];
            $this->ProductModel->insert($data);
            redirect('products');
        }
        $this->call->view('products/create');
    }

    //EDIT
    public function edit($id) {
        check_auth();

        if ($this->form_validation->submitted()) {
            $update_data = [
                'product_name' => $this->io->post('product_name'),
                'description'  => $this->io->post('description'),
                'price'        => $this->io->post('price'),
                'quantity'     => $this->io->post('quantity')
            ];
            if ($this->ProductModel->update($id, $update_data)) {
                 redirect('products');
            }       
        }
        $data['product'] = $this->ProductModel->get_by_id($id);
        $this->call->view('products/edit', $data);
    }

    //DELETE
     public function delete($id) {
        $this->ProductModel->delete($id);
        redirect('products');
    }
}




    

   


   
