<?php
class ApplyActiveForm extends CActiveForm{
	public function error($model,$attribute,$htmlOptions=array(),$enableAjaxValidation=true,$enableClientValidation=true)
	{
		if(!$this->enableAjaxValidation)
			$enableAjaxValidation=false;
		if(!$this->enableClientValidation)
			$enableClientValidation=false;

		if(!isset($htmlOptions['class']))
			$htmlOptions['class']=$this->errorMessageCssClass;

		if(!$enableAjaxValidation && !$enableClientValidation)
			return ApplyHtml::error($model,$attribute,$htmlOptions);

		$id=CHtml::activeId($model,$attribute);
		$inputID=isset($htmlOptions['inputID']) ? $htmlOptions['inputID'] : $id;
		unset($htmlOptions['inputID']);
		if(!isset($htmlOptions['id']))
			$htmlOptions['id']=$inputID.'_em_';

		$option=array(
			'id'=>$id,
			'inputID'=>$inputID,
			'errorID'=>$htmlOptions['id'],
			'model'=>get_class($model),
			'name'=>$attribute,
			'enableAjaxValidation'=>$enableAjaxValidation,
		);

		$optionNames=array(
			'validationDelay',
			'validateOnChange',
			'validateOnType',
			'hideErrorMessage',
			'inputContainer',
			'errorCssClass',
			'successCssClass',
			'validatingCssClass',
			'beforeValidateAttribute',
			'afterValidateAttribute',
		);
		foreach($optionNames as $name)
		{
			if(isset($htmlOptions[$name]))
			{
				$option[$name]=$htmlOptions[$name];
				unset($htmlOptions[$name]);
			}
		}
		if($model instanceof CActiveRecord && !$model->isNewRecord)
			$option['status']=1;

		if($enableClientValidation)
		{
			$validators=isset($htmlOptions['clientValidation']) ? array($htmlOptions['clientValidation']) : array();
			unset($htmlOptions['clientValidation']);

			$attributeName = $attribute;
			if(($pos=strrpos($attribute,']'))!==false && $pos!==strlen($attribute)-1) // e.g. [a]name
			{
				$attributeName=substr($attribute,$pos+1);
			}

			foreach($model->getValidators($attributeName) as $validator)
			{
				if($validator->enableClientValidation)
				{
					if(($js=$validator->clientValidateAttribute($model,$attributeName))!='')
						$validators[]=$js;
				}
			}
			if($validators!==array())
				$option['clientValidation']=new CJavaScriptExpression("function(value, messages, attribute) {\n".implode("\n",$validators)."\n}");
		}

		$html=ApplyHtml::error($model,$attribute,$htmlOptions);
		if($html==='')
		{
			if(isset($htmlOptions['style']))
				$htmlOptions['style']=rtrim($htmlOptions['style'],';').';display:none';
			else
				$htmlOptions['style']='display:block';
			$html=CHtml::tag(ApplyHtml::$errorContainerTag,$htmlOptions,'*');
		}

		$this->attributes[$inputID]=$option;
		return $html;
	}
}