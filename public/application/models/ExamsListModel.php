<?php

class ExamsListModel extends CI_Model {

public function getExams()
{
     
        $query = $this->db->get('Exam');

        foreach ($query->result() as $row)
        {
            $exams[] = $row;
           
        }


        return $exams;
}




}

?>