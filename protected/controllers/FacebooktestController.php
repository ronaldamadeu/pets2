<?php

class FacebooktestController extends Controller
{
	protected $_facebook;
	
	public function init(){
		  require_once(Yii::app()->basePath . "/components/facebook-sdk/facebook.php");

		  $config = array();
		  $config['appId'] = '143731185824462';
		  $config['secret'] = '9b4bf29023596ad9fc5dc88ed97bd17a';
		  $config['fileUpload'] = false; // optional
		
		  $this->_facebook = new Facebook($config);
		  
	}
	public function actionIndex()
	{
		//$this->layout = false;
		
		$app_id = "143731185824462";
		$canvas_page = "http://apps.facebook.com/petcute/";

     	$auth_url = "http://www.facebook.com/dialog/oauth?client_id=" 
            . $app_id . "&redirect_uri=" . urlencode($canvas_page);

     	$signed_request = $_REQUEST["signed_request"];

     	list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

     	$data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);

     	if (empty($data["user_id"])) {
            echo("<script> top.location.href='" . $auth_url . "'</script>");
     	}
     	
	    $model = new Dono;
	    
	    // uncomment the following code to enable ajax-based validation
	    
	    if(isset($_POST['ajax']) && $_POST['ajax']==='dono-cadastro-form')
	    {
	        echo CActiveForm::validate($model);
	        Yii::app()->end();
	    }
	    
	    if(isset($_POST['Dono']))
	    {
	        $model->attributes=$_POST['Dono'];
	        if($model->validate())
	        {
	            // form inputs are valid, do something here
	            return;
	        }
	    }
	    
	    $dados_usuario = $this->_facebook->api("/me");
	    
	    $model->id_facebook = $dados_usuario['id'];
	    $model->nm 		  	= $dados_usuario['name'];
	    $model->nm_cidade 	= $dados_usuario['location']['name'];
	    $username = $dados_usuario['username'];
	    
	    $this->render('../facebook/cadastro',array('model'=>$model, 'username' => $username));
	}


	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}