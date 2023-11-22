<?php 

class CalendarModel extends CI_Model
{
    public function all($month)
    {
        $this->db->select("*");
        $this->db->where("MONTH(date)",$month);
        return $this->db->get("events")->result_array();
        // print_r($event);
        // die;
    }
}

?>