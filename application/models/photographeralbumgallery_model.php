<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class photographeralbumgallery_model extends CI_Model
{
    public function create($photographeralbum,$image,$title,$order)
    {
        $data=array(
            "photographeralbum" => $photographeralbum,
            "image" => $image,
            "title" => $title,
            "order" => $order
        );
        $query=$this->db->insert( "photographeralbumgallery", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("photographeralbumgallery")->row();
        return $query;
    }
    function getsinglephotographeralbumgallery($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("photographeralbumgallery")->row();
        return $query;
    }
    public function edit($id,$photographeralbum,$image,$title,$order)
    {
        $data=array(
            "photographeralbum" => $photographeralbum,
            "image" => $image,
            "title" => $title,
            "order" => $order
        );
        $this->db->where( "id", $id );
        $query=$this->db->update( "photographeralbumgallery", $data );
        return 1;
    }
    public function deletephotographeralbumgallery($id)
    {
        $query=$this->db->query("DELETE FROM `photographeralbumgallery` WHERE `id`='$id'");
        return $query;
    }
    
    public function getphotographeralbumgalleryimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `photographeralbumgallery` WHERE `id`='$id'")->row();
		return $query;
	}
    
	function viewphotographeralbumgallerybyphotographeralbum($id)
	{
		$query="SELECT `photographeralbumgallery`.`id`,`photographeralbumgallery`.`title`,`photographeralbumgallery`.`photographeralbum`, `photographeralbumgallery`.`image`, `anima_photographeralbum`.`name` AS `photographeralbumname`
        FROM `photographeralbumgallery` LEFT OUTER JOIN `anima_photographeralbum` ON `anima_photographeralbum`.`id`=`photographeralbumgallery`.`photographeralbum` WHERE `photographeralbumgallery`.`photographeralbum`='$id'";
        $result=$this->db->query($query)->result();
        
        return $result;
        
//		return $query;
	}
    public function getalbumbygallery($id)
    {
        $query=$this->db->query("SELECT * FROM `photographeralbumgallery` WHERE `photographeralbum`='$id'")->result();
        return $query;
    }
    
    public function getallimagesbyalbum($id)
    {
        $query=$this->db->query("SELECT * 
FROM  `photographeralbumgalleryimage` WHERE `photographeralbumgallery`='$id'")->result();
        return $query;
    }
    public function getsubcategoryandartist($id)
    {
        $query=$this->db->query("SELECT `anima_photographeralbum`.`id` as `subcatid`,`anima_photographeralbum`.`name` as `subcatname`,`anima_photographer`.`id` as `artistid`,`anima_photographer`.`name` as `artistname` FROM `photographeralbumgallery` INNER JOIN  `anima_photographeralbum` ON `anima_photographeralbum`.`id`=`photographeralbumgallery`.`photographeralbum` INNER JOIN `anima_photographer` ON `anima_photographer`.`id`=`anima_photographeralbum`.`photographer` WHERE `photographeralbumgallery`.`id`='$id'")->row();
        return $query;
    }
        
}
?>
