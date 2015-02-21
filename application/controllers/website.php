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
}
?>