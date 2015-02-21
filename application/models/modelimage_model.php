<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class modelimage_model extends CI_Model
{
    public function create($name,$image,$type,$order,$json,$modelgalleryid)
    {
        $data=array(
            "name" => $name,
            "image" => $image,
            "type" => $type,
            "order" => $order,
//            "json" => $json,
            "modelgallery" => $modelgalleryid
        );
        $query=$this->db->insert( "modelgalleryimage", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function createold($name,$image,$type,$order,$json,$modelid)
    {
        $data=array("name" => $name,"image" => $image,"type" => $type,"order" => $order,"json" => $json,"model" => $modelid);
        $query=$this->db->insert( "anima_modelimage", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("modelgalleryimage")->row();
        return $query;
    }
    public function beforeeditold($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("anima_modelimage")->row();
        return $query;
    }
    function getsinglemodelimage($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("anima_modelimage")->row();
        return $query;
    }
    function getmodelgalleryimagebyid($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("modelgalleryimage")->row();
        return $query;
    }
    public function edit($id,$name,$image,$type,$order,$json)
    {
        $data=array(
            "name" => $name,
            "image" => $image,
            "type" => $type,
            "order" => $order,
//            "json" => $json,
//            "modelgallery" => $modelgalleryid
        );
        $this->db->where( "id", $id );
        $query=$this->db->update( "modelgalleryimage", $data );
        return 1;
    }
    public function editold($id,$name,$image,$type,$order,$json)
    {
        $data=array("name" => $name,"image" => $image,"type" => $type,"order" => $order,"json" => $json);
        $this->db->where( "id", $id );
        $query=$this->db->update( "anima_modelimage", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `modelgalleryimage` WHERE `id`='$id'");
        return $query;
    }
    public function deleteold($id)
    {
        $query=$this->db->query("DELETE FROM `anima_modelimage` WHERE `id`='$id'");
        return $query;
    }
    
    public function viewmodelgalleryimage($id)
	{
		$query=$this->db->query("SELECT * FROM `modelgalleryimage` WHERE `modelgallery`='$id' ORDER BY `order` ASC")->result();
		return $query;
	}
}
?>
