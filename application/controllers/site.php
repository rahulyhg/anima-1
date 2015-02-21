<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site extends CI_Controller 
{
	public function __construct( )
	{
		parent::__construct();
		
		$this->is_logged_in();
	}
	function is_logged_in( )
	{
		$is_logged_in = $this->session->userdata( 'logged_in' );
		if ( $is_logged_in !== 'true' || !isset( $is_logged_in ) ) {
			redirect( base_url() . 'index.php/login', 'refresh' );
		} //$is_logged_in !== 'true' || !isset( $is_logged_in )
	}
	function checkaccess($access)
	{
		$accesslevel=$this->session->userdata('accesslevel');
		if(!in_array($accesslevel,$access))
			redirect( base_url() . 'index.php/site?alerterror=You do not have access to this page. ', 'refresh' );
	}
	public function index()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$data[ 'page' ] = 'dashboard';
		$data[ 'title' ] = 'Welcome';
		$this->load->view( 'template', $data );	
	}
	public function createuser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
//        $data['category']=$this->category_model->getcategorydropdown();
		$data[ 'page' ] = 'createuser';
		$data[ 'title' ] = 'Create User';
		$this->load->view( 'template', $data );	
	}
	function createusersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|required|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('socialid','Socialid','trim');
		$this->form_validation->set_rules('logintype','logintype','trim');
		$this->form_validation->set_rules('json','json','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['accesslevel']=$this->user_model->getaccesslevels();
            $data[ 'status' ] =$this->user_model->getstatusdropdown();
            $data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
            $data['category']=$this->category_model->getcategorydropdown();
            $data[ 'page' ] = 'createuser';
            $data[ 'title' ] = 'Create User';
            $this->load->view( 'template', $data );	
		}
		else
		{
            $name=$this->input->post('name');
            $email=$this->input->post('email');
            $password=$this->input->post('password');
            $accesslevel=$this->input->post('accesslevel');
            $status=$this->input->post('status');
            $socialid=$this->input->post('socialid');
            $logintype=$this->input->post('logintype');
            $json=$this->input->post('json');
//            $category=$this->input->post('category');
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
			if($this->user_model->create($name,$email,$password,$accesslevel,$status,$socialid,$logintype,$image,$json)==0)
			$data['alerterror']="New user could not be created.";
			else
			$data['alertsuccess']="User created Successfully.";
			$data['redirect']="site/viewusers";
			$this->load->view("redirect",$data);
		}
	}
    function viewusers()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['page']='viewusers';
        $data['base_url'] = site_url("site/viewusersjson");
        
		$data['title']='View Users';
		$this->load->view('template',$data);
	} 
    function viewusersjson()
	{
		$access = array("1");
		$this->checkaccess($access);
        
        
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`user`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        
        $elements[1]=new stdClass();
        $elements[1]->field="`user`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`user`.`email`";
        $elements[2]->sort="1";
        $elements[2]->header="Email";
        $elements[2]->alias="email";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`user`.`socialid`";
        $elements[3]->sort="1";
        $elements[3]->header="SocialId";
        $elements[3]->alias="socialid";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`logintype`.`name`";
        $elements[4]->sort="1";
        $elements[4]->header="Logintype";
        $elements[4]->alias="logintype";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`user`.`json`";
        $elements[5]->sort="1";
        $elements[5]->header="Json";
        $elements[5]->alias="json";
       
        $elements[6]=new stdClass();
        $elements[6]->field="`accesslevel`.`name`";
        $elements[6]->sort="1";
        $elements[6]->header="Accesslevel";
        $elements[6]->alias="accesslevelname";
       
        $elements[7]=new stdClass();
        $elements[7]->field="`statuses`.`name`";
        $elements[7]->sort="1";
        $elements[7]->header="Status";
        $elements[7]->alias="status";
       
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=20;
        }
        
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
       
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `user` LEFT OUTER JOIN `logintype` ON `logintype`.`id`=`user`.`logintype` LEFT OUTER JOIN `accesslevel` ON `accesslevel`.`id`=`user`.`accesslevel` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`user`.`status`");
        
		$this->load->view("json",$data);
	} 
    
    
	function edituser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
		$data['before']=$this->user_model->beforeedit($this->input->get('id'));
		$data['page']='edituser';
		$data['page2']='block/userblock';
		$data['title']='Edit User';
		$this->load->view('template',$data);
	}
	function editusersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		
		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('socialid','Socialid','trim');
		$this->form_validation->set_rules('logintype','logintype','trim');
		$this->form_validation->set_rules('json','json','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->user_model->getstatusdropdown();
			$data['accesslevel']=$this->user_model->getaccesslevels();
            $data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
			$data['before']=$this->user_model->beforeedit($this->input->post('id'));
			$data['page']='edituser';
//			$data['page2']='block/userblock';
			$data['title']='Edit User';
			$this->load->view('template',$data);
		}
		else
		{
            
            $id=$this->input->get_post('id');
            $name=$this->input->get_post('name');
            $email=$this->input->get_post('email');
            $password=$this->input->get_post('password');
            $accesslevel=$this->input->get_post('accesslevel');
            $status=$this->input->get_post('status');
            $socialid=$this->input->get_post('socialid');
            $logintype=$this->input->get_post('logintype');
            $json=$this->input->get_post('json');
//            $category=$this->input->get_post('category');
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->user_model->getuserimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
			if($this->user_model->edit($id,$name,$email,$password,$accesslevel,$status,$socialid,$logintype,$image,$json)==0)
			$data['alerterror']="User Editing was unsuccesful";
			else
			$data['alertsuccess']="User edited Successfully.";
			
			$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	
	function deleteuser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->deleteuser($this->input->get('id'));
//		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="User Deleted Successfully";
		$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
		$this->load->view("redirect",$data);
	}
	function changeuserstatus()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->changestatus($this->input->get('id'));
		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="Status Changed Successfully";
		$data['redirect']="site/viewusers";
        $data['other']="template=$template";
        $this->load->view("redirect",$data);
	}
    
    
    
    public function viewinstagram()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewinstagram";
        $data["base_url"]=site_url("site/viewinstagramjson");
        $data["title"]="View instagram";
        $this->load->view("template",$data);
    }
    function viewinstagramjson()
    {
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`anima_instagram`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`anima_instagram`.`image`";
        $elements[1]->sort="1";
        $elements[1]->header="Image";
        $elements[1]->alias="image";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`anima_instagram`.`url`";
        $elements[2]->sort="1";
        $elements[2]->header="URL";
        $elements[2]->alias="url";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`anima_instagram`.`status`";
        $elements[3]->sort="1";
        $elements[3]->header="Status";
        $elements[3]->alias="status";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`anima_instagram`.`user`";
        $elements[4]->sort="1";
        $elements[4]->header="User";
        $elements[4]->alias="user";
        
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
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `anima_instagram`");
        $this->load->view("json",$data);
    }

    public function createinstagram()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="createinstagram";
        $data["title"]="Create instagram";
        $data['status']=$this->category_model->getstatusdropdown();
        $this->load->view("template",$data);
    }
    public function createinstagramsubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("url","URL","trim");
        $this->form_validation->set_rules("status","Status","trim");
        $this->form_validation->set_rules("user","User","trim");
        $this->form_validation->set_rules("likes","Likes","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createinstagram";
            $data["title"]="Create instagram";
            $data['status']=$this->category_model->getstatusdropdown();
            $this->load->view("template",$data);
        }
        else
        {
            $url=$this->input->get_post("url");
            $status=$this->input->get_post("status");
            $user=$this->input->get_post("user");
            $likes=$this->input->get_post("likes");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                }  
                else
                {
                    $image=$this->image_lib->dest_image;
                }
                
			}
            
            if($this->instagram_model->create($image,$url,$status,$user,$likes)==0)
                $data["alerterror"]="New instagram could not be created.";
            else
                $data["alertsuccess"]="instagram created Successfully.";
            $data["redirect"]="site/viewinstagram";
            $this->load->view("redirect",$data);
        }
    }
    public function editinstagram()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editinstagram";
        $data["title"]="Edit instagram";
        $data['status']=$this->category_model->getstatusdropdown();
        $data["before"]=$this->instagram_model->beforeedit($this->input->get("id"));
        $this->load->view("template",$data);
    }
    public function editinstagramsubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("url","URL","trim");
        $this->form_validation->set_rules("status","Status","trim");
        $this->form_validation->set_rules("user","User","trim");
        $this->form_validation->set_rules("likes","Likes","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editinstagram";
            $data["title"]="Edit instagram";
            $data['status']=$this->category_model->getstatusdropdown();
            $data["before"]=$this->instagram_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $url=$this->input->get_post("url");
            $status=$this->input->get_post("status");
            $user=$this->input->get_post("user");
            $likes=$this->input->get_post("likes");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->instagram_model->getinstagramimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
            if($this->instagram_model->edit($id,$image,$url,$status,$user,$likes)==0)
                $data["alerterror"]="New instagram could not be Updated.";
            else
                $data["alertsuccess"]="instagram Updated Successfully.";
            $data["redirect"]="site/viewinstagram";
            $this->load->view("redirect",$data);
        }
    }
    public function deleteinstagram()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->instagram_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewinstagram";
        $this->load->view("redirect",$data);
    }
    public function viewnews()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewnews";
        $data["base_url"]=site_url("site/viewnewsjson");
        $data["title"]="View news";
        $this->load->view("template",$data);
    }
    function viewnewsjson()
    {
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`anima_news`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`anima_news`.`title`";
        $elements[1]->sort="1";
        $elements[1]->header="Title";
        $elements[1]->alias="title";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`anima_news`.`json`";
        $elements[2]->sort="1";
        $elements[2]->header="Json";
        $elements[2]->alias="json";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`anima_news`.`image`";
        $elements[3]->sort="1";
        $elements[3]->header="Image";
        $elements[3]->alias="image";
        
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
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `anima_news`");
        $this->load->view("json",$data);
    }

    public function createnews()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="createnews";
        $data["title"]="Create news";
        $this->load->view("template",$data);
    }
    public function createnewssubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("title","Title","trim");
        $this->form_validation->set_rules("json","Json","trim");
        $this->form_validation->set_rules("content","Content","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createnews";
            $data["title"]="Create news";
            $this->load->view("template",$data);
        }
        else
        {
            $title=$this->input->get_post("title");
            $json=$this->input->get_post("json");
            $content=$this->input->get_post("content");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                }  
                else
                {
                    $image=$this->image_lib->dest_image;
                }
                
			}
            
            if($this->news_model->create($title,$json,$image,$content)==0)
                $data["alerterror"]="New news could not be created.";
            else
                $data["alertsuccess"]="news created Successfully.";
            $data["redirect"]="site/viewnews";
            $this->load->view("redirect",$data);
        }
    }
    public function editnews()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editnews";
        $data["page2"]="block/newsblock";
        $data["title"]="Edit news";
        $data["before"]=$this->news_model->beforeedit($this->input->get("id"));
        $this->load->view("templatewith2",$data);
    }
    public function editnewssubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("title","Title","trim");
        $this->form_validation->set_rules("json","Json","trim");
        $this->form_validation->set_rules("content","Content","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editnews";
            $data["title"]="Edit news";
            $data["before"]=$this->news_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $title=$this->input->get_post("title");
            $json=$this->input->get_post("json");
            $content=$this->input->get_post("content");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->news_model->getnewsimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
            if($this->news_model->edit($id,$title,$json,$image,$content)==0)
                $data["alerterror"]="New news could not be Updated.";
            else
                $data["alertsuccess"]="news Updated Successfully.";
            $data["redirect"]="site/viewnews";
            $this->load->view("redirect",$data);
        }
    }
    public function deletenews()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->news_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewnews";
        $this->load->view("redirect",$data);
    }
    public function viewcategory()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewcategory";
        $data["base_url"]=site_url("site/viewcategoryjson");
        $data["title"]="View category";
        $this->load->view("template",$data);
    }
    function viewcategoryjson()
    {
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`anima_category`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`anima_category`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`anima_category`.`status`";
        $elements[2]->sort="1";
        $elements[2]->header="Status";
        $elements[2]->alias="status";
        
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
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `anima_category`");
        $this->load->view("json",$data);
    }

    public function createcategory()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="createcategory";
        $data["title"]="Create category";
        $data['status']=$this->category_model->getstatusdropdown();
        $this->load->view("template",$data);
    }
    public function createcategorysubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("status","Status","trim");
        $this->form_validation->set_rules("order","Order","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createcategory";
            $data["title"]="Create category";
            $data['status']=$this->category_model->getstatusdropdown();
            $this->load->view("template",$data);
        }
        else
        {
            $name=$this->input->get_post("name");
            $status=$this->input->get_post("status");
            $order=$this->input->get_post("order");
            if($this->category_model->create($name,$status,$order)==0)
                $data["alerterror"]="New category could not be created.";
            else
                $data["alertsuccess"]="category created Successfully.";
            $data["redirect"]="site/viewcategory";
            $this->load->view("redirect",$data);
        }
    }
    public function editcategory()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editcategory";
        $data["title"]="Edit category";
        $data['status']=$this->category_model->getstatusdropdown();
        $data["before"]=$this->category_model->beforeedit($this->input->get("id"));
        $this->load->view("template",$data);
    }
    public function editcategorysubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("status","Status","trim");
        $this->form_validation->set_rules("order","Order","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editcategory";
            $data["title"]="Edit category";
            $data["before"]=$this->category_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $name=$this->input->get_post("name");
            $status=$this->input->get_post("status");
            $order=$this->input->get_post("order");
            if($this->category_model->edit($id,$name,$status,$order)==0)
                $data["alerterror"]="New category could not be Updated.";
            else
                $data["alertsuccess"]="category Updated Successfully.";
            $data["redirect"]="site/viewcategory";
            $this->load->view("redirect",$data);
        }
    }
    public function deletecategory()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->category_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewcategory";
        $this->load->view("redirect",$data);
    }
    public function viewmodel()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewmodel";
        $data["base_url"]=site_url("site/viewmodeljson");
        $data["title"]="View model";
        $this->load->view("template",$data);
    }
    function viewmodeljson()
    {
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`anima_model`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`anima_model`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`anima_model`.`json`";
        $elements[2]->sort="1";
        $elements[2]->header="Json";
        $elements[2]->alias="json";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`anima_model`.`image`";
        $elements[3]->sort="1";
        $elements[3]->header="Image";
        $elements[3]->alias="image";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`anima_category`.`name`";
        $elements[4]->sort="1";
        $elements[4]->header="category";
        $elements[4]->alias="category";
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        
        if($maxrow=="")
        {
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `anima_model` LEFT OUTER JOIN `anima_category` ON `anima_category`.`id`=`anima_model`.`category`");
        $this->load->view("json",$data);
    }

    public function createmodel()
    {
        $access=array("1");
        $this->checkaccess($access);
        
            $json=array();

            $json[0]=new stdClass();
            $json[0]->placeholder="";
            $json[0]->value="";
            $json[0]->label="Height";
            $json[0]->type="text";
            $json[0]->options="";
            $json[0]->classes="";

            $json[1]=new stdClass();
            $json[1]->placeholder="";
            $json[1]->value="";
            $json[1]->label="bust";
            $json[1]->type="text";
            $json[1]->options="";
            $json[1]->classes="";

            $json[2]=new stdClass();
            $json[2]->placeholder="";
            $json[2]->value="";
            $json[2]->label="waist";
            $json[2]->type="text";
            $json[2]->options="";
            $json[2]->classes="";

            $json[3]=new stdClass();
            $json[3]->placeholder="";
            $json[3]->value="";
            $json[3]->label="hips";
            $json[3]->type="text";
            $json[3]->options="";
            $json[3]->classes="";

            $json[4]=new stdClass();
            $json[4]->placeholder="";
            $json[4]->value="";
            $json[4]->label="eyes";
            $json[4]->type="text";
            $json[4]->options="";
            $json[4]->classes="";

            $json[5]=new stdClass();
            $json[5]->placeholder="";
            $json[5]->value="";
            $json[5]->label="brown";
            $json[5]->type="text";
            $json[5]->options="";
            $json[5]->classes="";

            $json[6]=new stdClass();
            $json[6]->placeholder="";
            $json[6]->value="";
            $json[6]->label="shoe";
            $json[6]->type="text";
            $json[6]->options="";
            $json[6]->classes="";


            $data["fieldjson"]=$json;
        
        $data["page"]="createmodel";
        $data['category']=$this->category_model->getcategorydropdown();
        $data["title"]="Create model";
        $this->load->view("template",$data);
    }
    public function createmodelsubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("json","Json","trim");
        $this->form_validation->set_rules("category","category","trim");
        $this->form_validation->set_rules("bio","bio","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createmodel";
            $data["title"]="Create model";
            $this->load->view("template",$data);
        }
        else
        {
            $name=$this->input->get_post("name");
            $json=$this->input->get_post("json");
            $category=$this->input->get_post("category");
            $bio=$this->input->get_post("bio");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                }  
                else
                {
                    $image=$this->image_lib->dest_image;
                }
                
			}
            
            if($this->model_model->create($name,$json,$image,$category,$bio)==0)
                $data["alerterror"]="New model could not be created.";
            else
                $data["alertsuccess"]="model created Successfully.";
            $data["redirect"]="site/viewmodel";
            $this->load->view("redirect",$data);
        }
    }
    public function editmodel()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editmodel";
        $data["page2"]="block/modelblock";
        $data["title"]="Edit model";
        $data['category']=$this->category_model->getcategorydropdown();
        $data["before"]=$this->model_model->beforeedit($this->input->get("id"));
        $this->load->view("templatewith2",$data);
    }
    public function editmodelsubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("json","Json","trim");
        $this->form_validation->set_rules("category","category","trim");
        $this->form_validation->set_rules("bio","bio","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editmodel";
            $data["title"]="Edit model";
            $data["before"]=$this->model_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $name=$this->input->get_post("name");
            $json=$this->input->get_post("json");
            $category=$this->input->get_post("category");
            $bio=$this->input->get_post("bio");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->model_model->getmodelimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
            if($this->model_model->edit($id,$name,$json,$image,$category,$bio)==0)
                $data["alerterror"]="New model could not be Updated.";
            else
                $data["alertsuccess"]="model Updated Successfully.";
            $data["redirect"]="site/viewmodel";
            $this->load->view("redirect",$data);
        }
    }
    public function deletemodel()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->model_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewmodel";
        $this->load->view("redirect",$data);
    }
    public function viewmodelgalleryimage()
    {
        $access=array("1");
        $this->checkaccess($access);
        $modelid=$this->input->get('id');
        $modelgalleryid=$this->input->get('modelgalleryid');
        $data["page"]="viewmodelgalleryimage";
        $data["page2"]="block/modelgalleryblock";
        $data["before"]=$this->modelgallery_model->beforeedit($this->input->get("modelgalleryid"));
        $data["table"]=$this->modelimage_model->viewmodelgalleryimage($this->input->get("modelgalleryid"));
//        print_r($data["table"]);
//        $data["base_url"]=site_url("site/viewmodelimagejson?id=$modelid");
        $data["title"]="View Model Image";
        $this->load->view("templatewith2",$data);
    }
