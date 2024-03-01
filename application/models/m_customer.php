<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_customer extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('customer');
        if ($id != null) {
            $this->db->where('id_customer', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function add($post)
    {
        $params = [
            'username' => $post['username'],
            'password' => sha1($post['password']), // Hashing the password using SHA1
            'name' => $post['customer_name'],
            'gender' => $post['gender'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'pos_code' => $post['pos_code'],
        ];
        $this->db->insert('customer', $params);
    }

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get_user_by_id($user_id)
    {
        $this->db->where('id_customer', $user_id);
        return $this->db->get('customer')->row();
    }

    public function get_sales_by_customer_id($id_customer)
    {
        $this->db->where('customer_id', $id_customer);
        return $this->db->get('t_sale')->result();
    }

    public function edit($post)
    {
        // Check if a new password is provided
        if (!empty($post['password'])) {
            $password = sha1($post['password']); // Hash the new password
        } else {
            // If no new password provided, retrieve the existing password from the database
            $existingPassword = $this->db->get_where('customer', ['id_customer' => $post['id']])->row('password');
            $password = $existingPassword; // Use the existing password
        }

        // Construct the parameters for update
        $params = [
            'username' => $post['username'],
            'name' => $post['customer_name'],
            'gender' => $post['gender'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'pos_code' => $post['pos_code'],
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // print_r($params);
        // die;

        // Include the password only if a new one is provided
        if (!empty($post['password'])) {
            $params['password'] = $password;
        }

        $this->db->where('id_customer', $post['id']);
        $this->db->update('customer', $params);
    }

    public function del($id)
    {
        $this->db->where('id_customer', $id);
        $this->db->delete('customer');
    }
}
