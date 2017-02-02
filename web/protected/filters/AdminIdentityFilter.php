<?php
/**
 * 身份控制过滤器
 * 需要登录的action都需要经过此做身份判断
 */
class AdminAuthFilter extends CFilter{
    public function preFilter($filterChain){
        // 可以在此增加身份过滤代码
       

        $loginUrl = Yii::app()->controller->createUrl('/admin/auth/login');
        Yii::app()->controller->redirect($loginUrl);
        return false;
    }
    
    public function postFilter($filterChain){

        return true;
    }
}