//    public function viewmodelimage()
//    {
//        $access=array("1");
//        $this->checkaccess($access);
//        $modelid=$this->input->get('id');
//        $data["page"]="viewmodelimage";
//        $data["page2"]="block/modelblock";
//        $data["before"]=$this->model_model->beforeedit($this->input->get("id"));
//        $data["base_url"]=site_url("site/viewmodelimagejson?id=$modelid");
//        $data["title"]="View modelimage";
//        $this->load->view("templatewith2",$data);
//    }
    function viewmodelimagejson()
    {
        $id=$this->input->get('id');
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`anima_modelimage`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`anima_modelimage`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`anima_modelimage`.`image`";
        $elements[2]->sort="1";
        $elements[2]->header="Image";
        $elements[2]->alias="image";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`anima_modelimage`.`type`";
        $elements[3]->sort="1";
        $elements[3]->header="Type";
        $elements[3]->alias="type";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`anima_modelimage`.`order`";
        $elements[4]->sort="1";
        $elements[4]->header="Order";
        $elements[4]->alias="order";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`anima_modelimage`.`json`";
        $elements[5]->sort="1";
        $elements[5]->header="Json";
        $elements[5]->alias="json";
        
        $elements[6]=new stdClass();
        $elements[6]->field="`anima_modelimage`.`model`";
        $elements[6]->sort="1";
        $elements[6]->header="Model";
        $elements[6]->alias="model";
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        
        if($maxrow=="")
        {
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `anima_modelimage`","WHERE `anima_modelimage`.`model`='$id'");
        $this->load->view("json",$data);
    }

    public function createmodelgalleryimage()
    {
        $access=array("1");
        $this->checkaccess($access);
        $modelgalleryid=$this->input->get('modelgalleryid');
        $data['type']=$this->model_model->gettypedropdown();
        $data['modelgalleryid']=$modelgalleryid;
        $data["page"]="createmodelgalleryimage";
        $data["title"]="Create modelimage";
        $this->load->view("template",$data);
    }
    public function createmodelgalleryimagesubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("type","Type","trim");
        $this->form_validation->set_rules("order","Order","trim");
        $this->form_validation->set_rules("json","Json","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $modelid=$this->input->get_post('id');
            $data['modelid']=$modelid;
            $data['type']=$this->model_model->gettypedropdown();
            $data["page"]="createmodelimage";
            $data["title"]="Create modelimage";
            $this->load->view("template",$data);
        }
        else
        {
            $name=$this->input->get_post("name");
            $type=$this->input->get_post("type");
            $order=$this->input->get_post("order");
            $json=$this->input->get_post("json");
            $modelgalleryid=$this->input->get_post("modelgalleryid");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                }  
                else
                {
                    $image=$this->image_lib->dest_image;
                }
                
			}
            
            if($this->modelimage_model->create($name,$image,$type,$order,$json,$modelgalleryid)==0)
                $data["alerterror"]="New modelimage could not be created.";
            else
                $data["alertsuccess"]="modelimage created Successfully.";
            $data["redirect"]="site/viewmodelgalleryimage?modelgalleryid=".$modelgalleryid;
            $this->load->view("redirect2",$data);
        }
    }
    public function editmodelgalleryimage()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data['modelgalleryid']=$this->input->get('modelgalleryid');
        $data['modelgalleryimageid']=$this->input->get('modelgalleryimageid');
        $data['type']=$this->model_model->gettypedropdown();
        $data["page"]="editmodelgalleryimage";
        $data["title"]="Edit modelimage";
        
        $data["before"]=$this->modelimage_model->beforeedit($this->input->get("modelgalleryimageid"));
