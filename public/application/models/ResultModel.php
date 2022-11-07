<?php

class ResultModel extends CI_Model {

public function getCorrects($user_id)
{



    $this->db->select('COUNT(CASE WHEN b.Correct = 1 then 1 ELSE NULL END) as "Correct"');
    $this->db->from('Answers a');
    $this->db->join('Alternatives b', 'a.alternative_id = b.idalternative');
    $this->db->where('a.user_id', $user_id );

    $query = $this->db->get();

    if ( $query->num_rows() > 0 )
    {
       

            
        $row = $query->row();
        return $row->Correct;      
  
    
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