<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class article_model extends CI_Model
{
    public function create($title,$json,$content)
    {
        $data=array("title" => $title,"json" => $json,"content" => $content);
        $query=$this->db->insert( "anima_article", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("anima_article")->row();
        return $query;
    }
    function getsinglearticle($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("anima_article")->row();
        return $query;
    }
    public function edit($id,$title,$json,$content)
    {
        $data=array("title" => $title,"json" => $json,"content" => $content);
        $this->db->where( "id", $id );
        $query=$this->db->update( "anima_article", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `anima_article` WHERE `id`='$id'");
        return $query;
    }
}
?>
