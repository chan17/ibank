<?php
// Yii::import("application.models.*");
// require_once('../../../models/LogPayment.php');
/*
 * @Description 易宝支付B2C在线支付接口范例 
 * @V3.0
 * @Author rui.xin
 */
 
include 'yeepayCommon.php';	

class callback {
	// public function __construct()
	// {
	// 	$this->getPHP();
	// }
	
	public function processCallBack($YPrequest)
	{
		
		#	只有支付成功时易宝支付才会通知商户.
		##支付成功回调有两次，都会通知到在线支付请求参数中的p8_Url上：浏览器重定向;服务器点对点通讯.
		#	解析返回参数.
		// $vvv = getCallBackValue($YPrequest);
		$r0_Cmd		= $YPrequest['r0_Cmd'];
		$r1_Code	= $YPrequest['r1_Code'];
		$r2_TrxId	= $YPrequest['r2_TrxId'];
		$r3_Amt		= $YPrequest['r3_Amt'];
		$r4_Cur		= $YPrequest['r4_Cur'];
		$r5_Pid		= $YPrequest['r5_Pid'];
		$r6_Order	= $YPrequest['r6_Order'];
		$r7_Uid		= $YPrequest['r7_Uid'];
		$r8_MP		= $YPrequest['r8_MP'];
		$r9_BType	= $YPrequest['r9_BType']; 
		$hmac		= $YPrequest['hmac'];
		// $r0_Cmd = 'Buy';
		// $r1_Code = 1;
		// $r2_TrxId = 'vdvdvdvdvd';
		// $r3_Amt = '7.02';
		// $r4_Cur = 'RMB';
		// $r5_Pid = '充值给您的世纪唯银账户';
		// $r6_Order = '51ibank281403513278';
		// $r7_Uid = '';
		// $r8_MP = '28CUT6CUTaddAndjumploan';
		// $r9_BType = 1;
		// $hmac = getCallbackHmacString($r0_Cmd,$r1_Code,$r2_TrxId,$r3_Amt,$r4_Cur,$r5_Pid,$r6_Order,$r7_Uid,$r8_MP,$r9_BType);

		#	判断返回签名是否正确（True/False）
		$bRet = CheckHmac($r0_Cmd,$r1_Code,$r2_TrxId,$r3_Amt,$r4_Cur,$r5_Pid,$r6_Order,$r7_Uid,$r8_MP,$r9_BType,$hmac);
		#	以上代码和变量不需要修改.
			 	
		#	校验码正确.
		if($bRet){
			if($r1_Code=="1"){
				// $paySession = Yii::app()->Session;
				$expandMS = explode("CUT",$r8_MP);
				$currentUid = $expandMS[0];
			#	需要比较返回的金额与商家数据库中订单的金额是否相等，只有相等的情况下才认为是交易成功.
			#	并且需要对返回的处理进行事务控制，进行记录的排它性处理，在接收到支付结果通知后，判断是否进行过业务逻辑处理，不要重复进行业务逻辑处理，防止对同一条交易重复发货的情况发生.      	  	
				// 默认值 == 1
				if($r9_BType=="1"){
					// 存交易记录
					$logPaymentModel = new LogPayment;
					$logPaymentModel->Uid = $currentUid;
					$logPaymentModel->PayOrderId = $r6_Order;
					$logPaymentModel->LoanId = $expandMS[1];
					$logPaymentModel->Type = $expandMS[2];
					$logPaymentModel->Money = $r3_Amt;
					$logPaymentModel->Update_time = $logPaymentModel->Create_time = time();
					$logPaymentModel->save();

					// +余额字段
					$rechargeRecord = RecordRechargeModel::model()->findByAttributes(array('Uid'=>$currentUid));
					// var_dump($currentUid);exit();
					$rechargeRecord->Yue = $rechargeRecord['Yue']+$r3_Amt;
					if (!$rechargeRecord->save()) {
						throw new Exception("余额增加失败", 1);
					}
					
					// 跳转  根据回传的值r8_MP 判断
					return $expandMS;

				}elseif($r9_BType=="2"){
					#如果需要应答机制则必须回写流,以success开头,大小写不敏感.
					echo "success";
					echo "<br />交易成功";
					echo  "<br />在线支付服务器返回";      			 
				}
			}
			
		}else{
			// throw new Exception('交易信息被篡改');
			throw new Exception('交易信息出错');
		}
	}

	public function getPHP()
	{

	}
}
   
?>
