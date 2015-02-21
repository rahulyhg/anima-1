<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class category_model extends CI_Model
{
    public function create($name,$status,$order)
    {
        $data=array("name" => $name,"status" => $status,"order" => $order);
        $query=$this->db->insert( "anima_category", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("anima_category")->row();
        return $query;
    }
    function getsinglecategory($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("anima_category")->row();
        return $query;
    }
    public function edit($id,$name,$status,$order)
    {
        $data=array("name" => $name,"status" => $status,"order" => $order);
        $this->db->where( "id", $id );
        $query=$this->db->update( "anima_category", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `anima_category` WHERE `id`='$id'");
        return $query;
    }
    
	public function getstatusdropdown()
	{
		$status= array(
			 "1" => "Enable",
			 "0" => "Disable"
			);
		return $status;
	}
    
    public function getcategorydropdown()
	{
		$query=$this->db->query("SELECT * FROM `anima_category`  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
    public function getall()
    {
        $query=$this->db->query("SELECT * FROM `anima_category`")->result();
        return $query;
    }
}
?>
