<?php
/**
 *
 * 功能说明：广场控制器。
 *
 **/

	class squareController{
	
	    public function index(){
	    	global $view;
	    	global $vsn;
	    	
	    	$page_var['vsn']=$vsn;
	    	$page_var['cdn']=_CDNDOMAIN_;
	    	$page_var['current_page']="order";
	    	
	    	$user=checklogin();
	    	$page_var['user']=$user;
	    	
	    	foreach($page_var as $key=>$val){
	    		$view->assign($key,$val);
	    	}
	    	
	        $view->display('square.html');
	       
	    }
	}
?>	
	