//        print_r($data);
        $this->load->view("template",$data);
    }
    public function editmodelgalleryimagesubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("type","Type","trim");
        $this->form_validation->set_rules("order","Order","trim");
        $this->form_validation->set_rules("json","Json","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data['modelgalleryid']=$this->input->get('modelgalleryid');
            $data['modelgalleryimageid']=$this->input->get('modelgalleryimageid');
            $data['type']=$this->model_model->gettypedropdown();
            $data["page"]="editmodelgalleryimage";
            $data["title"]="Edit modelimage";

            $data["before"]=$this->modelimage_model->beforeedit($this->input->get("modelgalleryimageid"));
    //        print_r($data);
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->post("id");
            $name=$this->input->get_post("name");
            $type=$this->input->get_post("type");
            $order=$this->input->get_post("order");
            $json=$this->input->get_post("json");
            $modelgalleryid=$this->input->get_post("modelgalleryid");
            echo $modelgalleryid;
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->modelimage_model->getmodelgalleryimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
            if($this->modelimage_model->edit($id,$name,$image,$type,$order,$json)==0)
                $data["alerterror"]="New modelimage could not be Updated.";
            else
                $data["alertsuccess"]="modelimage Updated Successfully.";
            $data["redirect"]="site/viewmodelgalleryimage?modelgalleryid=".$modelgalleryid;
            $this->load->view("redirect2",$data);
        }
    }
    public function deletemodelgalleryimage()
    {
        $access=array("1");
        $this->checkaccess($access);
        $modelgalleryid=$this->input->get('modelgalleryid');
        $this->modelimage_model->delete($this->input->get("modelgalleryimageid"));
        $data["redirect"]="site/viewmodelgalleryimage?modelgalleryid=".$modelgalleryid;
        $this->load->view("redirect2",$data);
    }
    public function viewmodelvideo()
    {
        $access=array("1");
        $this->checkaccess($access);
        $modelid=$this->input->get('id');
        $data['modelid']=$modelid;
        $data["page"]="viewmodelvideo";
        $data["page2"]="block/modelblock";
        $data["before"]=$this->model_model->beforeedit($this->input->get("id"));
        $data["base_url"]=site_url("site/viewmodelvideojson?id='$modelid'");
        $data["title"]="View modelvideo";
        $this->load->view("templatewith2",$data);
    }
    function viewmodelvideojson()
    {
        $modelid=$this->input->get('id');
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`anima_modelvideo`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`anima_modelvideo`.`model`";
        $elements[1]->sort="1";
        $elements[1]->header="Model";
        $elements[1]->alias="model";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`anima_modelvideo`.`video`";
        $elements[2]->sort="1";
        $elements[2]->header="Video";
        $elements[2]->alias="video";
        
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
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `anima_modelvideo`","WHERE `anima_modelvideo`.`model`=$modelid");
        $this->load->view("json",$data);
    }

    public function createmodelvideo()
    {
        $access=array("1");
        $this->checkaccess($access);
        $modelid=$this->input->get('id');
        $data['modelid']=$modelid;
        $data["page"]="createmodelvideo";
        $data["title"]="Create modelvideo";
        $this->load->view("template",$data);
    }
    public function createmodelvideosubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("video","Video","trim");
        $this->form_validation->set_rules("order","Order","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createmodelvideo";
            $data["title"]="Create modelvideo";
            $this->load->view("template",$data);
        }
        else
        {
            $video=$this->input->get_post("video");
            $order=$this->input->get_post("order");
            $modelid=$this->input->get_post("modelid");
            if($this->modelvideo_model->create($modelid,$video,$order)==0)
                $data["alerterror"]="New modelvideo could not be created.";
            else
                $data["alertsuccess"]="modelvideo created Successfully.";
            $data["redirect"]="site/viewmodelvideo?id=".$modelid;
            $this->load->view("redirect",$data);
        }
    }
    public function editmodelvideo()
    {
        $access=array("1");
        $this->checkaccess($access);
        $modelid=$this->input->get('id');
        $modelvideoid=$this->input->get('modelvideoid');
        $data["page"]="editmodelvideo";
        $data["title"]="Edit modelvideo";
        $data["before"]=$this->modelvideo_model->beforeedit($this->input->get("modelvideoid"));
        $this->load->view("template",$data);
    }
    public function editmodelvideosubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("modelid","Modelid","trim");
        $this->form_validation->set_rules("video","Video","trim");
        $this->form_validation->set_rules("order","Order","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $modelid=$this->input->get_post('id');
            $modelvideoid=$this->input->get_post('modelvideoid');
            $data["page"]="editmodelvideo";
            $data["title"]="Edit modelvideo";
            $data["before"]=$this->modelvideo_model->beforeedit($this->input->get("modelvideoid"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $modelid=$this->input->get_post("modelid");
            $video=$this->input->get_post("video");
            $order=$this->input->get_post("order");
            if($this->modelvideo_model->edit($id,$modelid,$video,$order)==0)
                $data["alerterror"]="New modelvideo could not be Updated.";
            else
                $data["alertsuccess"]="modelvideo Updated Successfully.";
            $data["redirect"]="site/viewmodelvideo?id=".$modelid;
            $this->load->view("redirect",$data);
        }
    }
    public function deletemodelvideo()
    {
        $access=array("1");
        $this->checkaccess($access);
        $modelid=$this->input->get('id');
        $modelvideoid=$this->input->get('modelvideoid');
        $this->modelvideo_model->delete($this->input->get("modelvideoid"));
        $data["redirect"]="site/viewmodelvideo?id=".$modelid;
        $this->load->view("redirect",$data);
    }
    public function viewphotographer()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewphotographer";
        $data["base_url"]=site_url("site/viewphotographerjson");
        $data["title"]="View photographer";
        $this->load->view("template",$data);
    }
    function viewphotographerjson()
    {
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`anima_photographer`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`anima_photographer`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`anima_photographer`.`city`";
        $elements[2]->sort="1";
        $elements[2]->header="City";
        $elements[2]->alias="city";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`anima_photographer`.`order`";
        $elements[3]->sort="1";
        $elements[3]->header="Order";
        $elements[3]->alias="order";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`anima_photographer`.`content`";
        $elements[4]->sort="1";
        $elements[4]->header="Content";
        $elements[4]->alias="content";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`anima_photographer`.`image`";
        $elements[5]->sort="1";
        $elements[5]->header="image";
        $elements[5]->alias="image";
        
        $elements[6]=new stdClass();
        $elements[6]->field="`photographercategory`.`name`";
        $elements[6]->sort="1";
        $elements[6]->header="category";
        $elements[6]->alias="category";
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        
        if($maxrow=="")
        {
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `anima_photographer` LEFT OUTER JOIN `photographercategory` ON `photographercategory`.`id` = `anima_photographer`.`category`");
        $this->load->view("json",$data);
    }

    public function createphotographer()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data['category']=$this->photographercategory_model->getphotographercategorydropdown();
        $data["page"]="createphotographer";
        $data["title"]="Create photographer";
        $this->load->view("template",$data);
    }
    public function createphotographersubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("city","City","trim");
        $this->form_validation->set_rules("order","Order","trim");
        $this->form_validation->set_rules("content","Content","trim");
        $this->form_validation->set_rules("category","category","trim");
        $this->form_validation->set_rules("bio","bio","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data['category']=$this->photographercategory_model->getphotographercategorydropdown();
            $data["page"]="createphotographer";
            $data["title"]="Create photographer";
            $this->load->view("template",$data);
        }
        else
        {
            $name=$this->input->get_post("name");
            $city=$this->input->get_post("city");
            $order=$this->input->get_post("order");
            $content=$this->input->get_post("content");
            $category=$this->input->get_post("category");
            $bio=$this->input->get_post("bio");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                }  
                else
                {
                    $image=$this->image_lib->dest_image;
                }
                
			}
            
            
            if($this->photographer_model->create($name,$city,$order,$content,$image,$category,$bio)==0)
                $data["alerterror"]="New photographer could not be created.";
            else
                $data["alertsuccess"]="photographer created Successfully.";
            $data["redirect"]="site/viewphotographer";
            $this->load->view("redirect",$data);
        }
    }
    public function editphotographer()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editphotographer";
        $data["page2"]="block/photographerblock";
        $data["title"]="Edit photographer";
        $data['category']=$this->photographercategory_model->getphotographercategorydropdown();
        $data["before"]=$this->photographer_model->beforeedit($this->input->get("id"));
        $this->load->view("templatewith2",$data);
    }
    public function editphotographersubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("city","City","trim");
        $this->form_validation->set_rules("order","Order","trim");
        $this->form_validation->set_rules("content","Content","trim");
        $this->form_validation->set_rules("category","category","trim");
        $this->form_validation->set_rules("bio","bio","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editphotographer";
            $data["title"]="Edit photographer";
            $data['category']=$this->photographercategory_model->getphotographercategorydropdown();
            $data["before"]=$this->photographer_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $name=$this->input->get_post("name");
            $city=$this->input->get_post("city");
            $order=$this->input->get_post("order");
            $content=$this->input->get_post("content");
            $category=$this->input->get_post("category");
            $bio=$this->input->get_post("bio");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->photographer_model->getphotographerimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
            
            if($this->photographer_model->edit($id,$name,$city,$order,$content,$image,$category,$bio)==0)
                $data["alerterror"]="New photographer could not be Updated.";
            else
                $data["alertsuccess"]="photographer Updated Successfully.";
            $data["redirect"]="site/viewphotographer";
            $this->load->view("redirect",$data);
        }
    }
    public function deletephotographer()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->photographer_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewphotographer";
        $this->load->view("redirect",$data);
    }
    public function viewphotographeralbum()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewphotographeralbum";
        $data["base_url"]=site_url("site/viewphotographeralbumjson");
        $data["title"]="View photographeralbum";
        $this->load->view("template",$data);
    }
    function viewphotographeralbumjson()
    {
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`anima_photographeralbum`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`anima_photographeralbum`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`anima_photographeralbum`.`order`";
        $elements[2]->sort="1";
        $elements[2]->header="Order";
        $elements[2]->alias="order";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`anima_photographeralbum`.`image`";
        $elements[3]->sort="1";
        $elements[3]->header="Image";
        $elements[3]->alias="image";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`anima_photographeralbum`.`tab`";
        $elements[4]->sort="1";
        $elements[4]->header="Tab";
        $elements[4]->alias="tab";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`anima_photographeralbum`.`photographer`";
        $elements[5]->sort="1";
        $elements[5]->header="Photographer";
        $elements[5]->alias="photographer";
        
        $elements[6]=new stdClass();
        $elements[6]->field="`anima_photographer`.`name`";
        $elements[6]->sort="1";
        $elements[6]->header="Photographername";
        $elements[6]->alias="photographername";
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        
        if($maxrow=="")
        {
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `anima_photographeralbum` LEFT OUTER JOIN `anima_photographer` ON `anima_photographer`.`id`=`anima_photographeralbum`.`photographer`");
        $this->load->view("json",$data);
    }

    public function createphotographeralbum()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="createphotographeralbum";
        $data["title"]="Create photographeralbum";
        $data['photographer']=$this->photographer_model->getphotographerdropdown();
        $this->load->view("template",$data);
    }
    public function createphotographeralbumsubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("order","Order","trim");
        $this->form_validation->set_rules("tab","Tab","trim");
        $this->form_validation->set_rules("photographer","Photographer","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createphotographeralbum";
            $data["title"]="Create photographeralbum";
            $data['photographer']=$this->photographer_model->getphotographerdropdown();
            $this->load->view("template",$data);
        }
        else
        {
            $name=$this->input->get_post("name");
            $order=$this->input->get_post("order");
            $tab=$this->input->get_post("tab");
            $photographer=$this->input->get_post("photographer");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                }  
                else
                {
                    $image=$this->image_lib->dest_image;
                }
                
			}
            
            if($this->photographeralbum_model->create($name,$order,$image,$tab,$photographer)==0)
                $data["alerterror"]="New photographeralbum could not be created.";
            else
                $data["alertsuccess"]="photographeralbum created Successfully.";
            $data["redirect"]="site/viewphotographeralbum";
            $this->load->view("redirect",$data);
        }
    }
    public function editphotographeralbum()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editphotographeralbum";
        $data["page2"]="block/photographeralbumblock";
        $data["title"]="Edit photographeralbum";
        $data['photographer']=$this->photographer_model->getphotographerdropdown();
        $data["before"]=$this->photographeralbum_model->beforeedit($this->input->get("id"));
        $this->load->view("templatewith2",$data);
    }
    public function editphotographeralbumsubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("order","Order","trim");
        $this->form_validation->set_rules("tab","Tab","trim");
        $this->form_validation->set_rules("photographer","Photographer","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editphotographeralbum";
            $data["title"]="Edit photographeralbum";
            $data['photographer']=$this->photographer_model->getphotographerdropdown();
            $data["before"]=$this->photographeralbum_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $name=$this->input->get_post("name");
            $order=$this->input->get_post("order");
            $tab=$this->input->get_post("tab");
            $photographer=$this->input->get_post("photographer");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->photographeralbum_model->getphotographeralbumimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
            if($this->photographeralbum_model->edit($id,$name,$order,$image,$tab,$photographer)==0)
                $data["alerterror"]="New photographeralbum could not be Updated.";
            else
                $data["alertsuccess"]="photographeralbum Updated Successfully.";
            $data["redirect"]="site/viewphotographeralbum";
            $this->load->view("redirect",$data);
        }
    }
        
    public function deletephotographeralbum()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->photographeralbum_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewphotographeralbum";
        $this->load->view("redirect",$data);
    }
    public function viewalbumimage()
    {
        $access=array("1");
        $this->checkaccess($access);
        $photographeralbumid=$this->input->get('id');
        $data["page"]="viewalbumimage";
        $data["page2"]="block/photographeralbumblock";
        $data["before"]=$this->photographeralbum_model->beforeedit($this->input->get("id"));
//        $data["table"]=$this->photographeralbum_model->viewphotographeralbum($this->input->get("id"));
        $data["table"]=$this->albumimage_model->viewalbumimage($this->input->get("id"));
//        print_r($data["table"]);
//        $data["base_url"]=site_url("site/viewalbumimagejson?id=$photographeralbumid");
        $data["title"]="View albumimage";
        $this->load->view("templatewith2",$data);
    }
    
    public function viewphotographeralbumgalleryimage()
    {
        $access=array("1");
        $this->checkaccess($access);
        $photographeralbumgalleryid=$this->input->get('photographeralbumgalleryid');
        $photographeralbumid=$this->input->get('id');
        $data["page"]="viewphotographeralbumgalleryimage";
        $data["page2"]="block/photographeralbumgalleryblock";
        $data["before"]=$this->photographeralbumgallery_model->beforeedit($this->input->get("photographeralbumgalleryid"));
        $data["table"]=$this->albumimage_model->viewphotographeralbumgalleryimage($this->input->get("photographeralbumgalleryid"));
//        print_r($data["table"]);
//        $data["base_url"]=site_url("site/viewmodelimagejson?id=$modelid");
        $data["title"]="View Model Image";
        $this->load->view("templatewith2",$data);
    }
    
