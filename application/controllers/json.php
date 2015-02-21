<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
class Json extends CI_Controller 
{function getallinstagram()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`anima_instagram`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`anima_instagram`.`image`";
$elements[1]->sort="1";
$elements[1]->header="Image";
$elements[1]->alias="image";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`anima_instagram`.`url`";
$elements[2]->sort="1";
$elements[2]->header="URL";
$elements[2]->alias="url";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`anima_instagram`.`status`";
$elements[3]->sort="1";
$elements[3]->header="Status";
$elements[3]->alias="status";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`anima_instagram`.`user`";
$elements[4]->sort="1";
$elements[4]->header="User";
$elements[4]->alias="user";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`anima_instagram`.`likes`";
$elements[5]->sort="1";
$elements[5]->header="Likes";
$elements[5]->alias="likes";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `anima_instagram`");
$this->load->view("json",$data);
}
public function getsingleinstagram()
{
$id=$this->input->get_post("id");
$data["message"]=$this->instagram_model->getsingleinstagram($id);
$this->load->view("json",$data);
}
function getallnews()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`anima_news`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`anima_news`.`title`";
$elements[1]->sort="1";
$elements[1]->header="Title";
$elements[1]->alias="title";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`anima_news`.`json`";
$elements[2]->sort="1";
$elements[2]->header="Json";
$elements[2]->alias="json";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`anima_news`.`image`";
$elements[3]->sort="1";
$elements[3]->header="Image";
$elements[3]->alias="image";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`anima_news`.`content`";
$elements[4]->sort="1";
$elements[4]->header="Content";
$elements[4]->alias="content";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `anima_news`");
$this->load->view("json",$data);
}
public function getsinglenews()
{
$id=$this->input->get_post("id");
$data["message"]=$this->news_model->getsinglenews($id);
$this->load->view("json",$data);
}
function getallcategory()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`anima_category`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`anima_category`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`anima_category`.`status`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`anima_category`.`order`";
$elements[3]->sort="1";
$elements[3]->header="Order";
$elements[3]->alias="order";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `anima_category`");
$this->load->view("json",$data);
}
public function getsinglecategory()
{
$id=$this->input->get_post("id");
$data["message"]=$this->category_model->getsinglecategory($id);
$this->load->view("json",$data);
}
function getallmodel()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`anima_model`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`anima_model`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`anima_model`.`json`";
$elements[2]->sort="1";
$elements[2]->header="Json";
$elements[2]->alias="json";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`anima_model`.`image`";
$elements[3]->sort="1";
$elements[3]->header="Image";
$elements[3]->alias="image";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `anima_model`");
$this->load->view("json",$data);
}
public function getsinglemodel()
{
$id=$this->input->get_post("id");
$data["message"]=$this->model_model->getsinglemodel($id);
$this->load->view("json",$data);
}
function getallmodelimage()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`anima_modelimage`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`anima_modelimage`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`anima_modelimage`.`image`";
$elements[2]->sort="1";
$elements[2]->header="Image";
$elements[2]->alias="image";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`anima_modelimage`.`type`";
$elements[3]->sort="1";
$elements[3]->header="Type";
$elements[3]->alias="type";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`anima_modelimage`.`order`";
$elements[4]->sort="1";
$elements[4]->header="Order";
$elements[4]->alias="order";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`anima_modelimage`.`json`";
$elements[5]->sort="1";
$elements[5]->header="Json";
$elements[5]->alias="json";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `anima_modelimage`");
$this->load->view("json",$data);
}
public function getsinglemodelimage()
{
$id=$this->input->get_post("id");
$data["message"]=$this->modelimage_model->getsinglemodelimage($id);
$this->load->view("json",$data);
}
function getallmodelvideo()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`anima_modelvideo`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`anima_modelvideo`.`model`";
$elements[1]->sort="1";
$elements[1]->header="Model";
$elements[1]->alias="model";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`anima_modelvideo`.`video`";
$elements[2]->sort="1";
$elements[2]->header="Video";
$elements[2]->alias="video";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`anima_modelvideo`.`order`";
$elements[3]->sort="1";
$elements[3]->header="Order";
$elements[3]->alias="order";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `anima_modelvideo`");
$this->load->view("json",$data);
}
public function getsinglemodelvideo()
{
$id=$this->input->get_post("id");
$data["message"]=$this->modelvideo_model->getsinglemodelvideo($id);
$this->load->view("json",$data);
}
function getallphotographer()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`anima_photographer`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`anima_photographer`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`anima_photographer`.`city`";
$elements[2]->sort="1";
$elements[2]->header="City";
$elements[2]->alias="city";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`anima_photographer`.`order`";
$elements[3]->sort="1";
$elements[3]->header="Order";
$elements[3]->alias="order";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`anima_photographer`.`content`";
$elements[4]->sort="1";
$elements[4]->header="Content";
$elements[4]->alias="content";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `anima_photographer`");
$this->load->view("json",$data);
}
public function getsinglephotographer()
{
$id=$this->input->get_post("id");
$data["message"]=$this->photographer_model->getsinglephotographer($id);
$this->load->view("json",$data);
}
function getallphotographeralbum()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`anima_photographeralbum`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`anima_photographeralbum`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`anima_photographeralbum`.`order`";
$elements[2]->sort="1";
$elements[2]->header="Order";
$elements[2]->alias="order";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`anima_photographeralbum`.`image`";
$elements[3]->sort="1";
$elements[3]->header="Image";
$elements[3]->alias="image";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`anima_photographeralbum`.`tab`";
$elements[4]->sort="1";
$elements[4]->header="Tab";
$elements[4]->alias="tab";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`anima_photographeralbum`.`photographer`";
$elements[5]->sort="1";
$elements[5]->header="Photographer";
$elements[5]->alias="photographer";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `anima_photographeralbum`");
$this->load->view("json",$data);
}
public function getsinglephotographeralbum()
{
$id=$this->input->get_post("id");
$data["message"]=$this->photographeralbum_model->getsinglephotographeralbum($id);
$this->load->view("json",$data);
}
function getallalbumimage()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`anima_albumimage`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`anima_albumimage`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`anima_albumimage`.`image`";
$elements[2]->sort="1";
$elements[2]->header="Image";
$elements[2]->alias="image";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`anima_albumimage`.`type`";
$elements[3]->sort="1";
$elements[3]->header="Type";
$elements[3]->alias="type";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`anima_albumimage`.`order`";
$elements[4]->sort="1";
$elements[4]->header="Order";
$elements[4]->alias="order";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`anima_albumimage`.`json`";
$elements[5]->sort="1";
$elements[5]->header="Json";
$elements[5]->alias="json";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`anima_albumimage`.`photographeralbum`";
$elements[6]->sort="1";
$elements[6]->header="Photographer Album";
$elements[6]->alias="photographeralbum";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `anima_albumimage`");
$this->load->view("json",$data);
}
public function getsinglealbumimage()
{
$id=$this->input->get_post("id");
$data["message"]=$this->albumimage_model->getsinglealbumimage($id);
$this->load->view("json",$data);
}
function getallphotographervideo()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`anima_photographervideo`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`anima_photographervideo`.`photographer`";
$elements[1]->sort="1";
$elements[1]->header="Photographer";
$elements[1]->alias="photographer";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`anima_photographervideo`.`video`";
$elements[2]->sort="1";
$elements[2]->header="Video";
$elements[2]->alias="video";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`anima_photographervideo`.`order`";
$elements[3]->sort="1";
$elements[3]->header="Order";
$elements[3]->alias="order";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`anima_photographervideo`.`photographeralbum`";
$elements[4]->sort="1";
$elements[4]->header="Photographer Album";
$elements[4]->alias="photographeralbum";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `anima_photographervideo`");
$this->load->view("json",$data);
}
public function getsinglephotographervideo()
{
$id=$this->input->get_post("id");
$data["message"]=$this->photographervideo_model->getsinglephotographervideo($id);
$this->load->view("json",$data);
}
function getallarticle()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`anima_article`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`anima_article`.`title`";
$elements[1]->sort="1";
$elements[1]->header="Title";
$elements[1]->alias="title";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`anima_article`.`json`";
$elements[2]->sort="1";
$elements[2]->header="Json";
$elements[2]->alias="json";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`anima_article`.`content`";
$elements[3]->sort="1";
$elements[3]->header="Content";
$elements[3]->alias="content";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `anima_article`");
$this->load->view("json",$data);
}
public function getsinglearticle()
{
$id=$this->input->get_post("id");
$data["message"]=$this->article_model->getsinglearticle($id);
$this->load->view("json",$data);
}
} ?>