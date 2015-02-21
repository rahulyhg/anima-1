<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class news_model extends CI_Model
{
    public function create($title,$json,$image,$content)
    {
        $data=array("title" => $title,"json" => $json,"image" => $image,"content" => $content);
        $query=$this->db->insert( "anima_news", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("anima_news")->row();
        return $query;
    }
    function getsinglenews($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("anima_news")->row();
        return $query;
    }
    public function edit($id,$title,$json,$image,$content)
    {
        $data=array("title" => $title,"json" => $json,"image" => $image,"content" => $content);
        $this->db->where( "id", $id );
        $query=$this->db->update( "anima_news", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `anima_news` WHERE `id`='$id'");
        return $query;
    }
    public function getnewsimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `anima_news` WHERE `id`='$id'")->row();
		return $query;
	}
    public function getall()
    {
        $query=$this->db->query("SELECT * from `anima_news`")->result();
		return $query;
    }
}
?>