//    public function viewmodelgalleryimage()
//    {
//        $access=array("1");
//        $this->checkaccess($access);
//        $modelid=$this->input->get('id');
//        $modelgalleryid=$this->input->get('modelgalleryid');
//        $data["page"]="viewmodelgalleryimage";
//        $data["page2"]="block/modelgalleryblock";
//        $data["before"]=$this->photographeralbumgallery_model->beforeedit($this->input->get("modelgalleryid"));
//        $data["table"]=$this->photographeralbumgallery_model->viewmodelgalleryimage($this->input->get("modelgalleryid"));
////        print_r($data["table"]);
////        $data["base_url"]=site_url("site/viewmodelimagejson?id=$modelid");
//        $data["title"]="View Model Image";
//        $this->load->view("templatewith2",$data);
//    }
    function viewalbumimagejson()
    {
        $photographeralbumid=$this->input->get('id');
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`anima_albumimage`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`anima_albumimage`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`anima_albumimage`.`image`";
        $elements[2]->sort="1";
        $elements[2]->header="Image";
        $elements[2]->alias="image";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`anima_albumimage`.`type`";
        $elements[3]->sort="1";
        $elements[3]->header="Type";
        $elements[3]->alias="type";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`anima_albumimage`.`order`";
        $elements[4]->sort="1";
        $elements[4]->header="Order";
        $elements[4]->alias="order";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`anima_albumimage`.`json`";
        $elements[5]->sort="1";
        $elements[5]->header="Json";
        $elements[5]->alias="json";
        
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
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `anima_albumimage`","WHERE `anima_albumimage`.`photographeralbum`='$photographeralbumid'");
        $this->load->view("json",$data);
    }

    public function createphotographeralbumgalleryimage()
    {
        $access=array("1");
        $this->checkaccess($access);
        $photographeralbumgalleryid=$this->input->get('photographeralbumgalleryid');
//        $data['photographeralbum']=$this->input->get('id');
        $data['type']=$this->model_model->gettypedropdown();
        $data['photographeralbumgalleryid']=$photographeralbumgalleryid;
        $data["page"]="createphotographeralbumgalleryimage";
        $data["title"]="Create Photographer Album image";
        $this->load->view("template",$data);
    }
    
    public function createphotographeralbumgalleryimagesubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("type","Type","trim");
        $this->form_validation->set_rules("order","Order","trim");
