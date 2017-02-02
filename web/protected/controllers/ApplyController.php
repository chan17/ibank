<?php
/**
 * 申请控制器
 * 用于发布借款、填写个人信息、资质提交等
 */
class ApplyController extends BaseAuthController{
	/**
	 * @var CActiveRecord
	 */
	private $_model;
	public $layout = 'apply_loan_main';
	
	protected function encodeS($step=1, $id=0){
		$_str = $step.'|'.$id;
		return urlencode(base64_encode($_str));
	}
	
	protected function decodeS($s){
		$_s = urldecode($s);
		$_s = base64_decode($_s);
		$_sArr = explode('|', $_s);
		return array('step'=>$_sArr[0], 'id'=>intval(@$_sArr[1]));
	}
	
	protected function loanStep1($id){
		$session = Yii::app()->session;
		$model = new LoanUserInfoForm();
		$model->Have_car = 2;
		$model->Job_type = 1;
		$model->Income_type = 1;
		$_loanUserInfo = null;
		if($id){
			$_loanUserInfoObj = LoanUserInfoModel::model()->findByPk($id,'',array('Uid'=>$session[SessionKey::UID]));
			if(isset($_loanUserInfoObj->attributes) && !empty($_loanUserInfoObj->attributes)){
				$_loanUserInfo = $_loanUserInfoObj->attributes;
				foreach($_loanUserInfoObj->attributes as $_key=>$_val){
					$model->$_key = $_val;
				}
			}
		}
		
		/**
		 * 页面ajax异步判断数据合法性
		 */
		if(isset($_POST['ajax']) && 'loan_user_info_form'===$_POST['ajax']){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		/**
		 * 如果是Post请求，且已经通过了上述合法性检查
		 */
		if(Yii::app()->request->isPostRequest){
			$_model = new LoanUserInfoModel();
			$_attributes = $_POST['LoanUserInfoForm'];
			$_attributes['Uid'] = $session[SessionKey::UID];
			$_attributes['Update_time'] = time();
			if(!$id){
				$_attributes['Create_time'] = time();
			}
			$_model->attributes = $_attributes;
			if(!$id && $_model->save()){
				$_url = $this->createUrl('/apply/loan', array('s'=>$this->encodeS(2, $_model->LoanId)));
				$this->redirect($_url);
			}elseif($id && $_model->updateByPk($id, $_attributes)){
				$_url = $this->createUrl('/apply/loan', array('s'=>$this->encodeS(2, $id)));
				$this->redirect($_url);
			}
		}
		$this->render('loan_user_info', array('model'=>$model));
		Yii::app()->end();
	}
	
	protected function loanStep2($id){
		$session = Yii::app()->session;
		$model = new LoanBaseInfoForm();
		$_loanBaseInfoObj = LoanBaseInfoModel::model()->findByAttributes(array('LoanId'=>$id,'Uid'=>$session[SessionKey::UID]));
		if(isset($_loanBaseInfoObj->attributes) && !empty($_loanBaseInfoObj->attributes)){
			foreach($_loanBaseInfoObj->attributes as $_key=>$_val){
				$model->$_key = $_val;
			}
		}

		/**
		 * 页面ajax异步判断数据合法性
		 */
		if(isset($_POST['ajax']) && 'loan_base_info_form'===$_POST['ajax']){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		/**
		 * 如果是Post请求，且已经通过了上述合法性检查
		 */
		if(Yii::app()->request->isPostRequest){
			if(empty($_loanBaseInfoObj)){ // 新增
				$_model = new LoanBaseInfoModel();	
				$_attributes = $_POST['LoanBaseInfoForm'];
				$_attributes['Uid'] = $session[SessionKey::UID];
				$_attributes['LoanId'] = $id;
				$_attributes['Update_time'] = time();
				$_attributes['Create_time'] = time();
				$_model->attributes = $_attributes;
				if($_model->save()){
					$_url = $this->createUrl('/apply/loan', array('s'=>$this->encodeS(3, $_model->LoanId)));
					$this->redirect($_url);
				}
			}else{ // 编辑
				$_updateAttrs = array_keys($_POST['LoanBaseInfoForm']);
				$_updateAttrs[] = 'Update_time';
				foreach($_POST['LoanBaseInfoForm'] as $_key=>$_val){
					$_loanBaseInfoObj->$_key = $_val;
				}
				$_loanBaseInfoObj->Update_time = time();
				if($_loanBaseInfoObj->update($_updateAttrs)){
					$_url = $this->createUrl('/apply/loan', array('s'=>$this->encodeS(3, $id)));
					$this->redirect($_url);
				}
			}
		}

		$this->render('loan_base_info', array('model'=>$model));
		Yii::app()->end();
	}
	
	protected function loanStep3($id){
		$session = Yii::app()->session;
		$model = new LoanUserProveForm();
		$_loanUserProveObj = LoanUserProveModel::model()->findByAttributes(array('LoanId'=>$id,'Uid'=>$session[SessionKey::UID]));
		if(isset($_loanUserProveObj->attributes) && !empty($_loanUserProveObj->attributes)){
			foreach($_loanUserProveObj->attributes as $_key=>$_val){
				$model->$_key = $_val;
			}
		}
		/**
		 * 页面ajax异步判断数据合法性
		 */
		if(isset($_POST['ajax']) && 'loan_user_prove_form_contact'===$_POST['ajax']){ // 联系人部分
			$_modelContact = new LoanUserProveContactForm();
			$_POST['LoanUserProveContactForm'] = $_POST['LoanUserProveForm'];
			$_errorMsg = CActiveForm::validate($_modelContact);
			$_errorMsg = str_replace('LoanUserProveContactForm', 'LoanUserProveForm', $_errorMsg);
			echo $_errorMsg;
			Yii::app()->end();
		}
		if(Yii::app()->request->isPostRequest){
			if(isset($_POST['formName']) && 'loan_user_prove_form_contact'===$_POST['formName']){
				$_POST['LoanUserProveContactForm'] = $_POST['LoanUserProveForm'];
				if(empty($_loanUserProveObj)){ // 新增联系人信息
					$_model = new LoanUserProveModel();
					$_attributes = $_POST['LoanUserProveContactForm'];
					$_attributes['Uid'] = $session[SessionKey::UID];
					$_attributes['LoanId'] = $id;
					$_attributes['Update_time'] = time();
					$_attributes['Create_time'] = time();
					$_model->attributes = $_attributes;
					if($_model->save()){
						echo 1;
						Yii::app()->end();
					}else{
						echo 0;
						Yii::app()->end();
					}
				}else{ // 更新联系人信息
					foreach($_POST['LoanUserProveContactForm'] as $_key=>$_val){
						$_loanUserProveObj->$_key = $_val;
					}
					$_loanUserProveObj->Update_time = time();
					if($_loanUserProveObj->update()){
						echo 1;
						Yii::app()->end();
					}else{
						echo 0;
						Yii::app()->end();
					}
				}
			}elseif(isset($_POST['formName']) && 'loan_user_prove_form_idcard'===$_POST['formName']){
				$applyService = new ApplyService();
				$upCode = $applyService->uploadImg($id, $session[SessionKey::UID], 'Idcard', $_FILES['files']);
				if(!in_array($upCode, array('-1','-2','-3'))){ // 上传成功
					if(empty($_loanUserProveObj)){
						$_model = new LoanUserProveModel();
						$_model->LoanId = $id;
						$_model->Uid = $session[SessionKey::UID];
						$_model->Idcard_url = $upCode;
						$_model->Create_time = $_model->Update_time = time();
						if($_model->save()){
							echo 1;
							Yii::app()->end();
						}else{
							echo 0;
							Yii::app()->end();
						}
					}else{
						$_loanUserProveObj->Idcard_url = $upCode;
						if($_loanUserProveObj->update()){
							echo 1;
							Yii::app()->end();
						}else{
							echo 0;
							Yii::app()->end();
						}
					}
				}
				echo $upCode;
				Yii::app()->end();
			}elseif(isset($_POST['formName']) && 'loan_user_prove_form_house_add'===$_POST['formName']){
				$applyService = new ApplyService();
				$upCode = $applyService->uploadImg($id, $session[SessionKey::UID], 'House_add', $_FILES['files']);
				if(!in_array($upCode, array('-1','-2','-3'))){ // 上传成功
					if(empty($_loanUserProveObj)){
						$_model = new LoanUserProveModel();
						$_model->LoanId = $id;
						$_model->Uid = $session[SessionKey::UID];
						$_model->House_add_url = $upCode;
						$_model->Create_time = $_model->Update_time = time();
						if($_model->save()){
							echo 1;
							Yii::app()->end();
						}else{
							echo 0;
							Yii::app()->end();
						}
					}else{
						$_loanUserProveObj->House_add_url = $upCode;
						if($_loanUserProveObj->update()){
							echo 1;
							Yii::app()->end();
						}else{
							echo 0;
							Yii::app()->end();
						}
					}
				}
				echo $upCode;
				Yii::app()->end();
			}
			echo 'sss';
			Yii::app()->end();
		}
		$this->render('loan_user_prove', array('model'=>$model,'userid'=>$session[SessionKey::UID]));
		Yii::app()->end();
	}
	
	/**
	 * 我要借款action
	 * 其中填写个人信息、借款信息、资质信息都在此action实现，通过每步传入的步骤标记s来识别
	 */
	public function actionLoan(){
		//echo $this->encodeS(1,1);die;
		// 开启session
		$session = Yii::app()->session;
		// 接收get参数s，s串存入的是当前步骤+借款ID的加密串
		$_sArr = $this->decodeS(strval(@$_GET['s']));
		//print_r($_sArr);die;
		$step = in_array($_sArr['step'], array(1,2,3)) ? $_sArr['step'] : 1; // 默认为第一步
		// 接收get参数id，如果有id表示当前执行的是update操作，否则是add操作
		$id = $_sArr['id'];
		switch($step){
			case 1:
				$this->loanStep1($id);
				break;
			case 2:
				$this->loanStep2($id);
				break;
			case 3:
				$this->loanStep3($id);
				break;
		}

		Yii::app()->end();
	}
}