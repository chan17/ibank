<?php

class AuditController extends BaseAdminAuthController
{
    public $layout = '/audit/audit-main';

    public $aNav = 'audit';
    public $twoNav;

    public function actionloan()
    {
        $criteria = new CDbCriteria();
        $criteria->order = 'Update_time desc'; //按什么字段来排序
        // if(Yii::app()->request->isPostRequest){
        //  if(!empty($_POST['userneme'])){
        //      $criteria->addSearchCondition('Nickname',$_POST['userneme']);
        //  }
        // }

        $count = LoanBaseInfoModel::model()->count($criteria);//count() 函数计算数组中的单元数目或对象中的属性个数。
        $pager = new CPagination($count);
        $pager->pageSize = 15; //每页显示的行数

        $pager->applyLimit($criteria);
        $posts = LoanBaseInfoModel::model()->findAll($criteria);//查询所有的数据
        if (empty($posts)) {
            $ids = null;
            $postsUser = null;
        }
    
        foreach ($posts as $key => $value) {
            $ids[] = $value['Uid'];
            $cityIds[] = $value['CityId'];
        }
        $resultUser = User::model()->findAllByPk($ids,array('select'=>'Uid,Nickname'));
        $resultCity = $this->getInfoCityService()->getCityNameByIds($cityIds);

        foreach ($resultUser as $key => $value) {
            $postsUser[$value['Uid']] = $value['Nickname'];
        }

        $loanType = LoanConstants::$Loan_type;
        $loan_status = LoanConstants::$Loan_status;
        $this->twoNav = 'loan';
        $this->render('loan',array(
            'pages'=>$pager,
            'posts'=>$posts,
            'postsUser'=>$postsUser,
            'postsCity'=>$resultCity,
            'loanType'=>$loanType,
            'loanStatus'=>$loan_status,
        ));
    }

    public function actionAjaxChangeStatus($loanid)
    {
        if (empty($loanid)) {
            throw new Exception("id is undefined", 1);
        }

        $newStatus = 1;
        $result = LoanBaseInfoModel::model()->updateByPk($loanid, array('Status'=>$newStatus));
        return print json_encode(($result)?true:false);
    }

    public function actionLoanDetail($id)
    {

        $aloan = $this->getLoanService()->getLoan($id);
        $prove= array();
        $prove['Idcard_url'] = $aloan['loanUserProve']['Idcard_url'];
        $prove['House_card_url'] = $aloan['loanUserProve']['House_card_url'];
        $prove['Driving_license_url'] = $aloan['loanUserProve']['Driving_license_url'];
        $prove['House_add_url'] = $aloan['loanUserProve']['House_add_url'];
        $prove['Income_prove_url'] = $aloan['loanUserProve']['Income_prove_url'];
        $prove['Job_prove_url'] = $aloan['loanUserProve']['Job_prove_url'];
        $prove['Wage_prove_url'] = $aloan['loanUserProve']['Wage_prove_url'];
// var_dump($aloan);exit();
        $user = $this->getUserService()->getUser($aloan['loanUserInfo']['Uid']);

        $this->twoNav = 'loanDetail';
        $this->render('loanDetail',array(
            'aload'=>$aloan,
            'user'=>$user,
            'prove'=>$prove,
            // 'loanIdAndSI'=>$aload['recordClick'],
            'proveName'=>LoanConstants::$Loan_prove,
        ));
    }

    public function actionWithdrawal()
    {
        $criteria = new CDbCriteria();
        $criteria->order = 'Update_time desc'; //按什么字段来排序
        // if(Yii::app()->request->isPostRequest){
        //  if(!empty($_POST['userneme'])){
        //      $criteria->addSearchCondition('Nickname',$_POST['userneme']);
        //  }
        // }

        $count = RecordWithdrawalModel::model()->count($criteria);//count() 函数计算数组中的单元数目或对象中的属性个数。
        $pager = new CPagination($count);
        $pager->pageSize = 15; //每页显示的行数

        $pager->applyLimit($criteria);
        $posts = RecordWithdrawalModel::model()->findAll($criteria);//查询所有的数据
        if (empty($posts)) {
            $ids = null;
            $postsUser = null;
        }
    
        foreach ($posts as $key => $value) {
            $ids[] = $value['Uid'];
        }
        $resultUser = User::model()->findAllByPk($ids,array('select'=>'Uid,Nickname'));
        foreach ($resultUser as $key => $value) {
            $postsUser[$value['Uid']] = $value['Nickname'];
        }

        $loanType = LoanConstants::$Loan_type;
        $loan_status = LoanConstants::$Loan_status;
        $this->twoNav = 'withdrawal';
        $this->render('withdrawal',array(
            'pages'=>$pager,
            'posts'=>$posts,
            'postsUser'=>$postsUser,

            'loanType'=>$loanType,
            'loanStatus'=>$loan_status,
        ));
    }

    public function actionAjaxChangeWithdrawalStatus($id)
    {
        if (empty($id)) {
            throw new Exception("id is undefined", 1);
        }

        $newStatus = 1;
        $result = RecordWithdrawalModel::model()->updateByPk($id, array('Status'=>$newStatus));
        return print json_encode(($result)?true:false);
    }

    public function actionNoPurview($twoNav)
    {
        $this->twoNav = $twoNav;
        $this->render('no-purview');
    }

    public function filters() {
        if (Yii::app()->user->purview == 3) {
            return array(
                'postOnly + AjaxChangeWithdrawalStatus,Withdrawal,LoanDetail,AjaxChangeStatus,loan',
            );
        }
    }

    public function filterPostOnly($filterChain)
    {
        $name = $this->getAction()->getId();
 
        return $this->redirect(array('NoPurview','twoNav'=>$name));
    }

}