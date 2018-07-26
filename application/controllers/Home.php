<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('xiliari_model');
	}

	public function index($data = FALSE)
	{
		$this->load->view('public_home', $data);
	}

	public function input_order()
	{
		$input = (object) $this->input->post();
		$result = $this->xiliari_model->add_order($input);
		if ($result->success == TRUE) {
			$response = [
				'status' => TRUE,
				'message' => $result->message
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$response = [
				'status' => FALSE,
				'message' => $result->message
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}



	public function snackbar($status,$message)
	{
		return "<div id='snackbar' class='snackbar ".$status." show'>".$message."</div>".
		"<script>deleteSnackbar()</script>" ;
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */