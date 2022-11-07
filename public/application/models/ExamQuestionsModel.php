<?php

class ExamQuestionsModel extends CI_Model {

public function getQuestions($idexam)
{
    
    $this->db->select('*');
    $this->db->from('Questions');
    $this->db->where('id_exam', $idexam );
    $this->db->limit(1); 
    $query = $this->db->get();

    if ( $query->num_rows() > 0 )
    {
            
        foreach ($query->result() as $row)
        {
            $questions[] = $row;
           
        }


        return $questions;

    }else{

    return false;
    
    }
}

public function getQuestion($idquestion,$idexam)
{
    $this->db->select('*');
    $this->db->from('Questions');
    $this->db->where('idquestion', $idquestion );
    $this->db->where('id_exam', $idexam );

    $query = $this->db->get();

    if ( $query->num_rows() > 0 )
    {
       
    
        foreach ($query->result() as $row)
        {
            $questions[] = $row;
           
        }


        return $questions;

    }else{

    return false;
    
    }
}


public function SaveAlternative($idquestion,$idexam,$idalternative,$user_id)
{


    //Getting info If registry exists
    $this->db->select('*');
    $this->db->from('Answers');
    $this->db->where('user_id', $user_id );
    $this->db->where('question_id', $idquestion );
   
   

    $query = $this->db->get();
    
    if ( $query->num_rows() > 0 ) 
{



    $data = array(
        'alternative_id' => $idalternative
);
   $this->db->where('user_id',$user_id);
   $this->db->where('question_id',$idquestion);
   $this->db->update('Answers',$data);


} else {


    $data = array(
        'exam_id' => $idexam,
        'question_id' => $idquestion,
        'alternative_id' => $idalternative,
        'user_id' => $user_id
);

$this->db->insert('Answers', $data);

}

}

public function getAlternative($idquestion)
{
    $this->db->select('*');
    $this->db->from('Alternatives');
    $this->db->where('Question_id', $idquestion );

    $query = $this->db->get();

    if ( $query->num_rows() > 0 )
    {
     
    
        foreach ($query->result() as $row)
        {
            
            $alternatives[] = $row;
           
        }

        return $alternatives;

    }else{

    return false;
    
    }
}


public function getCountQuestions($idexam)
{

    $this->db->select('*');
    $this->db->from('Questions');
    $this->db->where('id_exam', $idexam );

    $query = $this->db->get();

    return $query->num_rows();
    


}



public function getAlternativeSelected($user_id,$QuestionId,$Examid)
{

    $this->db->select('alternative_id');
    $this->db->from('Answers');
    $this->db->where('user_id', $user_id );
    $this->db->where('question_id', $QuestionId );
    $this->db->where('exam_id', $Examid );
    $this->db->limit(1); 
    $query = $this->db->get();

    if ( $query->num_rows() > 0 )
    {  
    
        $row = $query->row();
        return $row->alternative_id;


      
    }else{

    return 0;
    
    }


}



}

?>