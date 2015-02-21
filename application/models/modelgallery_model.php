<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class modelgallery_model extends CI_Model
{
    public function create($model,$image,$title,$order)
    {
        $data=array(
            "model" => $model,
            "image" => $image,
            "title" => $title,
            "order" => $order
        );
        $query=$this->db->insert( "modelgallery", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("modelgallery")->row();
        return $query;
    }
    function getsinglemodelgallery($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("modelgallery")->row();
        return $query;
    }
    public function edit($id,$model,$image,$title,$order)
    {
        $data=array(
            "model" => $model,
            "image" => $image,
            "title" => $title,
            "order" => $order
        );
        $this->db->where( "id", $id );
        $query=$this->db->update( "modelgallery", $data );
        return 1;
    }
    public function deletemodelgallery($id)
    {
        $query=$this->db->query("DELETE FROM `modelgallery` WHERE `id`='$id'");
        return $query;
    }
    
    public function getmodelgalleryimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `modelgallery` WHERE `id`='$id'")->row();
		return $query;
	}
    
	function viewmodelgallerybymodel($id)
	{
		$query="SELECT `modelgallery`.`id`,`modelgallery`.`model`, `modelgallery`.`image`, `anima_model`.`name` AS `modelname`
        FROM `modelgallery` LEFT OUTER JOIN `anima_model` ON `anima_model`.`id`=`modelgallery`.`model` WHERE `modelgallery`.`model`='$id'";
        $result=$this->db->query($query)->result();
        
        return $result;
        
//		return $query;
	}
}
?>
