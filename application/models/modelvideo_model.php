<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class modelvideo_model extends CI_Model
{
public function create($model,$video,$order)
{
$data=array("model" => $model,"video" => $video,"order" => $order);
$query=$this->db->insert( "anima_modelvideo", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("anima_modelvideo")->row();
return $query;
}
function getsinglemodelvideo($id){
$this->db->where("id",$id);
$query=$this->db->get("anima_modelvideo")->row();
return $query;
}
public function edit($id,$model,$video,$order)
{
$data=array("model" => $model,"video" => $video,"order" => $order);
$this->db->where( "id", $id );
$query=$this->db->update( "anima_modelvideo", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `anima_modelvideo` WHERE `id`='$id'");
return $query;
}
}
?>
