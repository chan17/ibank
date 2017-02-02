<?php
/**
* 
*/
class UserService extends BaseService
{

	function __construct()
	{
	}

	public function creatUser($userForm,$type)
	{
        // var_dump($userForm);exit();
        // $userForm = array("qquser"=> array(["Qqopenid"]=>"5A1E3336BA473173B1BB7CC2737C4FE3","Nickname"=>"徐玉国" ,"Gender"=>1));
        $userAR = new User;
        $userAR->Nickname = $userForm['Nickname'];
        $userAR->Phone = $userForm['Phone'];
        $userAR->Purview = $userForm['purview'];

        // $code = $this->getSendSMSService()- >getCode($userForm['Phone']);
        // if ($userForm['phoneVerified'] != $code) {
        //     return array('status'=>false,'message'=>'短信验证不正确.');
        // }
        $userAR->Create_time = time();
        $userAR->Update_time = time();
        $userAR->PhoneVerified = 1;
        if ($type == 'Qq') {
            $userAR->Qqopenid = $userForm['qquser']['Qqopenid'];
            $userAR->Password = 'qqlogin';
        }else{
            $userAR->Password = md5($userForm['Password']);
        }
		unset($userForm);
        $resultUser = $userAR->save();
// var_dump($userAR->getErrors());

        $recharge = new RecordRechargeModel;
        $recharge->Uid = $userAR->Uid;
        $recharge->Yue = 0;
        $recharge->ColdYue = 0;
        // $recharge->HandselYue = 0;
        $recharge->Create_time = time();
        $recharge->Update_time = time();
        $resultRecharge = $recharge->save();
// var_dump($recharge->getErrors());exit();


        if ($resultRecharge==true  && $resultUser==true) {
            $result = true;
        }else{
            $result = false;
        }

		return $result;
	}

    public function updateUser($userId,$userForm,$type)
    {
        // var_dump($userForm);exit();
        
        $userAR = RecordRechargeModel::model()->findByAttributes(array('Uid'=>$userId));
        $userAR->Nickname = $userForm['Nickname'];
        $userAR->Phone = $userForm['Phone'];
        $userAR->Purview = $userForm['purview'];

        // $code = $this->getSendSMSService()- >getCode($userForm['Phone']);
        // if ($userForm['phoneVerified'] != $code) {
        //     return array('status'=>false,'message'=>'短信验证不正确.');
        // }
        $userAR->Create_time = time();
        $userAR->Update_time = time();
        $userAR->PhoneVerified = 1;
        if ($type == 'Qq') {
            $userAR->Qqopenid = $userForm['qquser']['Qqopenid'];
            $userAR->Password = 'qqlogin';
        }else{
            $userAR->Password = md5($userForm['Password']);
        }
        unset($userForm);
        $resultUser = $userAR->save();
// var_dump($userAR->getErrors());

        $recharge = new RecordRechargeModel;
        $recharge->Uid = $userAR->Uid;
        $recharge->Yue = 0;
        $recharge->ColdYue = 0;
        // $recharge->HandselYue = 0;
        $recharge->Create_time = time();
        $recharge->Update_time = time();
        $resultRecharge = $recharge->save();
// var_dump($recharge->getErrors());exit();

        if ($resultRecharge==true  && $resultUser==true) {
            $result = true;
        }else{
            $result = false;
        }

        return $result;
    }