//        $this->form_validation->set_rules("json","Json","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $photographeralbumgalleryid=$this->input->get_post('photographeralbumgalleryid');
//        $data['photographeralbum']=$this->input->get('id');
            $data['type']=$this->model_model->gettypedropdown();
            $data['photographeralbumgalleryid']=$photographeralbumgalleryid;
            $data["page"]="createphotographeralbumgalleryimage";
            $data["title"]="Create Photographer Album image";
            $this->load->view("template",$data);
        }
        else
        {
            $name=$this->input->get_post("name");
            $type=$this->input->get_post("type");
            $order=$this->input->get_post("order");
//            $json=$this->input->get_post("json");
            $photographeralbumgalleryid=$this->input->get_post("photographeralbumgalleryid");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                }  
                else
                {
                    $image=$this->image_lib->dest_image;
                }
                
			}
            
            if($this->albumimage_model->create($name,$image,$type,$order,$photographeralbumgalleryid)==0)
                $data["alerterror"]="New photographeralbumgalleryimage could not be created.";
            else
                $data["alertsuccess"]="photographeralbumgalleryimage created Successfully.";
            $data["redirect"]="site/viewphotographeralbumgalleryimage?photographeralbumgalleryid=".$photographeralbumgalleryid;
            $this->load->view("redirect2",$data);
        }
    }
    public function editphotographeralbumgalleryimage()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data['photographeralbumgalleryid']=$this->input->get('id');
        $data['photographeralbumgalleryimageid']=$this->input->get('photographeralbumgalleryimageid');
        $data["page"]="editphotographeralbumgalleryimage";
        $data["title"]="Edit Photographer Album Gallery image";
        $data['type']=$this->model_model->gettypedropdown();
        $data["before"]=$this->albumimage_model->beforeedit($this->input->get("photographeralbumgalleryimageid"));
        $this->load->view("template",$data);
    }
    public function editphotographeralbumgalleryimagesubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("type","Type","trim");
        $this->form_validation->set_rules("order","Order","trim");
        $this->form_validation->set_rules("json","Json","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data['photographeralbumgalleryid']=$this->input->get_post('id');
            $data['photographeralbumgalleryimageid']=$this->input->get_post('photographeralbumgalleryimageid');
            $data["page"]="editphotographeralbumgalleryimage";
            $data["title"]="Edit Photographer Album Gallery image";
            $data['type']=$this->model_model->gettypedropdown();
            $data["before"]=$this->albumimage_model->beforeedit($this->input->get_post("photographeralbumgalleryimageid"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->post("id");
            $name=$this->input->get_post("name");
            $type=$this->input->get_post("type");
            $order=$this->input->get_post("order");
            $json=$this->input->get_post("json");
            $photographeralbumgalleryid=$this->input->get_post("photographeralbumgalleryid");
//            echo $modelgalleryid;
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->albumimage_model->getalbumimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
            if($this->albumimage_model->edit($id,$name,$image,$type,$order)==0)
                $data["alerterror"]="New modelimage could not be Updated.";
            else
                $data["alertsuccess"]="modelimage Updated Successfully.";
            $data["redirect"]="site/viewphotographeralbumgalleryimage?photographeralbumgalleryid=".$photographeralbumgalleryid;
            $this->load->view("redirect2",$data);
        }
    }
    public function editalbumimagesubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("type","Type","trim");
        $this->form_validation->set_rules("order","Order","trim");
        $this->form_validation->set_rules("json","Json","trim");
        $this->form_validation->set_rules("photographeralbumid","Photographer Album","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editalbumimage";
            $data["title"]="Edit albumimage";
            $data['type']=$this->model_model->gettypedropdown();
            $data["before"]=$this->albumimage_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $name=$this->input->get_post("name");
            $type=$this->input->get_post("type");
            $order=$this->input->get_post("order");
            $json=$this->input->get_post("json");
            $photographeralbum=$this->input->get_post("photographeralbumid");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->albumimage_model->getalbumimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
            if($this->albumimage_model->edit($id,$name,$image,$type,$order,$json,$photographeralbum)==0)
                $data["alerterror"]="New albumimage could not be Updated.";
            else
                $data["alertsuccess"]="albumimage Updated Successfully.";
            $data["redirect"]="site/viewalbumimage?id=".$photographeralbum;
            $this->load->view("redirect2",$data);
        }
    }
    public function deletealbumimage()
    {
        $access=array("1");
        $this->checkaccess($access);
        $photographeralbumid=$this->input->get('id');
        $photographeralbumimage=$this->input->get('photographeralbumimage');
        $this->albumimage_model->delete($this->input->get("photographeralbumimage"));
        $data["redirect"]="site/viewalbumimage?id=".$photographeralbumid;
        $this->load->view("redirect2",$data);
    }
    
    public function deletephotographeralbumgalleryimage()
    {
        $access=array("1");
        $this->checkaccess($access);
        $photographeralbumgalleryid=$this->input->get('photographeralbumgalleryid');
        $this->albumimage_model->delete($this->input->get("photographeralbumgalleryimageid"));
        $data["redirect"]="site/viewphotographeralbumgalleryimage?photographeralbumgalleryid=".$photographeralbumgalleryid;
        $this->load->view("redirect2",$data);
    }
    public function viewphotographervideo()
    {
        $access=array("1");
        $this->checkaccess($access);
        $photographer=$this->input->get('id');
        $data["page"]="viewphotographervideo";
        $data["page2"]="block/photographerblock";
        $data["before"]=$this->photographer_model->beforeedit($this->input->get("id"));
        $data["base_url"]=site_url("site/viewphotographervideojson?id=$photographer");
        $data["title"]="View photographervideo";
        $this->load->view("templatewith2",$data);
    }
    function viewphotographervideojson()
    {
        $photographer=$this->input->get('id');
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`anima_photographervideo`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`anima_photographervideo`.`photographer`";
        $elements[1]->sort="1";
        $elements[1]->header="Photographer";
        $elements[1]->alias="photographer";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`anima_photographervideo`.`video`";
        $elements[2]->sort="1";
        $elements[2]->header="Video";
        $elements[2]->alias="video";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`anima_photographervideo`.`order`";
        $elements[3]->sort="1";
        $elements[3]->header="Order";
        $elements[3]->alias="order";
        
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
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `anima_photographervideo`","WHERE `anima_photographervideo`.`photographer`='$photographer'");
        $this->load->view("json",$data);
    }

    public function createphotographervideo()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data['photographer']=$this->input->get('id');
        $data["page"]="createphotographervideo";
        $data["title"]="Create photographervideo";
        $this->load->view("template",$data);
    }
    public function createphotographervideosubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("photographer","Photographer","trim");
        $this->form_validation->set_rules("video","Video","trim");
        $this->form_validation->set_rules("order","Order","trim");
        $this->form_validation->set_rules("photographeralbum","Photographer Album","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data['photographeralbum']=$this->input->get_post('photographeralbum');
            $data["page"]="createphotographervideo";
            $data["title"]="Create photographervideo";
            $this->load->view("template",$data);
        }
        else
        {
            $photographer=$this->input->get_post("photographer");
            $video=$this->input->get_post("video");
            $order=$this->input->get_post("order");
            $photographeralbum=$this->input->get_post("photographeralbum");
            if($this->photographervideo_model->create($photographer,$video,$order,$photographeralbum)==0)
                $data["alerterror"]="New photographervideo could not be created.";
            else
                $data["alertsuccess"]="photographervideo created Successfully.";
            $data["redirect"]="site/viewphotographervideo?id=".$photographer;
            $this->load->view("redirect2",$data);
        }
    }
    public function editphotographervideo()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editphotographervideo";
        $data["title"]="Edit photographervideo";
        $data['photographer']=$this->input->get('id');
        $data['photographervideo']=$this->input->get('photographervideo');
        $data["before"]=$this->photographervideo_model->beforeedit($this->input->get("photographervideo"));
        $this->load->view("template",$data);
    }
    public function editphotographervideosubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("photographer","Photographer","trim");
        $this->form_validation->set_rules("video","Video","trim");
        $this->form_validation->set_rules("order","Order","trim");
        $this->form_validation->set_rules("photographeralbum","Photographer Album","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editphotographervideo";
            $data["title"]="Edit photographervideo";
            $data["before"]=$this->photographervideo_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $photographer=$this->input->get_post("photographer");
            $video=$this->input->get_post("video");
            $order=$this->input->get_post("order");
            $photographeralbum=$this->input->get_post("photographeralbum");
            if($this->photographervideo_model->edit($id,$photographer,$video,$order,$photographeralbum)==0)
                $data["alerterror"]="New photographervideo could not be Updated.";
            else
                $data["alertsuccess"]="photographervideo Updated Successfully.";
            $data["redirect"]="site/viewphotographervideo?id=".$photographer;
            $this->load->view("redirect2",$data);
        }
    }
    public function deletephotographervideo()
    {
        $access=array("1");
        $this->checkaccess($access);
        $photographer=$this->input->get('id');
        $photographervideo=$this->input->get('photographervideo');
        $this->photographervideo_model->delete($this->input->get("photographervideo"));
        $data["redirect"]="site/viewphotographervideo?id=".$photographer;
        $this->load->view("redirect2",$data);
    }
    public function viewarticle()
    {
    $access=array("1");
    $this->checkaccess($access);
    $data["page"]="viewarticle";
    $data["base_url"]=site_url("site/viewarticlejson");
    $data["title"]="View article";
    $this->load->view("template",$data);
    }
    function viewarticlejson()
    {
    $elements=array();
    $elements[0]=new stdClass();
    $elements[0]->field="`anima_article`.`id`";
    $elements[0]->sort="1";
    $elements[0]->header="ID";
    $elements[0]->alias="id";
    $elements[1]=new stdClass();
    $elements[1]->field="`anima_article`.`title`";
    $elements[1]->sort="1";
    $elements[1]->header="Title";
    $elements[1]->alias="title";
    $elements[2]=new stdClass();
    $elements[2]->field="`anima_article`.`json`";
    $elements[2]->sort="1";
    $elements[2]->header="Json";
    $elements[2]->alias="json";
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
    $maxrow=20;
    }
    if($orderby=="")
    {
    $orderby="id";
    $orderorder="ASC";
    }
    $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `anima_article`");
    $this->load->view("json",$data);
    }

    public function createarticle()
    {
    $access=array("1");
    $this->checkaccess($access);
    $data["page"]="createarticle";
    $data["title"]="Create article";
    $this->load->view("template",$data);
    }
    public function createarticlesubmit() 
    {
    $access=array("1");
    $this->checkaccess($access);
    $this->form_validation->set_rules("title","Title","trim");
    $this->form_validation->set_rules("json","Json","trim");
    $this->form_validation->set_rules("content","Content","trim");
    if($this->form_validation->run()==FALSE)
    {
    $data["alerterror"]=validation_errors();
    $data["page"]="createarticle";
    $data["title"]="Create article";
    $this->load->view("template",$data);
    }
    else
    {
    $title=$this->input->get_post("title");
    $json=$this->input->get_post("json");
    $content=$this->input->get_post("content");
    if($this->article_model->create($title,$json,$content)==0)
    $data["alerterror"]="New article could not be created.";
    else
    $data["alertsuccess"]="article created Successfully.";
    $data["redirect"]="site/viewarticle";
    $this->load->view("redirect",$data);
    }
    }
    public function editarticle()
    {
    $access=array("1");
    $this->checkaccess($access);
    $data["page"]="editarticle";
    $data["title"]="Edit article";
    $data["before"]=$this->article_model->beforeedit($this->input->get("id"));
    $this->load->view("template",$data);
    }
    public function editarticlesubmit()
    {
    $access=array("1");
    $this->checkaccess($access);
    $this->form_validation->set_rules("id","ID","trim");
    $this->form_validation->set_rules("title","Title","trim");
    $this->form_validation->set_rules("json","Json","trim");
    $this->form_validation->set_rules("content","Content","trim");
    if($this->form_validation->run()==FALSE)
    {
    $data["alerterror"]=validation_errors();
    $data["page"]="editarticle";
    $data["title"]="Edit article";
    $data["before"]=$this->article_model->beforeedit($this->input->get("id"));
    $this->load->view("template",$data);
    }
    else
    {
    $id=$this->input->get_post("id");
    $title=$this->input->get_post("title");
    $json=$this->input->get_post("json");
    $content=$this->input->get_post("content");
    if($this->article_model->edit($id,$title,$json,$content)==0)
    $data["alerterror"]="New article could not be Updated.";
    else
    $data["alertsuccess"]="article Updated Successfully.";
    $data["redirect"]="site/viewarticle";
    $this->load->view("redirect",$data);
    }
    }
    public function deletearticle()
    {
    $access=array("1");
    $this->checkaccess($access);
    $this->article_model->delete($this->input->get("id"));
    $data["redirect"]="site/viewarticle";
    $this->load->view("redirect",$data);
    }

    public function saveorder()
    {
        $order=$this->input->get('order');
        $id=$this->input->get('id');
        $data1=$this->model_model->saveorder($id,$order);
        $data["message"]=$data1;
        $this->load->view("json",$data);
  
    }
    public function savemodelorder()
    {
        $order=$this->input->get('order');
        $id=$this->input->get('id');
        $data1=$this->model_model->savemodelorder($id,$order);
        $data["message"]=$data1;
        $this->load->view("json",$data);
   
    }
    public function savephotographerorder()
    {
        $order=$this->input->get('order');
        $id=$this->input->get('id');
        $data1=$this->photographeralbum_model->savephotographerorder($id,$order);
        $data["message"]=$data1;
        $this->load->view("json",$data);
   
    }
    
    
    
    //photographercategory
    
    public function viewphotographercategory()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewphotographercategory";
        $data["base_url"]=site_url("site/viewphotographercategoryjson");
        $data["title"]="View photographercategory";
        $this->load->view("template",$data);
    }
    function viewphotographercategoryjson()
    {
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`photographercategory`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`photographercategory`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`photographercategory`.`status`";
        $elements[2]->sort="1";
        $elements[2]->header="Status";
        $elements[2]->alias="status";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`photographercategory`.`order`";
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
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `photographercategory`");
        $this->load->view("json",$data);
    }

    public function createphotographercategory()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="createphotographercategory";
        $data["title"]="Create photographercategory";
        $data['status']=$this->photographercategory_model->getstatusdropdown();
        $this->load->view("template",$data);
    }
    public function createphotographercategorysubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("status","Status","trim");
        $this->form_validation->set_rules("order","Order","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createphotographercategory";
            $data["title"]="Create photographercategory";
            $data['status']=$this->photographercategory_model->getstatusdropdown();
            $this->load->view("template",$data);
        }
        else
        {
            $name=$this->input->get_post("name");
            $status=$this->input->get_post("status");
            $order=$this->input->get_post("order");
            if($this->photographercategory_model->create($name,$status,$order)==0)
                $data["alerterror"]="New photographercategory could not be created.";
            else
                $data["alertsuccess"]="photographercategory created Successfully.";
            $data["redirect"]="site/viewphotographercategory";
            $this->load->view("redirect",$data);
        }
    }
    public function editphotographercategory()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editphotographercategory";
        $data["title"]="Edit photographercategory";
        $data['status']=$this->photographercategory_model->getstatusdropdown();
        $data["before"]=$this->photographercategory_model->beforeedit($this->input->get("id"));
        $this->load->view("template",$data);
    }
    public function editphotographercategorysubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("status","Status","trim");
        $this->form_validation->set_rules("order","Order","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editphotographercategory";
            $data["title"]="Edit photographercategory";
            $data["before"]=$this->photographercategory_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $name=$this->input->get_post("name");
            $status=$this->input->get_post("status");
            $order=$this->input->get_post("order");
            if($this->photographercategory_model->edit($id,$name,$status,$order)==0)
                $data["alerterror"]="New photographercategory could not be Updated.";
            else
                $data["alertsuccess"]="photographercategory Updated Successfully.";
            $data["redirect"]="site/viewphotographercategory";
            $this->load->view("redirect",$data);
        }
    }
    public function deletephotographercategory()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->photographercategory_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewphotographercategory";
        $this->load->view("redirect",$data);
    }
    
    //modelgallery
    
    function viewmodelgallery()
	{
		$access = array("1");
		$this->checkaccess($access);
        $modelid=$this->input->get('id');
		$data['before']=$this->model_model->beforeedit($modelid);
		$data['table']=$this->modelgallery_model->viewmodelgallerybymodel($modelid);
		$data['page']='viewmodelgallery';
		$data['page2']='block/modelblock';
        $data['title']='View model Image';
		$this->load->view('templatewith2',$data);
	}
    
    
    
    public function createmodelgallery()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createmodelgallery';
		$data[ 'title' ] = 'Create modelgallery';
		$data[ 'modelid' ] = $this->input->get('id');
