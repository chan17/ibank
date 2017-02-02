<?php
class ErrorController extends Controller
{
	public $layout='//layouts/column-pure';

	public function actionIndex()
	{
	    if($errorInfo=Yii::app()->errorHandler->error)
	    {
	    	// $errorInfo = $error=Yii::app()->errorHandler->error;
	    	if ($errorInfo['code'] == 404) {
	    		$statusMS = '咦？您要访问的页面不存在。';
	    		$errorMessage = '来源链接是否正确？用户或借款是否存在？';
	    	}elseif ($errorInfo['code'] == 500) {
	    		$statusMS = '啊哦，服务器开小差了';
	    		$errorMessage = $errorInfo['message'];
	    	}elseif ($errorInfo['code'] == 400) {
	    		$statusMS = '啊哦，服务器开小差了';
	    		$errorMessage = $errorInfo['message'];
	    	}else{
	    		$statusMS = '啊哦，程序生病了。';
	    		$errorMessage = $errorInfo['message'];
	    	}
    		// var_dump(Yii::app()->errorHandler->error);
	    }

		return $this->render('index',array(
			'statusMS'=>$statusMS,
			'message'=>$errorMessage,
		));
	}


}