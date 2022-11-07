<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamsListController extends CI_Controller {

	/**
	 * Exam list controller, this file contains the logic to get all exam able.
	 *
	 */
	public function index()
	{

        $this->load->model('examslistmodel');

        $data['exams'] = $this->examslistmodel->getExams();
     
        
		$this->load->view('ExamsListView',$data);
	}
}
