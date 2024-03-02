<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function index()
	{
		check_not_login();
		$this->load->model('m_receipt');
		$this->load->model('m_user');
		$data['receipt'] = $this->m_receipt->get_data();
		$data['user'] = $this->m_user->get()->result();

		// print_r($data);
		// die();

		$this->template->load('template', 'dashboard', $data);
	}
}
