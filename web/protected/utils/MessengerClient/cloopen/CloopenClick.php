<?php
/**
* cloopen的客户端,具体的实现，集成一个基础类..
*
* 先创建账户 createSubAccount
* 然后创建账户 sendSMS
*/
class CloopenClick extends CloopenBase
{

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * 创建子账户
	 * @param friendlyName 子账户名称
	 * @param status 子账户状态
	 * @param type 子账户类型
	 */
	public function createSubAccount($friendlyName) {
		// $rest = new CloopenBase($this->main_account,$this->main_token,$this->app_id,$this->address);
		// 调用云通讯平台的创建子账号,绑定您的子账号名称
		array('status'=>true,'message'=>"Try to create a subaccount, binding to user $friendlyName");
	    $result = $this->CreateSubAccountBase($friendlyName);

	    var_dump($result);exit();
	    if($result == NULL ) {
			return array('status'=>false,'message'=>"短信发送失败");
	    }
	    
	  	// 解析json
	  	$data = json_decode(trim($result," \t\n\r"));
	    
	    if($data->statusCode !=0) {
	        // echo "error code :" . $data->statusCode . "<br/>";
	        //TODO 添加错误处理逻辑
	    	
	    	$resultCode = $data->statusCode;
	    	return $resultCode;
	    } else {
	        echo "create SubbAccount success<br/>";
	        // 获取返回信息
	        $subaccount = $data->SubAccount;
	        echo "subAccountid:".$subaccount->subAccountSid."<br/>";
	        echo "subToken:".$subaccount->subToken."<br/>";
	        echo "dateCreated:".$subaccount->dateCreated."<br/>";
	        echo "voipAccount:".$subaccount->voipAccount."<br/>";
	        echo "voipPwd:".$subaccount->voipPwd."<br/>";
	        //TODO 把云平台创建账号信息存储在您的服务器上.
	        //TODO 添加成功处理逻辑 

	        return $subaccount;
	    }	 
	}

	/**
	 * 发送短信
	 * @param to 短信接收端手机号码集合，用逗号分开
	 * @param body 短信正文
	 * @param msgType 消息类型。取值0（普通短信）、1（长短信），默认值 0 
	 */
	public function sendSMS($to,$body,$msgType) {
		// $rest = new CloopenBase($this->main_account,$this->main_token,$this->app_id,$this->address);
		// 发送短信

		 $result = $this->SendSMSBase($to,$body,$msgType,$this->sub_account);
	    if($result == NULL ) {
			return array('status'=>false,'message'=>"短信发送失败");
	    }
	     
    	// 解析json
    	$data = json_decode(trim($result," \t\n\r"));
	        
	    if($data->statusCode!=0) {
	         // 错误处理逻辑
	        return array('status'=>false,'message'=>"短信发送失败,statusCode:{$data->statusCode}",'statusCode'=>$data->statusCode);
	     }else{
	         // 获取返回信息
	         $smsmessage = $data->SMSMessage;
	         // var_dump('sendSMSsendSMSsendSMS',$smsmessage);exit();
	         //添加成功处理逻辑
	         return array('status'=>true,'message'=>'短信发送失败','statusCode'=>$data->statusCode,'smsMessageSid'=>$smsmessage->smsMessageSid,'dateCreated'=>$smsmessage->dateCreated);
	     }
	}

	/**
	 * 双向回呼   
	 * @param from 主叫电话号码。
	 * @param to 被叫电话号码。
	 */
	// public function test_callBack($from,$to) 
	// {
	//         // 创建REST对象实例
	//         // global $this->main_account,$this->main_token,$this->app_id,$this->sub_account,$this->sub_token,$this->voip_account,$sendType,$this->address;
	// 		// $rest = new CloopenBase($this->main_account,$this->main_token,$this->app_id,$this->address);
	//         // 调用回拨接口
	//         echo "Try to make a callback,called is $to <br/>";
	//         $result = $rest->CallBack($from,$to,$this->sub_account,$this->sub_token);
	//         if($result == NULL ) {
	//             echo "result error!";
	//             break;
	//         }
	                
	//         $data = "";
	//     		if ($sendType == 0)
	//     		{
	//     			// 解析xml
	//     			$data = simplexml_load_string(trim($result," \t\n\r"));
	//   		  }
	//   		  else
	//   		  {
	//     			// 解析json
	//     			$data = json_decode(trim($result," \t\n\r"));
	//    			}  
	        
	//         if($data->statusCode!=0) {
	//             echo "error code :" . $data->statusCode . "<br>";
	//             //TODO data
	//         } else {
	//             echo "callback success!<br>";
	//             // 获取返回信息
	//             $callback = $data->CallBack;
	//             echo "callSid:".$callback->callSid."<br/>";
	//             echo "dateCreated:".$callback->dateCreated."<br/>";
	//            //TODO 添加成功处理逻辑 
	//         }        
	// }

	// createSubAccount("子账户名称123");
	//test_callBack("主叫电话号码","被叫电话号码");
	// sendSMS("短信接收端手机号码集合，用英文逗号分开","短信正文","消息类型");
}


?>