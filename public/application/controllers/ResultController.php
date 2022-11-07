<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResultController extends CI_Controller {

	/**
	 * Exam list controller, this file contains the logic to get all exam able.
	 *
	 */
	public function index()
	{
        //Load Model
		$this->load->model('resultmodel');
         //Get Model
         $this->load->model('examquestionsmodel');

         //get idquestion , idexam from Session  executing
         $idquestion = $this->session->userdata('idquestion');     
         $idexam     = $this->session->userdata('idexam');          
         //GetAnswer
         $idalternative = $this->input->post('alternative'); 
         //Getting Id User
         $iduser = $this->session->userdata('iduser');
         $total_questions    = $this->session->userdata('countQuestions');
         
      
 
         //SaveAnswer
         if(!empty($idalternative)){
         
         $this->examquestionsmodel->SaveAlternative($idquestion,$idexam,$idalternative,$iduser);
        }
      

        $corrects_answers = $this->resultmodel->getCorrects($iduser);
      
        $total = (100 * $corrects_answers)/$total_questions;
      
    
        $data['total'] =  $total;


		//Print View
		$this->load->view('ResultView',$data);
	}
}



?>