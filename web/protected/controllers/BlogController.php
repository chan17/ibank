<?php

/*
    http://localhost/ibank/web/libs/ueditor/
    富文本编辑器，编辑好文档点左上角的HTML按钮,直接使用这些代码
*/
class BlogController extends Controller
{
	public $layout='//blog/main';

	public function actionArticle($flag)
	{
		$this->render($flag,array(
			'flag'=>$flag,
		));
	}
}

