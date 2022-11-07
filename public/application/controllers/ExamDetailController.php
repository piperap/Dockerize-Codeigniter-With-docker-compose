<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamDetailController extends CI_Controller {

	/**
	 * Exam list controller, this file contains the logic to get all exam able.
	 *
	 */
	public function index($idexam)
	{
        //Load Model
		$this->load->model('examdetailmodel');

		//make an unique ID
		$user_id = md5(uniqid(rand(), true));

		//Save user
		$id_user = $this->examdetailmodel->SaveUserID($user_id);

		$this->session->set_userdata('iduser', $id_user);

		//Detail Exam details
        $data['exams_detail'] = $this->examdetailmodel->getExamInfo($idexam);

		//Print View
		$this->load->view('ExamDetailView',$data);
	}
}



?>