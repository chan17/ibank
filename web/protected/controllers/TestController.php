<?php
Yii::import("application.utils.MessengerClient.cloopen.*"); 

class TestController extends Controller
{
	public $layout='//layouts/test';

	public function actionIndex()
	{
		// $cloopen = new CloopenClick;
		// // $result = $cloopen->sendSMS('13858038315','body 短信正文body 短信正文body 短信正文',0);
		// $result = $this->getSendSMSService()->getCode(13858038315);
		throw new Exception("Error Processing Request", 1);

		// $result = $this->getUserService()->CalculationOfLevel(1);
		// var_dump($result);exit();

		$this->render('index',array(


		));
	}

	public function actionLogin()
	{
		// $oauthUser = json_encode( array('nickname'=>'陈一七'));
  //       return $this->redirect(array('register/index','type'=>'Qq','oauthUser'=>$oauthUser));

        $openUser = $this->getUserService()->getUserByOpenid(66);
		var_dump($openUser);exit();
	}

	public function actionFraud()
	{
		$result = $this->getFraudLoanService()->creatRecharge();
		// $result = rand(2,20).'0000';
		// var_dump($result);exit();

		$this->render('index',array(
		));
	}

	public function actionIsCurl()
	{
        if (function_exists('curl_init')) {
            $ch = curl_init('http://www.baidu.com/');
            curl_getinfo($ch) ? print('CURL已开启') : print('CURL未开启');
        } else {
            print('CURL未开启');
        }
	}

	public function actionFront()
	{

		$this->render('front',array(
		));
	}

	public function actionTest(){
		$chinese2Spell = new Chinese2Spell();
		// 获取某一个汉字对应的拼音
		$_str = '胡';
		$_spell1 = $chinese2Spell->getSpell($_str);
		echo '"'.$_str.'"-对应的拼音为：'.$_spell1.'<br />';
		// 获取一串汉字对应的拼音
		$_str = '胡尚明';
		$_spell2 = $chinese2Spell->getSpells($_str);
		echo '"'.$_str.'"-对应的拼音为：'.$_spell2.'<br />';
		// 获取某个汉字的首字母
		$_str = '胡';
		$_spell3 = $chinese2Spell->getSpells($_str, 1);
		echo '"'.$_str.'"-首字母为：'.$_spell3.'<br />';
		// 获取一串汉字对应的首字母
		$_str = '胡尚明';
		$_len = mb_strlen($_str,'UTF-8');
		echo '"'.$_str.'"-对应的首字母为：';
		for($i=0;$i<$_len;$i++){
			$_dochar = mb_substr($_str,$i,1,'UTF-8');
			$_charspell = $chinese2Spell->getSpells($_dochar,1);
			echo $_charspell;
		}
	}

	public function actionError(){
		throw new CHttpException();
		

	}
}