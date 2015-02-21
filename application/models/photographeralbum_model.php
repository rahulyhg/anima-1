<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class photographeralbum_model extends CI_Model
{
    public function create($name,$order,$image,$tab,$photographer)
    {
        $data=array("name" => $name,"order" => $order,"image" => $image,"tab" => $tab,"photographer" => $photographer);
        $query=$this->db->insert( "anima_photographeralbum", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("anima_photographeralbum")->row();
        return $query;
    }
    public function viewphotographeralbum($id)
    {
        $this->db->where("photographer",$id);
        $query=$this->db->get("anima_photographeralbum")->result();
        return $query;
    }
    function getsinglephotographeralbum($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("anima_photographeralbum")->row();
        return $query;
    }
    public function edit($id,$name,$order,$image,$tab,$photographer)
    {
        $data=array("name" => $name,"order" => $order,"image" => $image,"tab" => $tab,"photographer" => $photographer);
        $this->db->where( "id", $id );
        $query=$this->db->update( "anima_photographeralbum", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `anima_photographeralbum` WHERE `id`='$id'");
        return $query;
    }
    public function getphotographeralbumimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `anima_photographeralbum` WHERE `id`='$id'")->row();
		return $query;
	}
    public function getphotographeralbumdropdown()
	{
		$query=$this->db->query("SELECT * FROM `anima_photographeralbum`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
    
    public function savephotographerorder($id,$order)
    {
        $data=array("order" => $order);
        $this->db->where( "id", $id );
        $query=$this->db->update( "photographeralbumgalleryimage", $data );
        return 1;
    }
}
?>