//        $data['model']=$this->modelgallery_model->getmodeldropdown();
		$this->load->view( 'template', $data );	
	}
    function createmodelgallerysubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('modelid','modelid','trim|required');

		if($this->form_validation->run() == FALSE)	
		{
            
			$data['alerterror'] = validation_errors();
			$data[ 'page' ] = 'createmodelgallery';
            $data[ 'title' ] = 'Create modelgallery';
            $data[ 'modelid' ] = $this->input->get_post('id');
            $this->load->view( 'template', $data );	
		}
		else
		{
			$model=$this->input->post('modelid');
			$title=$this->input->post('title');
			$order=$this->input->post('order');
           
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                }  
                else
                {
                    $image=$this->image_lib->dest_image;
                }
                
			}
            
            
            if($this->modelgallery_model->create($model,$image,$title,$order)==0)
               $data['alerterror']="New modelgallery could not be created.";
            else
               $data['alertsuccess']="modelgallery created Successfully.";
			
			$data['redirect']="site/viewmodelgallery?id=".$model;
			$this->load->view("redirect2",$data);
		}
	}
    
    function editmodelgallery()
	{
		$access = array("1");
		$this->checkaccess($access);
        $modelid=$this->input->get('id');
        $data['modelid']=$modelid;
        $modelgalleryid=$this->input->get('modelgalleryid');
        $data['modelgalleryid']=$modelgalleryid;
		$data['before']=$this->modelgallery_model->beforeedit($this->input->get('modelgalleryid'));
//		$data['beforemodelgallery']=$this->modelgallery_model->beforeedit($this->input->get('modelgalleryid'));
//        $data['model']=$this->modelgallery_model->getmodeldropdown();
		$data['page']='editmodelgallery';
		$data['page2']='block/modelgalleryblock';
		$data['title']='Edit modelgallery';
		$this->load->view('templatewith2',$data);
	}
	function editmodelgallerysubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
        
		$this->form_validation->set_rules('modelid','model','trim|required');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
            $modelid=$this->input->post('model');
            $modelgalleryid=$this->input->post('modelgalleryid');
            $data['modelid']=$modelid;
			$data['before']=$this->modelgallery_model->beforeedit($this->input->post('modelgalleryid'));
            $data['model']=$this->modelgallery_model->getmodeldropdown();