    /*
    *   @var $userProve  判断userProve表中的几个字段，如果为空，表示没有验证
    *   审核的时候计算
    */
    public function CalculationOfLevel($userId)
    {
        $fraction = 0;

        $yearRevenue = $this->getLoanUserInfoDao()->findYearrevenueByUid($userId);
        $userProve = $this->getLoanUserProveDao()->getLoan($yearRevenue['LoanId']);
        unset($userProve['LoanId']);unset($userProve['Uid']); unset($userProve['Create_time']);unset($userProve['Update_time']);
        unset($userProve['Auth_mobile']);unset($userProve['Contact_one_name']);unset($userProve['Contact_one_rel']);unset($userProve['Contact_one_mobile']);
        unset($userProve['Contact_two_name']);
        unset($userProve['Contact_two_rel']);
        unset($userProve['Contact_two_mobile']);

        if ($yearRevenue <= 100000) {
            $fraction += 10; 
        }elseif (100000 < $yearRevenue && $yearRevenue <= 200000) {
            $fraction += 20; 
        }elseif (200000 < $yearRevenue) {
            $fraction += 30;
        }
        foreach ($userProve as $key => $value) {
            if ($value != NULL) {
                $fraction += 10;
            }
        }

        if ($fraction <= 10) {
            $level = 'A';
        }elseif(10 < $fraction && $fraction <=20){
            $level = 'AA';
        }elseif(20 < $fraction && $fraction <=30){
            $level = 'AAA';
        }elseif(30 < $fraction && $fraction <=50){
            $level = 'AAAA';
        }elseif(50 < $fraction){
            $level = 'AAAAA';
        }

        $user=User::model()->findByPk($userId);
        $user->Level= $level;
        if (!$user->save()) {
            // throw new Exception("信用存取失败：".$user->getErrors(), 1);
            throw new Exception("信用存取失败");
        }

        return  $level;
    }

    public function CalculationOfSingleIncome($userId,$level)
    {
        // 默认所有点击收益一毛钱
        unset($level);
        $singleIncome = 0.1;
        // 一个A == 一个点击收益
        // $singleIncome = strlen($level);

        $user=User::model()->findByPk($userId);
        $user->SingleIncome= $singleIncome;
        if (!$user->save()) {
            // throw new Exception("点击收益存取失败：".$user->getErrors(), 1);
            throw new Exception("点击收益存取失败");
        }

        return $singleIncome;
    }

    public function getUserByPhone($phone)
    {
        if (empty($phone)) {
            return null;
        }
        $user = User::model()->find('Phone=:Phone',array(':Phone'=>$phone));

        unset($phone);
        if(empty($user)){
            return null;
        } else {
            //echo $user['Roles'];die;
            //$user['Roles'] = array($user['Roles']);
            return $user;
        }
    }
    
    public function getLevelPurviewByIds($ids)
    {
        if (!is_array($ids)) {
            return null;
        }
        $result = User::model()->findAllByPk($ids,array('select'=>'Uid,Nickname,Level,Purview'));

        return $result;
    }

    public function getLevelByIds($ids)
    {
        if (!is_array($ids)) {
            return null;
        }
        $levelUser = User::model()->findAllByPk($ids,array('select'=>'Uid,Level'));

        return $levelUser;
    }

    public function getPurviewByIds($ids)
    {
        if (!is_array($ids)) {
            return null;
        }
        $result = User::model()->findAllByPk($ids,array('select'=>'Uid,Purview'));

        return $result;
    }

    public function getNikeNameByIds($ids)
    {
        if (!is_array($ids)) {
            return null;
        }

        $levelUser = User::model()->findAllByPk($ids,array('select'=>'Uid,Nickname'));

        return $levelUser;
    }

    public function getSingleIncomeById($id)
    {
        if (empty($id)) {
            return null;
        }
        // $result = User::model()->find('Uid=:Uid',array(':Uid'=>$id));

        $result = User::model()->findByPk($id,array('select'=>'Uid,SingleIncome'));

        return $result;
    }

    public function getUserByOpenid($openid)
    {
        if (empty($openid)) {
            throw new Exception("未获得关键参数", 1);
        }
        $result = User::model()->find('Qqopenid=:Qqopenid',array(':Qqopenid'=>$openid));

        return $result;
    }

    public function getUser($id)
    {
        if (empty($id)) {
            return NUll;
        }
        $result = User::model()->find('Uid=:Uid',array(':Uid'=>$id));

        return $result;
    }

    // 用户不存在返回 true
    public function isPhoneAvailable($phone)
    {
        if (empty($phone)) {
            return false;
        }
        $user = $this->getUserByPhone($phone);

        return empty($user) ? true : false;
    }

    public function isPhoneVerifiedAvailable($phone)
    {
        if (empty($phone)) {
            return array('status'=>false,'message'=>'手机参数错误');
        }

        $user = $this->getUserByPhone($phone);
        if (empty($user)) {
            return array('status'=>true,'message'=>'手机未注册');
            if ($user['PhoneVerified'] == 1) {
                return array('status'=>flase,'message'=>'手机已验证');
            }
        }

        return array('status'=>true,'message'=>'手机未注册');
    }
}

?>