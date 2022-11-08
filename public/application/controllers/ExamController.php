<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamController extends CI_Controller {


	/**
	 * Exam Logic .
	 *
	 */
	public function index()
	{
        //Load the model
        $this->load->model('examquestionsmodel');
        
        //Setting is not a final question
        $isfinal    = false;

        $isStart    = true;

        //Get Idexam Selected
        $idexam = $this->input->post('idexam');

        //Get Exam Question Limit 1 (First Question about the selected Exam)
        $Questions = $this->examquestionsmodel->getQuestions($idexam);
     
       
        $iduser = $this->session->userdata('iduser');

        //Get Total Number Question about selected exam
        $CountQuestions = $this->examquestionsmodel->getCountQuestions($idexam);
     
        
        //Get idquestion of the First Question
        $idquestion = $Questions[0]->idquestion;

        $Datauser = array(
            'idquestion'  => $idquestion,
            'idexam'     => $idexam,
            'countQuestions' => $CountQuestions        
        );
    
        $this->session->set_userdata($Datauser);


        //Get Alternatives of the First Question
        $Alternatives = $this->examquestionsmodel->getAlternative($idquestion);
       
        $AlternativeSelected = $this->examquestionsmodel->getAlternativeSelected($iduser,$idquestion,$idexam);

        $data['alternativeselected']        = $AlternativeSelected;
        $data['questions_exam']     = $Questions;
        $data['alternatives']       = $Alternatives;
        $data['idexam']             = $idexam;
        $data['idquestion']         = $idquestion;
        $data['countquestions']     = $CountQuestions;
        $data['isfinal']            = $isfinal;
        $data['isStart']            = $isStart;
        
		//$this->load->view('examview',$data);
        $this->load->view('examtestview',$data);
        //$this->load->view('clockview');
	}

    public function validate()
    {
        //Get Model
        $this->load->model('examquestionsmodel');

        //get idquestion , idexam from Session  executing
        $idquestion = $this->session->userdata('idquestion');     
        $idexam     = $this->session->userdata('idexam');   
        $isfinal    = false;
        $isStart    = false;
        //GetAnswer
        $idalternative = $this->input->post('alternative');

        //Getting Id User
        $iduser = $this->session->userdata('iduser');

        //Getting How mach there are questions
        $countquestions = $this->session->userdata('countQuestions');

            //SaveAnswer
        if(!empty($idalternative)){
         
            $this->examquestionsmodel->SaveAlternative($idquestion,$idexam,$idalternative,$iduser);
        }
        

        //GetNextQuestion
        //Gettting the next question ID
        $idquestionNOW = $idquestion + 1;

        $this->session->set_userdata('idquestion', $idquestionNOW);

        $Question     = $this->examquestionsmodel->getQuestion($idquestionNOW,$idexam);
       

        $Alternatives = $this->examquestionsmodel->getAlternative($idquestionNOW);     
       
       //Getting validate is final
       
       if($idquestionNOW == $countquestions)
       {
        $isfinal = true;
       }



       $AlternativeSelected = $this->examquestionsmodel->getAlternativeSelected($iduser,$idquestionNOW,$idexam);
        
        $data['alternativeselected']        = $AlternativeSelected;
        $data['questions_exam']             = $Question;
        $data['alternatives']               = $Alternatives;   
        $data['isfinal']                    = $isfinal;
        $data['isStart']                    = $isStart;
        $data['countquestions']             = $countquestions;
        $data['idquestion']                 = $idquestionNOW;
       
		//$this->load->view('examview',$data);
        $this->load->view('examtestview',$data);
    }




    

    public function backquestion()
    {
        //Get Model
        $this->load->model('examquestionsmodel');

        //get idquestion , idexam from Session  executing
        $idquestion = $this->session->userdata('idquestion');     
        $idexam     = $this->session->userdata('idexam');   
    
        //GetAnswer
        $idalternative = $this->input->post('alternative');
        $countquestions = $this->session->userdata('countQuestions');
        
        $isfinal    = false;
        $isStart    = false;
        
        if($idquestion == 2)
        {
            $isStart    = true; 
        }
      

        //GetNextQuestion
        //Gettting the next question ID
        $idquestionNOW = $idquestion - 1;
        //Set id in Session to Get de Question
        $this->session->set_userdata('idquestion', $idquestionNOW);
        // Getting Question
        $Question     = $this->examquestionsmodel->getQuestion($idquestionNOW,$idexam);
        // Getting Alternatives
        $Alternatives = $this->examquestionsmodel->getAlternative($idquestionNOW);     
       
        //Getting Values 
        $user_id     = $this->session->userdata('iduser');
        $QuestionId  = $idquestionNOW;
        $Examid      = $idexam;


        if(!empty($idalternative)){
            $this->examquestionsmodel->SaveAlternative($idquestion,$Examid,$idalternative,$user_id);
        }
        


        //Getting Alternative Selected
        $AlternativeSelected = $this->examquestionsmodel->getAlternativeSelected($user_id,$QuestionId,$Examid);

        $data['questions_exam']            =  $Question;
        $data['alternatives']              =  $Alternatives;   
        $data['alternativeselected']       =  $AlternativeSelected;  
        $data['isfinal']                    = $isfinal;
        $data['isStart']                    = $isStart;
        $data['countquestions']             = $countquestions;
        $data['idquestion']                 = $idquestionNOW;
        
		//$this->load->view('examview',$data);
        $this->load->view('examtestview',$data);

    }
}



?>