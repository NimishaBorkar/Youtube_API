<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxsearch extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('ajaxsearch_model');
	   }
	function index()
	{
		$this->load->view('ajaxsearch');
	}
	function fetch()
	{
		$API_KEY = $this->ajaxsearch_model->fetch_data();
		echo ($API_KEY);exit;
	}
}
