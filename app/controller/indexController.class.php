<?php
//控制器作用调用模型，调用视图，将模型生成的数据传给视图，让相关视图去显示；
	class indexController{
	public function index(){
		global $view;
		
			//$testModel=M('test');
			//$data=$testModel->get();
			//$view->assign('str',$data);
		//读取配置
		$page_var['images_domain']=_IMAGES_DOMAIN_;
		$page_var['sitename']=SITENAME;
		
		
		if(isset($_GET[openid]) and $_GET[openid] !=''){
			include("qq_index.php");
			exit();
		}
		
		
		$user=checklogin();
		if($user){
			$userinfo=search_save_user($user['userId']);
			set_login_info($userinfo);
			$user=$userinfo;
		}
		
		$page_var['user']=$user;
		$page_var['vsn']=$vsn;
		
		$page_var['sid']=session_id();
		//$page_var['ip'] = get_real_ips();
		
		
		$view->assign('pointlimit', $pointlimit);
		
		//当前页面标示
		$page_var['current_page']="index";
		
		$key = "UJJ$@#KIREW&*&#OHJ";
		$str=$user['username'].$user['password'];
		$gf_token = getSignature($str,$key);
		$page_var['gf_token'] =$gf_token;
		$page_var['coreweb'] =_COREWEB_;
		$limit = 8;
		$cacheTime = 3600;
		foreach($page_var as $key=>$val){
			$view->assign($key,$val);
		}
		$view->registerPlugin("function","toColor","toColor");
		$view->registerPlugin("function","toTime","toTime");
		
		
		$view->display('index_desert.html');
		
		//include("include/footer.inc.php");
		}
	}

?>