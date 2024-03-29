<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_item');
        $this->load->library('session');
    }

    public function index()
    {
        // Load other necessary data for the home page
        $data['items'] = $this->m_item->get_datatables();
        $this->templatefront->load('frontend/templatefront', 'frontend/home', $data);
    }

    public function product($page = 1)
    {
        $this->load->library('pagination');
        $this->load->library('pagination');
        $this->load->model('m_product');

        // Configuration for pagination
        $config = array();
        $config["base_url"] = base_url() . "home/product/1";
        $config["total_rows"] = $this->m_product->get_total_items(); // Implement this method in your model
        $config["per_page"] = 9;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        if (!is_numeric($page) || $page < 1) {
            $page = 1;
        }

        $data["items"] = $this->m_product->get_items($config["per_page"], $page); // Implement this method in your model
        $data["links"] = $this->pagination->create_links();

        $this->templatefront->load('frontend/templatefront', 'frontend/product', $data);
    }

    public function search()
    {
        $this->load->library('pagination');
        $this->load->model('m_product');
        $search_term = $this->input->post('search');
        // var_dump($search_term);
        // die;
        $data['links'] = $this->pagination->create_links();
        $data['items'] = $this->m_product->search_items($search_term);
        $this->templatefront->load('frontend/templatefront', 'frontend/product', $data);
    }


    public function product_detail($id)
    {
        // Fetch item details based on $id from your model
        $query_result = $this->m_item->get($id);

        // Check if there are any rows returned
        if ($query_result->num_rows() == 1) {
            // Fetch the single row as an object
            $item = $query_result->row();

            // Pass item details to the view
            $data['item'] = $item;
            $this->templatefront->load('frontend/templatefront', 'frontend/product_detail', $data);
        } else {
            // Handle case where item with given ID is not found, such as showing a 404 page
            show_404();
        }
    }


    public function about()
    {
        $this->load->model('m_aboutc');
        $data['row'] = $this->m_aboutc->get();
        // print_r($data);
        // die;
        $this->templatefront->load('frontend/templatefront', 'frontend/about', $data);
    }
    public function contact()
    {
        $this->templatefront->load('frontend/templatefront', 'frontend/contact');
    }
    public function user()
    {
        check_frontend_not_login();

        // Load necessary models and libraries
        $this->load->model('m_sale');
        $this->load->model('m_customer');

        // Check if user is logged in
        if (!$this->session->userdata('id_customer')) {
            redirect('home');
        }

        // Get user's information
        $id_customer = $this->session->userdata('id_customer');
        $data['cust'] = $this->m_customer->get_user_by_id($id_customer);

        // Get user's delivery history
        $data['sales'] = $this->m_customer->get_sales_by_customer_id($id_customer);

        // Load the user profile view with data
        $this->templatefront->load('frontend/templatefront', 'frontend/user', $data);
    }

    public function custedit()
    {
        check_frontend_not_login();

        $this->load->library('form_validation');

        $this->form_validation->set_rules('customer_name', 'Customer Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('pos_code', 'Pos Code', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');

        // If password field is not empty, apply validation rules
        if (!empty($this->input->post('password'))) {
            $this->form_validation->set_rules('password', 'Password', 'trim|min_length[5]|max_length[15]');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message1', '<div class="alert alert-dismissible fade show alert-danger" role="alert">Profile update failed. Please check the form and try again.</div>');
            // print_r('');
            // die;
            redirect('home/user');
        } else {
            // Validation passed, proceed with updating the profile
            $this->load->model('m_customer');
            $post = $this->input->post(null, true);
            $this->m_customer->edit($post);
            $this->session->set_flashdata('message1', '<div class="alert alert-dismissible fade show alert-success" role="alert">Profile update successfully</div>');
            redirect('home/user');
        }
    }

    public function view_cart()
    {
        check_frontend_not_login();

        $this->load->model('m_cart');
        $this->load->library('cart');

        $data['cart_items'] = $this->m_cart->get_cart_items();

        // Load the view with cart data
        $this->templatefront->load('frontend/templatefront', 'frontend/cart', $data);
    }

    public function add_cart()
    {
        $this->load->library('cart');
        $this->load->model('m_cart');

        $id = $this->input->post('id_item');
        $qty = $this->input->post('qty');

        $item = $this->m_cart->lihat_barang($this->input->post('iditem'));
        if ($item->total > 100) {
            $this->session->set_flashdata('message1', '<div class="alert alert-dismissible fade show alert-success" role="alert">Stok Barang melebihi kapasitas</div>');
            redirect(base_url('home/product'));
            return;
        } else {
            $result = $this->m_cart->cart($id);
            $data = array(
                'id'      => $result->id_item,
                'image'   => $result->image,
                'qty'     => $qty,
                'price'   => $result->price,
                'name'    => $result->name,
                'barcode' => $result->barcode,
                'stock'   => $result->stock,
            );

            // echo "Data to be inserted into cart:";
            // echo "<pre>";
            // print_r($data);
            // echo "<pre>";
            // die;

            $this->cart->insert($data);

            $this->session->set_userdata('cart_contents', $this->cart->contents());

            $sessionCartContents = $this->session->userdata('cart_contents');
            echo "Cart contents from session after setting:";
            echo "<pre>";
            print_r($sessionCartContents);

            $_SESSION['direct_cart_contents'] = $this->cart->contents();
            $directSessionCartContents = $_SESSION['direct_cart_contents'];
            echo "Direct cart contents from session:";
            echo "<pre>";
            print_r($directSessionCartContents);

            $totalcartcontent = $this->cart->total();
            echo "Total:";
            echo "<pre>";
            print_r($totalcartcontent);

            // die();
            redirect(base_url('home/view_cart'));
        }
    }

    function hapus_cart($row)
    {
        check_frontend_not_login();

        $this->load->library('cart');
        $data = array(
            'rowid' => $row,
            'qty'   => 0,
        );

        // print_r($data);
        // die();
        $this->cart->update($data);
        redirect(base_url('home/view_cart'));
    }

    public function checkout()
    {
        check_frontend_not_login();

        $this->load->model('m_customer');
        $this->load->library('cart');
        $this->load->model('m_cart');
        $data = array();

        $id_customer = $this->session->userdata('id_customer');
        $data['cust'] = $this->m_customer->get_user_by_id($id_customer);

        $this->templatefront->load('frontend/templatefront', 'frontend/checkout', $data);
    }

    function transaction()
    {
        check_frontend_not_login();

        $this->load->library('cart');
        $this->load->model('m_cart');

        $invoice = $this->m_cart->invoice_no();

        $payment = array(
            'invoice' => $invoice,
            'customer_id' => $this->input->post('customer_id'),
            'customer_name' => $this->input->post('customer_name'),
            'total_early' => $this->input->post('total_early'),
            'total_final' => 0,
            'discount' => 0,
            'cash' => 0,
            'ongkos' => 0,
            'remain' => 0,
            'note' => $this->input->post('note'),
            'accepted' => 'no',
            'delivery' => 'yes',
            'receiver' => $this->input->post('receiver'),
            'receiver_phone' => $this->input->post('phone'),
            'address' => $this->input->post('address'),
            'pos_code' => $this->input->post('pos_code'),
            'date_tf' => date('Y-m-d'),
            'hour_tf' => date('H:i:s')
        );

        // echo '<pre>';
        // print_r($payment);
        // echo '</pre>';

        // die();

        if ($payment['cash'] < $payment['total_final']) {
            $this->session->set_flashdata('message1', '<div class="alert alert-dismissible fade show alert-danger" role="alert">Cash provided cannot be less than the total amount.</div>');
            redirect(base_url('home/user'));
        }

        $detail_penjualan =  $this->m_cart->tambah_trf($payment); //tambah data ke tabel m_cart
        $id_sale = $this->m_cart->get_id($invoice); //ambil id

        $pjl = array();
        foreach ($this->cart->contents() as $q) {
            $pjl[] = array(
                'id_item' => $q['id'],
                'stock' => intval($this->m_cart->total_barang($q['id'])->row()->total) - intval($q['qty'])
            );
        }

        // echo '<pre>';
        // print_r($pjl);
        // echo '</pre>';

        // die();

        foreach ($this->cart->contents() as $items) {
            $penjualan[] = array(
                'id_sale'           => $id_sale['id_sale'],
                'id_item'           => $items['id'],
                'qty'             => $items['qty'],
                'price'             => $items['price'],
                'sub_total'         => $items['subtotal']
            );
        }

        // echo '<pre>';
        // print_r($penjualan);
        // echo '</pre>';

        // die();

        $png = $this->m_cart->pengurangan_stok($pjl); //update batch di tabel stok
        $pjl = $this->m_cart->tambah_pjl($penjualan); //tambah data ke tabel penjualan
        if (!$detail_penjualan && !$pjl && !$png) {
            $this->cart->destroy();
            $this->session->set_flashdata('message1', '<div class="alert alert-dismissible fade show alert-success" role="alert">Transaction Success!</div>');
            redirect('home/user');
        } else {
            $this->session->set_flashdata('message1', '<div class="alert alert-dismissible fade show alert-danger" role="alert">Ooopss! Transaction Error, But Stock is Changed.</div>');
            redirect(base_url('home/user'));
        }
    }

    public function detail_receipt()
    {
        check_frontend_not_login();

        // Load necessary models and libraries
        $this->load->model('m_sale');

        // Retrieve the ID of the currently logged-in customer from the session
        $logged_in_customer_id = $this->session->userdata('id_customer');

        // print_r('login user id :' . $logged_in_customer_id);
        // die;

        // Retrieve the transaction details using the URI segment
        $transaction_id = $this->uri->segment(3);
        $transaction_details = $this->m_sale->cek_transaksi($transaction_id);

        // Check if the transaction exists and the logged-in customer matches the customer associated with the transaction
        if (!empty($transaction_details) && $transaction_details[0]->customer_id == $logged_in_customer_id) {
            // If the conditions are met, prepare the data for the view
            $data = array(
                'id_cust' => $transaction_details[0]->customer_id,
                'date' => $transaction_details[0]->date_tf,
                'hour' => $transaction_details[0]->hour_tf,
                'invoice' => $transaction_details[0]->invoice,
                'customer' => $transaction_details[0]->customer_name,
                'acc' => $transaction_details[0]->accepted,
                'expedition' => $transaction_details[0]->expedition,
                'receiver' => $transaction_details[0]->receiver,
                'resi' => $transaction_details[0]->no_resi,
                'total_early' => $transaction_details[0]->total_early,
                'discount' => $transaction_details[0]->discount,
                'ongkos' => $transaction_details[0]->ongkos,
                'total_final' => $transaction_details[0]->total_final,
                'result' => $transaction_details,
                'cash' => $transaction_details[0]->cash,
                'note' => $transaction_details[0]->note,
                'remain' => $transaction_details[0]->remain
            );
            // Load the view with the prepared data
            $this->templatefront->load('frontend/templatefront', 'frontend/receipt_detail', $data);
        } else {
            // If the transaction doesn't exist or the logged-in customer doesn't match, redirect or show an error message
            // Redirect or show error message as per your application's logic
            redirect('home'); // Redirect to home page for example
        }
    }
}
