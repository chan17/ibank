<?php
class LoanConstants{
	public static $Publisher_type = array(
		'1'=>'自己发布',
		'2'=>'代人发布'
	);
	
	public static $Edu_type = array(
		'1'=>'研究生及以上',
		'2'=>'本科',
		'3'=>'大专',
		'4'=>'高中',
		'5'=>'中专',
		'6'=>'初中及以下',
	);
	
	public static $Marry_type = array(
		'1'=>'未婚',
		'2'=>'已婚',
		'3'=>'离婚',
		'4'=>'丧偶',
		'5'=>'其他',
	);
	
	public static $House_type = array(
		'1'=>'自置无按揭',
		'2'=>'自置有按揭',
		'3'=>'商住两用',
		'4'=>'租用',
		'5'=>'与父母共住',
		'6'=>'集体宿舍',
		'7'=>'其他',
	);
	
	public static $Checkin_years = array(
		'1'=>'半年以内',
		'2'=>'1年以内',
		'3'=>'2年以内',
		'4'=>'3年以内',
		'5'=>'3年以上',
	);
	
	public static $Have_car = array(
		'1'=>'是',
		'2'=>'否'
	);
	
	public static $Job_type = array(
		'1'=>'工薪族',
		'2'=>'私营业主',
		'3'=>'网店卖家',
		'4'=>'学生',
		'5'=>'其他',
	);
	
	public static $Income_type = array(
		'1'=>'银行卡发放',
		'2'=>'现金发放'
	);
	
	public static $Company_type = array(
		'1'=>'机关事业单位',
		'2'=>'社会团体',
		'3'=>'国有企业',
		'4'=>'三资企业',
		'5'=>'上市公司',
		'6'=>'民营',
		'7'=>'私营',
		'8'=>'个体',
		'9'=>'其他',
	);
	
	public static $Work_experience = array(
		'1'=>'半年以内',
		'2'=>'1年以内',
		'3'=>'2年以内',
		'4'=>'3年以内',
		'5'=>'3年以上',
	);
	
	public static $Loan_effect_type = array(
		'1'=>'实体经营',
		'2'=>'网商经营',
		'3'=>'个人消费',
		'4'=>'累积信用',
		'5'=>'网贷体验',
		'6'=>'其他',
	);
	
	public static $Loan_tern_type = array(
		'7'=>'7个月',
		'8'=>'8个月',
		'9'=>'9个月',
		'10'=>'10个月',
		'11'=>'11个月',
		'12'=>'12个月',
	);
	
	public static $Contact_rels = array(
		'1'=>'配偶',
		'2'=>'子女',
		'3'=>'父母',
		'4'=>'兄弟姐妹',
		'5'=>'朋友',
		'6'=>'同事',
	);

	public static $Loan_type = array(
		'1'=> '信用贷款',
		'2' =>'抵押贷款',
		'3'=>'车贷',
		'4'=>'房贷',
		'5'=>'过桥资金',
		'6'=>'企业贷款',
	);

	public static $Loan_prove = array(
		'Idcard_url'=>'身份认证',
		'House_card_url'=>'房产认证',
		'Driving_license_url'=>'行驶证认证',
		'House_add_url'=>'住址证明认证',
		'Income_prove_url'=>'收入认证',
		'Job_prove_url'=>'工作认证',
		'Wage_prove_url'=>'工资认证',
	);
	public static $Loan_status = array(
		0 =>'审核中',
		1 =>'进行中',
		2 =>'追加中',
	);
}