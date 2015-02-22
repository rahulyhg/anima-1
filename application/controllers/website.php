<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Website extends CI_Controller
{
	public function index( )
	{
		$data["page"]="index";
        $data["model1"]=$this->model_model->getmodel1();
        $data["model2"]=$this->model_model->getmodel2();
        $data["model3"]=$this->model_model->getmodel3();
        $this->load->view("frontend",$data);
	}
	public function news( )
	{
		$data["newss"]=$this->news_model->getall();
        $this->load->view("frontend/news",$data);
	}
    public function newsinner( )
	{
        $newsid=$this->input->get_post("id");
		$data["news"]=$this->news_model->beforeedit($newsid);
        $this->load->view("frontend/news_inner",$data);
	}
    //FEAMALES IN TOWN
    public function models( )
	{
        $modelcatid = $this->input->get_post("id");
		$data["models"]=$this->model_model->getmodelsbycat($modelcatid);
        $this->load->view("frontend/females_in_town",$data);
	}
    //MODELS GALLERY
    public function modelinner( )
	{
        //GET MODEL ID AND REMOVE FIRST GALLERY ID
        $modelid = $this->input->get_post("id");
        $gallery=$this->model_model->getfirstgallery($modelid);
        //REDIRCT TO NEW PAGE WITH GALLERY ID AND MODEL ID
        $newurl=site_url("website/modelgallery?id=$gallery&model=$modelid");
        header("Location: $newurl");
        
	}
    public function modelgallery()
    {
        $modelid = $this->input->get_post("model");
        $galleryid = $this->input->get_post("id");
        //GET CATEGORY NAME FOR BACK BUTTON NAME
        $data["category"]=$this->model_model->getcategoryname($modelid);
        //GET MODEL DETAILS
        $data["model"]=$this->model_model->getsinglemodel($modelid);
        $data["model"]->json=json_decode($data["model"]->json);
        //GET ALL GALLERY NAMES
        $data["gallery"]=$this->model_model->getallgallery($modelid);
        //GET MODEL IMAGES OF THAT GALLERY
		$data["modelimages"]=$this->model_model->getmodelgallerydata($galleryid);
        //GET VIDEOS BY MODEL ID
        $data["modelvideos"]=$this->model_model->getmodelvideos($modelid);
        $this->load->view("frontend/gallery",$data);
    }
    //WHEN CLICKED ON ANY CREATIVE ARTIST , CATEGORY ID and NAME IS PASSED
    public function creativeartists()
    {
        $creativecat = $this->input->get_post("id");
        //GET CATEGORY NAME
        $data["creativecatname"] = $this->input->get_post("name");
        //GET ARTISTS OF THIS CATEGORY
        $data["photographers"] = $this->photographer_model->getphotographerbycat($creativecat);
        $this->load->view("frontend/photographers",$data);
    }
    //WHEN CLICKED ON A ARTIST
    public function creativeinner()
    {
        //ID OF ARTIST
        $creativeid = $this->input->get_post("id");
        //FIND FIRST ALBUM
        $gallery = $this->photographeralbum_model->getfirstgallery($creativeid);
        //REDIRCT TO NEW PAGE WITH GALLERY ID AND MODEL ID
        $newurl=site_url("website/artistgallery?id=$gallery&creative=$creativeid");
        header("Location: $newurl");
        
        
    }
    public function artistgallery()
    {
        //ID OF ARTIST
        $creativeid = $this->input->get_post("creative");
        //GALLERY ID
        $galleryid = $this->input->get_post("id");
        //CAT OF ARTIST
        $data["creativecat"] = $this->photographercategory_model->getsinglephotographercategory($creativeid);
        //PHOTOGRAPHER DETAILS
        $data["photographer"] = $this->photographer_model->getsinglephotographer($creativeid);
        //GET PHOTOGRAPHER CATEGORIES
        $data["photographercats"] = $this->photographeralbum_model->getallbyartist($creativeid);
        //GET CURRENT CATEGORY ALBUMS
        $data["albums"] = $this->photographeralbumgallery_model->getalbumbygallery($galleryid);
        //GET PHOTOGRAPHER VIDEO
        $data["videos"] = $this->photographervideo_model->getallbyphotographer($creativeid);
        $this->load->view("frontend/photographer_inner",$data);
    }
    
    public function albuminner()
    {
        //ID OF ARTIST
        
        $album = $this->input->get_post("id");
        //CAT OF ARTIST
        //GET CATEGORY NAME FOR BACK BUTTON NAME
        $data["category"]=$this->photographeralbumgallery_model->getsubcategoryandartist($album);
       
       
		$data["modelimages"]=$this->photographeralbumgallery_model->getallimagesbyalbum($album);
        $this->load->view("frontend/gallery2",$data);
    }
    
    public function about()
    {
        $this->load->view("frontend/about");
    }
    public function become_model()
    {
        $this->load->view("frontend/become_model");
    }
    public function contact()
    {
        $this->load->view("frontend/contact");
    }
    
}
?>