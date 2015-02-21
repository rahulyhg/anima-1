<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class albumimage_model extends CI_Model
{
    public function create($name,$image,$type,$order,$photographeralbumgallery)
    {
        $data=array(
            "name" => $name,
            "image" => $image,
            "type" => $type,
            "order" => $order,
            "photographeralbumgallery" => $photographeralbumgallery
        );
        $query=$this->db->insert( "photographeralbumgalleryimage", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("photographeralbumgalleryimage")->row();
        return $query;
    }
    public function viewalbumimage($id)
    {
//        $this->db->where("photographeralbum",$id);
//        $query=$this->db->get("photographeralbumgalleryimage")->result();
        $query=$this->db->query("SELECT * FROM `photographeralbumgalleryimage` WHERE `photographeralbum`='$id' ORDER BY `order`")->result();
        return $query;
    }
    function getsinglealbumimage($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("photographeralbumgalleryimage")->row();
        return $query;
    }
    public function edit($id,$name,$image,$type,$order)
    {
        $data=array(
            "name" => $name,
            "image" => $image,
            "type" => $type,
            "order" => $order,
//            "json" => $json,
//            "photographeralbum" => $photographeralbum
        );
        $this->db->where( "id", $id );
        $query=$this->db->update( "photographeralbumgalleryimage", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `photographeralbumgalleryimage` WHERE `id`='$id'");
        return $query;
    }
    
	public function getalbumimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `photographeralbumgalleryimage` WHERE `id`='$id'")->row();
		return $query;
	}
    
    public function viewphotographeralbumgalleryimage($id)
	{
		$query=$this->db->query("SELECT * FROM `photographeralbumgalleryimage` WHERE `photographeralbumgallery`='$id' ORDER BY `order` ASC")->result();
		return $query;
	}
}
?>
