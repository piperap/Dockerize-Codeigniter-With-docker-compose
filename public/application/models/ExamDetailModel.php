<?php

class ExamDetailModel extends CI_Model {

public function getExamInfo($idexam)
{
    $this->db->select('*');
    $this->db->from('Exam');
    $this->db->where('idexam', $idexam );

    $query = $this->db->get();

    if ( $query->num_rows() > 0 )
    {
        $row = $query->row_array();
        return $row;
    
        foreach ($query->result() as $row)
        {
            $exams[] = $row;
           
        }


        return $exams;

    }else{

    return false;
    
    }
}


public function SaveUserID($user_id)
{

    $data = array(
        'name' => $user_id        
);

$this->db->insert('Users', $data);
$insert_id = $this->db->insert_id();
return $insert_id;

}


}

?>