//			$data['page2']='block/eventblock';
			$data['page']='editmodelgallery';
			$data['title']='Edit modelgallery';
			$this->load->view('template',$data);
		}
		else
		{
            
			$id=$this->input->post('id');
//			$id=$this->input->post('modelgalleryid');
            $model=$this->input->post('modelid');
            $title=$this->input->post('title');
            $order=$this->input->post('order');
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                }  
                else
                {
                    $image=$this->image_lib->dest_image;
                }
                
			}
            if($image=="")
            {
                $image=$this->modelgallery_model->getmodelgalleryimagebyid($id);
                $image=$image->image;
            }
            
			if($this->modelgallery_model->edit($id,$model,$image,$title,$order)==0)
			$data['alerterror']="modelgallery Editing was unsuccesful";
			else
			$data['alertsuccess']="modelgallery edited Successfully.";
			
			$data['redirect']="site/viewmodelgallery?id=".$model;
			$this->load->view("redirect2",$data);
			
		}
	}
    
	function deletemodelgallery()
	{
		$access = array("1");
		$this->checkaccess($access);
        $modelid=$this->input->get('id');
        $modelgalleryid=$this->input->get('modelgalleryid');
		$this->modelgallery_model->deletemodelgallery($this->input->get('modelgalleryid'));
		$data['alertsuccess']="modelgallery Deleted Successfully";
		$data['redirect']="site/viewmodelgallery?id=".$modelid;
		$this->load->view("redirect2",$data);
	}
    //photographeralbumgallery
    
    function viewphotographeralbumgallery()
	{
		$access = array("1");
		$this->checkaccess($access);
        $photographeralbumid=$this->input->get('id');
		$data['before']=$this->photographeralbum_model->beforeedit($photographeralbumid);
		$data['table']=$this->photographeralbumgallery_model->viewphotographeralbumgallerybyphotographeralbum($photographeralbumid);
		$data['page']='viewphotographeralbumgallery';
		$data['page2']='block/photographeralbumblock';
        $data['title']='View Gallery';
		$this->load->view('templatewith2',$data);
	}
    
    
    
    public function createphotographeralbumgallery()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createphotographeralbumgallery';
		$data[ 'title' ] = 'Create photographeralbumgallery';
		$data[ 'photographeralbumid' ] = $this->input->get('id');
