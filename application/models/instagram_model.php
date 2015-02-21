<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class instagram_model extends CI_Model
{
    public function create($image,$url,$status,$user,$likes)
    {
        $data=array("image" => $image,"url" => $url,"status" => $status,"user" => $user,"likes" => $likes);
        $query=$this->db->insert( "anima_instagram", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("anima_instagram")->row();
        return $query;
    }
    function getsingleinstagram($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("anima_instagram")->row();
        return $query;
    }
    public function edit($id,$image,$url,$status,$user,$likes)
    {
        $data=array("image" => $image,"url" => $url,"status" => $status,"user" => $user,"likes" => $likes);
        $this->db->where( "id", $id );
        $query=$this->db->update( "anima_instagram", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `anima_instagram` WHERE `id`='$id'");
        return $query;
    }
    
	public function getinstagramimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `anima_instagram` WHERE `id`='$id'")->row();
		return $query;
	}
}
?>
