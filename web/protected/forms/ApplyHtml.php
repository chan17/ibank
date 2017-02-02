<?php
class ApplyHtml extends CHtml{
	public static $errorContainerTag='em';
	public static function error($model,$attribute,$htmlOptions=array())
	{
		parent::resolveName($model,$attribute); // turn [a][b]attr into attr
		$error=$model->getError($attribute);
		if($error!='')
		{
			if(!isset($htmlOptions['class']))
				$htmlOptions['class']=self::$errorMessageCss;
			return self::tag(self::$errorContainerTag,$htmlOptions,$error);
		}
		else
			return '';
	}
}