//        $data['model']=$this->photographeralbumgallery_model->getmodeldropdown();
		$this->load->view( 'template', $data );	
	}
    function createphotographeralbumgallerysubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('photographeralbumid','photographeralbumid','trim|required');

		if($this->form_validation->run() == FALSE)	
		{
            
			$data['alerterror'] = validation_errors();
			$data[ 'page' ] = 'createphotographeralbumgallery';
            $data[ 'title' ] = 'Create photographeralbumgallery';
            $data[ 'modelid' ] = $this->input->get_post('id');
            $this->load->view( 'template', $data );	
		}
		else
		{
			$photographeralbum=$this->input->post('photographeralbumid');
			$title=$this->input->post('title');
			$order=$this->input->post('order');
           
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                }  
                else
                {
                    $image=$this->image_lib->dest_image;
                }
                
			}
            
            
            if($this->photographeralbumgallery_model->create($photographeralbum,$image,$title,$order)==0)
               $data['alerterror']="New photographeralbumgallery could not be created.";
            else
               $data['alertsuccess']="photographeralbumgallery created Successfully.";
			
			$data['redirect']="site/viewphotographeralbumgallery?id=".$photographeralbum;
			$this->load->view("redirect2",$data);
		}
	}
    
    function editphotographeralbumgallery()
	{
		$access = array("1");
		$this->checkaccess($access);
        $photographeralbumid=$this->input->get('id');
        $data['photographeralbumid']=$photographeralbumid;
        $photographeralbumgalleryid=$this->input->get('photographeralbumgalleryid');
        $data['photographeralbumgalleryid']=$photographeralbumgalleryid;
		$data['before']=$this->photographeralbumgallery_model->beforeedit($this->input->get('photographeralbumgalleryid'));
		$data['page']='editphotographeralbumgallery';
		$data['page2']='block/photographeralbumgalleryblock';
		$data['title']='Edit photographeralbumgallery';
		$this->load->view('templatewith2',$data);
	}
	function editphotographeralbumgallerysubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
        
		$this->form_validation->set_rules('photographeralbumid','photographeralbum','trim|required');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
            $modelid=$this->input->post('model');
            $photographeralbumgalleryid=$this->input->post('photographeralbumgalleryid');
            $data['modelid']=$modelid;
			$data['before']=$this->photographeralbumgallery_model->beforeedit($this->input->post('photographeralbumgalleryid'));
            $data['model']=$this->photographeralbumgallery_model->getmodeldropdown();
//			$data['page2']='block/eventblock';
			$data['page']='editphotographeralbumgallery';
			$data['title']='Edit photographeralbumgallery';
			$this->load->view('template',$data);
		}
		else
		{
            
			$id=$this->input->post('id');
//			$id=$this->input->post('photographeralbumgalleryid');
            $photographeralbum=$this->input->post('photographeralbumid');
            $title=$this->input->post('title');
            $order=$this->input->post('order');
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                }  
                else
                {
                    $image=$this->image_lib->dest_image;
                }
                
			}
            if($image=="")
            {
                $image=$this->photographeralbumgallery_model->getphotographeralbumgalleryimagebyid($id);
                $image=$image->image;
            }
            
			if($this->photographeralbumgallery_model->edit($id,$photographeralbum,$image,$title,$order)==0)
			$data['alerterror']="photographeralbumgallery Editing was unsuccesful";
			else
			$data['alertsuccess']="photographeralbumgallery edited Successfully.";
			
			$data['redirect']="site/viewphotographeralbumgallery?id=".$photographeralbum;
			$this->load->view("redirect2",$data);
			
		}
	}
    
	function deletephotographeralbumgallery()
	{
		$access = array("1");
		$this->checkaccess($access);
        $photographeralbumid=$this->input->get('id');
        $photographeralbumgalleryid=$this->input->get('photographeralbumgalleryid');
		$this->photographeralbumgallery_model->deletephotographeralbumgallery($this->input->get('photographeralbumgalleryid'));
		$data['alertsuccess']="photographeralbumgallery Deleted Successfully";
		$data['redirect']="site/viewphotographeralbumgallery?id=".$photographeralbumid;
		$this->load->view("redirect2",$data);
	}
    
    //newsimage
    
    function viewnewsimage()
	{
		$access = array("1");
		$this->checkaccess($access);
        $newsid=$this->input->get('id');
		$data['before']=$this->news_model->beforeedit($newsid);
		$data['table']=$this->newsimage_model->viewnewsimagebynews($newsid);
		$data['page']='viewnewsimage';
		$data['page2']='block/newsblock';
        $data['title']='View news Image';
		$this->load->view('templatewith2',$data);
	}
    
    
    
    public function createnewsimage()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createnewsimage';
		$data[ 'title' ] = 'Create newsimage';
		$data[ 'newsid' ] = $this->input->get('id');
//        $data['news']=$this->newsimage_model->getnewsdropdown();
		$this->load->view( 'template', $data );	
	}
    function createnewsimagesubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('news','news','trim|required');
		$this->form_validation->set_rules('title','title','trim');
		$this->form_validation->set_rules('order','order','trim');

		if($this->form_validation->run() == FALSE)	
		{
            
			$data['alerterror'] = validation_errors();
			$data[ 'page' ] = 'createnewsimage';
            $data[ 'title' ] = 'Create newsimage';
            $data[ 'newsid' ] = $this->input->get_post('id');
//            $data['news']=$this->newsimage_model->getnewsdropdown();
            $this->load->view( 'template', $data );	
		}
		else
		{
			$news=$this->input->post('news');
			$title=$this->input->post('title');
			$order=$this->input->post('order');
           
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                }  
                else
                {
                    $image=$this->image_lib->dest_image;
                }
                
			}
            
            
            if($this->newsimage_model->create($news,$image,$title,$order)==0)
               $data['alerterror']="New newsimage could not be created.";
            else
               $data['alertsuccess']="newsimage created Successfully.";
			
			$data['redirect']="site/viewnewsimage?id=".$news;
			$this->load->view("redirect",$data);
		}
	}
    
    function editnewsimage()
	{
		$access = array("1");
		$this->checkaccess($access);
        $newsid=$this->input->get('id');
        $data['newsid']=$newsid;
        $newsimageid=$this->input->get('newsimageid');
		$data['before']=$this->newsimage_model->beforeedit($this->input->get('newsimageid'));
//        $data['news']=$this->newsimage_model->getnewsdropdown();
		$data['page']='editnewsimage';
		$data['title']='Edit newsimage';
		$this->load->view('template',$data);
	}
	function editnewsimagesubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
        
		$this->form_validation->set_rules('news','news','trim|required');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
            $newsid=$this->input->post('news');
            $newsimageid=$this->input->post('newsimageid');
            $data['newsid']=$newsid;
			$data['before']=$this->newsimage_model->beforeedit($this->input->post('newsimageid'));
            $data['news']=$this->newsimage_model->getnewsdropdown();
//			$data['page2']='block/eventblock';
			$data['page']='editnewsimage';
			$data['title']='Edit newsimage';
			$this->load->view('template',$data);
		}
		else
		{
            
			$id=$this->input->post('newsimageid');
            $news=$this->input->post('news');
            $title=$this->input->post('title');
            $order=$this->input->post('order');
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                }  
                else
                {
                    $image=$this->image_lib->dest_image;
                }
                
			}
            if($image=="")
            {
                $image=$this->newsimage_model->getnewsimagebyid($id);
                $image=$image->image;
            }
            
			if($this->newsimage_model->edit($id,$news,$image,$title,$order)==0)
			$data['alerterror']="newsimage Editing was unsuccesful";
			else
			$data['alertsuccess']="newsimage edited Successfully.";
			
			$data['redirect']="site/viewnewsimage?id=".$news;
			$this->load->view("redirect",$data);
			
		}
	}
    
	function deletenewsimage()
	{
		$access = array("1");
		$this->checkaccess($access);
        $newsid=$this->input->get('id');
        $newsimageid=$this->input->get('newsimageid');
		$this->newsimage_model->deletenewsimage($this->input->get('newsimageid'));
		$data['alertsuccess']="newsimage Deleted Successfully";
		$data['redirect']="site/viewnewsimage?id=".$newsid;
		$this->load->view("redirect",$data);
	}
}
?>
