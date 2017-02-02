<?php
// Yii::import("application.models.*");
// require_once('../../../models/LogPayment.php');
/*
 * @Description �ױ�֧��B2C����֧���ӿڷ��� 
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
		
		#	ֻ��֧���ɹ�ʱ�ױ�֧���Ż�֪ͨ�̻�.
		##֧���ɹ��ص������Σ�����֪ͨ������֧����������е�p8_Url�ϣ�������ض���;��������Ե�ͨѶ.
		#	�������ز���.
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
		// $r5_Pid = '��ֵ����������Ψ���˻�';
		// $r6_Order = '51ibank281403513278';
		// $r7_Uid = '';
		// $r8_MP = '28CUT6CUTaddAndjumploan';
		// $r9_BType = 1;
		// $hmac = getCallbackHmacString($r0_Cmd,$r1_Code,$r2_TrxId,$r3_Amt,$r4_Cur,$r5_Pid,$r6_Order,$r7_Uid,$r8_MP,$r9_BType);

		#	�жϷ���ǩ���Ƿ���ȷ��True/False��
		$bRet = CheckHmac($r0_Cmd,$r1_Code,$r2_TrxId,$r3_Amt,$r4_Cur,$r5_Pid,$r6_Order,$r7_Uid,$r8_MP,$r9_BType,$hmac);
		#	���ϴ���ͱ�������Ҫ�޸�.
			 	
		#	У������ȷ.
		if($bRet){
			if($r1_Code=="1"){
				// $paySession = Yii::app()->Session;
				$expandMS = explode("CUT",$r8_MP);
				$currentUid = $expandMS[0];
			#	��Ҫ�ȽϷ��صĽ�����̼����ݿ��ж����Ľ���Ƿ���ȣ�ֻ����ȵ�����²���Ϊ�ǽ��׳ɹ�.
			#	������Ҫ�Է��صĴ������������ƣ����м�¼�������Դ����ڽ��յ�֧�����֪ͨ���ж��Ƿ���й�ҵ���߼�������Ҫ�ظ�����ҵ���߼�������ֹ��ͬһ�������ظ��������������.      	  	
				// Ĭ��ֵ == 1
				if($r9_BType=="1"){
					// �潻�׼�¼
					$logPaymentModel = new LogPayment;
					$logPaymentModel->Uid = $currentUid;
					$logPaymentModel->PayOrderId = $r6_Order;
					$logPaymentModel->LoanId = $expandMS[1];
					$logPaymentModel->Type = $expandMS[2];
					$logPaymentModel->Money = $r3_Amt;
					$logPaymentModel->Update_time = $logPaymentModel->Create_time = time();
					$logPaymentModel->save();

					// +����ֶ�
					$rechargeRecord = RecordRechargeModel::model()->findByAttributes(array('Uid'=>$currentUid));
					// var_dump($currentUid);exit();
					$rechargeRecord->Yue = $rechargeRecord['Yue']+$r3_Amt;
					if (!$rechargeRecord->save()) {
						throw new Exception("�������ʧ��", 1);
					}
					
					// ��ת  ���ݻش���ֵr8_MP �ж�
					return $expandMS;

				}elseif($r9_BType=="2"){
					#�����ҪӦ�����������д��,��success��ͷ,��Сд������.
					echo "success";
					echo "<br />���׳ɹ�";
					echo  "<br />����֧������������";      			 
				}
			}
			
		}else{
			// throw new Exception('������Ϣ���۸�');
			throw new Exception('������Ϣ����');
		}
	}

	public function getPHP()
	{

	}
}
   
?>
