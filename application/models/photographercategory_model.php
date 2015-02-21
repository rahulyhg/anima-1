<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class photographercategory_model extends CI_Model
{
    public function create($name,$status,$order)
    {
        $data=array("name" => $name,"status" => $status,"order" => $order);
        $query=$this->db->insert( "photographercategory", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("photographercategory")->row();
        return $query;
    }
    function getsinglephotographercategory($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("photographercategory")->row();
        return $query;
    }
    public function edit($id,$name,$status,$order)
    {
        $data=array("name" => $name,"status" => $status,"order" => $order);
        $this->db->where( "id", $id );
        $query=$this->db->update( "photographercategory", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `photographercategory` WHERE `id`='$id'");
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
    
    public function getphotographercategorydropdown()
	{
		$query=$this->db->query("SELECT * FROM `photographercategory`  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
}
?>
