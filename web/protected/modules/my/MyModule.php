<?php
/**
 * 个人中心模块类
 * FileName:MyModule
 * @author   hushangming
 */
class MyModule extends CWebModule
{
	public $layout = 'application.modules.my.views.layouts.main';
	
	public function init() {
		$this->setImport(array(

		));
	}
}