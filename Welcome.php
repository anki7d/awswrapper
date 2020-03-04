<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function upload()
	{

		$key = ""; // key 
		$secret = ""; // secret

		$this->load->library('aws');

		$this->aws->set_auth_keys($key, $secret, 'us-east-1');

		$this->aws->process_aws_auth();

		$data = $this->aws->upload_s3_obj(
			'wimtestbhav',
			$filcontent = 'test',
			'/storage/dump.txt'
		);

		print_r($data);

		$data = $this->aws->copy_s3_obj(
			'wimtestbhav',
			$filcontent = 'test',
			'/storage/dump.txt'
		);

		print_r($data);

		$data = $this->aws->delete_s3_obj(
			'wimtestbhav',
			'/storage/dump.txt'
		);

		print_r($data);
	}
}
