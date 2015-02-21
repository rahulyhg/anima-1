<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class photographervideo_model extends CI_Model
{
    public function create($photographer,$video,$order,$photographeralbum)
    {
        $data=array(
            "photographer" => $photographer,
            "video" => $video,
            "order" => $order,
            "photographeralbum" => $photographeralbum
        );
        $query=$this->db->insert( "anima_photographervideo", $data );
        $id=$this->db->insert_id();
        if(!$query)
        return  0;
        else
        return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("anima_photographervideo")->row();
        return $query;
    }
    function getsinglephotographervideo($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("anima_photographervideo")->row();
        return $query;
    }
    public function edit($id,$photographer,$video,$order,$photographeralbum)
    {
        $data=array(
            "photographer" => $photographer,
            "video" => $video,
            "order" => $order,
            "photographeralbum" => $photographeralbum
        );
        $this->db->where( "id", $id );
        $query=$this->db->update( "anima_photographervideo", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `anima_photographervideo` WHERE `id`='$id'");
        return $query;
    }
}
?>
