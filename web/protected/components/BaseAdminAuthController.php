<?php
class BaseAdminAuthController extends Controller{
	public function filters(){
		return array(
			array('application.filters.AdminAuthFilter'), // 过滤器 
		);
	}
}