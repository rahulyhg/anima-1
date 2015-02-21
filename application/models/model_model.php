<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class model_model extends CI_Model
{
    public function create($name,$json,$image,$category,$bio)
    {
        $data=array(
            "name" => $name,
            "json" => $json,
            "category" => $category,
            "bio" => $bio,
            "image" => $image
        );
        $query=$this->db->insert( "anima_model", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("anima_model")->row();
        return $query;
    }
    function getsinglemodel($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("anima_model")->row();
        return $query;
    }
    public function edit($id,$name,$json,$image,$category,$bio)
    {
        $data=array(
            "name" => $name,
            "json" => $json,
            "category" => $category,
            "bio" => $bio,
            "image" => $image
        );
        $this->db->where( "id", $id );
        $query=$this->db->update( "anima_model", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `anima_model` WHERE `id`='$id'");
        return $query;
    }
    public function getmodelimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `anima_model` WHERE `id`='$id'")->row();
		return $query;
	}
    public function getmodeldropdown()
	{
		$query=$this->db->query("SELECT * FROM `anima_model`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
    
	public function gettypedropdown()
	{
		$status= array(
			 "1" => "Horizontal",
			 "0" => "Verticle"
			);
		return $status;
	}
    
    public function saveorder($id,$order)
    {
        $data=array("order" => $order);
        $this->db->where( "id", $id );
        $query=$this->db->update( "anima_albumimage", $data );
        return 1;
    }
    public function savemodelorder($id,$order)
    {
        $data=array("order" => $order);
        $this->db->where( "id", $id );
        $query=$this->db->update( "modelgalleryimage", $data );
        return 1;
    }
    public function viewmodelimage($id)
    {
        $query=$this->db->query("SELECT * FROM `anima_modelimage` WHERE `model`='$id' ORDER BY `order`")->result();
        return $query;
    }
    public function viewmodelgallery($id)
    {
        $query=$this->db->query("SELECT * FROM `modelgallery` WHERE `model`='$id' ORDER BY `order`")->result();
        return $query;
    }
    public function getmodel1()
    {
        $query=$this->db->query("SELECT * FROM `anima_model` ORDER BY `id` LIMIT 0,10")->result();
        return $query;
    }
    public function getmodel2()
    {
        $query=$this->db->query("SELECT * FROM `anima_model` ORDER BY `id` LIMIT 10,10")->result();
        return $query;
    }
    public function getmodel3()
    {
        $query=$this->db->query("SELECT * FROM `anima_model` ORDER BY `id` LIMIT 20,10")->result();
        return $query;
    }
    public function females_in_town()
    {
        $query=$this->db->query("SELECT * FROM `anima_model` ORDER BY `id`")->result();
        return $query;
    }
    
    public function getmodeldetails($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("anima_model")->row();
        return $query;
    }
    public function getmodelimages($id)
    {
        $query=$this->db->query("SELECT `anima_modelimage`.`id`, `anima_modelimage`.`name`, `anima_modelimage`.`image`, `anima_modelimage`.`type`, `anima_modelimage`.`order`, `anima_modelimage`.`json`, `anima_modelimage`.`model` 
FROM `anima_modelimage` 
WHERE `anima_modelimage`.`model`='$id'
ORDER BY `anima_modelimage`.`order`")->result();
        return $query;
    }
    public function getmodelvideos($id)
    {
        $query=$this->db->query("SELECT `anima_modelvideo`.`id`, `anima_modelvideo`.`model`, `anima_modelvideo`.`video`, `anima_modelvideo`.`order` 
FROM `anima_modelvideo` 
WHERE `anima_modelvideo`.`model`='$id'
ORDER BY `anima_modelvideo`.`order`")->result();
        return $query;
    }
}
?>
