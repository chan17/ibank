<?php
/**
* 
*/
class FraudLoanService extends BaseService
{
	function __construct()
	{
		# code...
	}

	public function getLoan($id)
	{
		if (empty($id)) {
			throw new Exception("未获得关键参数", 1);
		}

		$result = $this->getFraudLoanDao()->getLoan($id);
		$loanType = LoanConstants::$Loan_type;
		$result['Loantype'] = $loanType[$result['Loantype']];
		foreach ($result as $key => $value) {
			if ($value == null) {
				$result[$key] = '无';
			}
		}

		return $result;
	}

	public function creatRecharge()
	{
		for ($i=1; $i < 27; $i++) { 
			$Record = new RecordRechargeModel;
			$Record->id = '';
			$Record->Uid = $i;
			$Record->Yue = 0;
			$Record->ColdYue = 0;
			$Record->HandselYue = 0;
			$Record->Create_time = time();
			$Record->Update_time = time();
			$Record->save();
			// var_dump($user->getErrors());exit();
			printf($i,"<br>");

		}

	}

	public function creatUser()
	{
		for ($i=1; $i < 15; $i++) { 
			$LoanBaseInfoModel = LoanBaseInfoModel::model()->findByPk($i);
			$LoanBaseInfoModel->Status = rand(1,2);
			$LoanBaseInfoModel->save();
			// var_dump($user->getErrors());exit();
			printf($i,"<br>");

		}

	}

	public function creatLoan()
	{
		$data = $this->exportData();
		function randomDate($begintime="2014-2-10 0:0:0", $endtime="") {  
		    $begin = strtotime($begintime);  
		    $end = $endtime == "" ? time() : strtotime($endtime);  
		    $timestamp = rand($begin, $end);  
		    return $timestamp;  
		}
		
		for ($i=1; $i < 16; $i++) {
			$badeInfo=new LoanBaseInfoModel;
			$userInfo =new LoanUserInfoModel;
			$userProve =new LoanUserProveModel;
			$recordClick =new RecordClick;
			$time = randomDate();
			
			var_dump($i);

			// $badeInfo->LoanId=$i;
			// $badeInfo->Uid=$i;
			// $badeInfo->Loan_effect_type=rand(1,28);
			// $badeInfo->Loan_title=$data[$i-1]['Loan_title'];
			// $badeInfo->Loan_amount=rand(2,20).'000';
			// $badeInfo->Loan_tern_type=	rand(1,6);
			// $badeInfo->Income=	rand(10.0,80.0);
			// $badeInfo->SingleIncome=	rand(1.0,4.0);
			// $badeInfo->Loan_description= $data[$i-1]['LoanDetail'];
			// $badeInfo->Create_time=	$time;
			// $badeInfo->Update_time=	$time;

			// $userInfo->LoanId=	$i;
			// $userInfo->Uid=	$i;
			// $userInfo->Publisher_type=	1;
			// $userInfo->True_name=	'陈毅豪';
			// $userInfo->Nike_name=	$data[$i-1]['NickName'];
			// $userInfo->Have_car=	rand(1,2);
			// $userInfo->Year_revenue=	rand(350,3600).'00';
			// $userInfo->Create_time=	$time;
			// $userInfo->Update_time=	$time;

			// $userProve->LoanId=	$i;
			// $userProve->Uid=	$i;
			// $userProve->Idcard_url=	'fraud-URL hahahaha';
			// $userProve->House_card_url=	'fraud-URL hahahaha';
			// $userProve->Driving_license_url=	'fraud-URL hahahaha';
			// $userProve->House_add_url=	'fraud-URL hahahaha';
			// $userProve->Income_prove_url=	'fraud-URL hahahaha';
			// $userProve->Job_prove_url=	'fraud-URL hahahaha';
			// $userProve->Wage_prove_url=	'fraud-URL hahahaha';
			// $userProve->Create_time=	$time;
			// $userProve->Update_time=	$time;

			$recordClick->LoanId = $i ;
			$recordClick->LoanUid = $i ;
			$recordClick->Uid = $i ;
			$recordClick->SingleIncome = rand(1.0,4.0) ;
			$recordClick->Create_time = $time ;
			$recordClick->Update_time = $time ;
			$recordClick->Version = 'fraud';
		
			$ggg=$badeInfo->save();
			// $userInfo->save();
			// $userProve->save();
			// $recordClick->save();

			// var_dump("<br>getErrors()",$userInfo->getErrors());
			printf("<br>");

		}

		return print "输入loan ** 条\n";
	}

	private function exportData()
	{
		$fraud_loan = array(
  array('LoanId' => '1','Uid' => '1','NickName' => 'LensCrafters','Username' => '陈毅豪','Level' => '','QQ' => '','Email' => '','Year_revenue' => '0','Jine' => '10000','Endtime' => '18','Phone' => '2147483647','Type' => '0','Income' => '67.00','SingleIncome' => '1.00','Loantype' => '1','Creditreport' => '','Icardstring' => '','Icardurl' => '','Workcard' => '','IncomeCert' => '','HouseCert' => '','LoanDetail' => '我从1991年大学毕业工作至今，我借款主要是为了购买汽车。','Loan_title' => '买车置业','Create_time' => '2147483647','Update_time' => '2147483647','Version' => '1.0'),
  array('LoanId' => '2','Uid' => '2','NickName' => 'Arno wang','Username' => '陈毅豪','Level' => '','QQ' => '','Email' => '','Year_revenue' => '0','Jine' => '20000','Endtime' => '12','Phone' => '13596666666','Type' => '0','Income' => '67.00','SingleIncome' => '1.00','Loantype' => '3','Creditreport' => '','Icardstring' => '','Icardurl' => '','Workcard' => '','IncomeCert' => '','HouseCert' => '','LoanDetail' => '借款人工资一月分两次发放，每月发工资当日有两笔，一笔工资，一笔网转','Loan_title' => '日常消费','Create_time' => '2147483647','Update_time' => '2147483647','Version' => '1.0'),
  array('LoanId' => '3','Uid' => '3','NickName' => 'Antonyyy','Username' => '陈毅豪','Level' => '','QQ' => '','Email' => '','Year_revenue' => '0','Jine' => '1000.55','Endtime' => '17','Phone' => '13596666666','Type' => '0','Income' => '36.00','SingleIncome' => '2.00','Loantype' => '2','Creditreport' => '','Icardstring' => '','Icardurl' => '','Workcard' => '','IncomeCert' => '','HouseCert' => '','LoanDetail' => '兼职找到一条创业的项目，由于去年买房现金都花完了，现在启动需要借款','Loan_title' => '兼职创业','Create_time' => '2147483647','Update_time' => '2147483647','Version' => '1.0'),
  array('LoanId' => '4','Uid' => '4','NickName' => '谨风云','Username' => '陈毅豪','Level' => '','QQ' => '','Email' => '','Year_revenue' => '0','Jine' => '1000.55','Endtime' => '6','Phone' => '13596666666','Type' => '0','Income' => '28.00','SingleIncome' => '2.00','Loantype' => '5','Creditreport' => '','Icardstring' => '','Icardurl' => '','Workcard' => '','IncomeCert' => '','HouseCert' => '','LoanDetail' => '房屋装修，急需借款，本人工作稳定，无还款压力，望批准！谢谢！','Loan_title' => '家居家装','Create_time' => '2147483647','Update_time' => '2147483647','Version' => '1.0'),
  array('LoanId' => '5','Uid' => '5','NickName' => '王子__欣','Username' => '陈毅豪','Level' => '','QQ' => '','Email' => '','Year_revenue' => '0','Jine' => '65000','Endtime' => '14','Phone' => '13596666666','Type' => '0','Income' => '66.00','SingleIncome' => '2.00','Loantype' => '3','Creditreport' => '','Icardstring' => '','Icardurl' => '','Workcard' => '','IncomeCert' => '','HouseCert' => '','LoanDetail' => '我公司是从事自动变速箱配件及维修的的公司。公司销售的自动变速箱配件均为知名厂商生产，产品质量有保障，同时我公司拥有一批专业的维修队伍，为客户提供技术支持，免除了客户的后顾之忧，得到了客户的高度赞誉和稳定支持。此次借款是用于购买原材料周转，希望大家支持。 
还款来源: 公司有自己稳定的客户，同时有众多代理销售机构，以销售收入为还款来源，还款有保障，同时以自己的丰田皇冠作为抵押，请大家放心投标，谢谢支持！','Loan_title' => '进购原材料周转','Create_time' => '2147483647','Update_time' => '2147483647','Version' => '1.0'),
  array('LoanId' => '6','Uid' => '6','NickName' => '军靜靜丶Elvirag','Username' => '陈毅豪','Level' => '','QQ' => '','Email' => '','Year_revenue' => '0','Jine' => '1000.55','Endtime' => '12','Phone' => '13596666666','Type' => '0','Income' => '46.00','SingleIncome' => '2.00','Loantype' => '4','Creditreport' => '','Icardstring' => '','Icardurl' => '','Workcard' => '','IncomeCert' => '','HouseCert' => '','LoanDetail' => ' 申请人提供房产足值抵押，借款的主要目的是扩建电子车间。该车间今后将生产数据传输线及转接端口专供出口。借款资金将用于购进两台全自动拉线机以建立流水线借款用于添置新设备，建立一条生产线。现该车间已建成，员工已配备，设备投产即可运营。产品主要是数据线和转接口，直接出口。该企业紧邻江苏三二四省道，连接徐连高速直达连云港口岸，车程不超过两小时，交通优势较为明显。如该项目投产，将作为当地政府重点支持的新型工业项目，获得政策支持与财政补贴。该项目已经实地考察。
还款来源: 主要通过现已投产的服装车间利润，另电子车间投产后产值将用于还款，提供组织抵押。期望150万的贷款。','Loan_title' => '自动化流水建设
','Create_time' => '2147483647','Update_time' => '2147483647','Version' => '1.0'),
  array('LoanId' => '7','Uid' => '7','NickName' => '密斯折腾是苏菲','Username' => '陈毅豪','Level' => '','QQ' => '','Email' => '','Year_revenue' => '0','Jine' => '16985','Endtime' => '6','Phone' => '13596666666','Type' => '0','Income' => '56.00','SingleIncome' => '2.00','Loantype' => '4','Creditreport' => '','Icardstring' => '','Icardurl' => '','Workcard' => '','IncomeCert' => '','HouseCert' => '','LoanDetail' => '我公司专业研发制作各种节能灯箱产品，如滚动灯箱、太阳能灯箱和EEFL灯箱等。我公司引进国外生产的外部电极荧光灯,应用于广告灯箱，因此取得了良好的节能效果，得到了客户的高度好评。借款用于资金周转，希望大家能够帮忙。
还款来源: 公司产品种类多样，适应性广，安装方便，且较其它灯箱产品，拥有更强的节能效果，因而得到了广大客户的认可，形成了自己稳定的客户群体。以营业收入为还款来源，还款有保障，同时以自己的丰田兰德酷路泽作抵押，请大家放心投标。','Loan_title' => '公司资金周转
','Create_time' => '2147483647','Update_time' => '2147483647','Version' => '1.0'),
  array('LoanId' => '8','Uid' => '8','NickName' => '罗远林','Username' => '陈毅豪','Level' => '','QQ' => '','Email' => '','Year_revenue' => '0','Jine' => '30000','Endtime' => '23','Phone' => '13596666666','Type' => '0','Income' => '56.00','SingleIncome' => '2.00','Loantype' => '5','Creditreport' => '','Icardstring' => '','Icardurl' => '','Workcard' => '','IncomeCert' => '','HouseCert' => '','LoanDetail' => '我公司是集产品创意设计、产品开发、产品销售为一体的专业礼品公司。公司产品包括工艺精品、时尚家居礼品、地方文化礼品等礼品类别。根据客户的不同需求，我公司可以提供个性化礼品定制，产品设计美观，时尚大方，深受客户欢迎，公司稳步向前发展。此次借款是临时经营性周转，会很快还款，希望大家多多支持。
还款来源: 公司为客户设计生产的礼品，设计时尚美观，深受广大客户好评，公司经营稳步发展，有自己稳定的收益，且由担保公司做担保，反担保措施足值，还款无压力，放心投标。','Loan_title' => '经营性周转费用','Create_time' => '2147483647','Update_time' => '2147483647','Version' => '1.0'),
  array('LoanId' => '9','Uid' => '9','NickName' => '亲草','Username' => '陈毅豪','Level' => '','QQ' => '','Email' => '','Year_revenue' => '0','Jine' => '45000','Endtime' => '8','Phone' => '13596666666','Type' => '0','Income' => '32.00','SingleIncome' => '2.00','Loantype' => '4','Creditreport' => '','Icardstring' => '','Icardurl' => '','Workcard' => '','IncomeCert' => '','HouseCert' => '','LoanDetail' => '我公司主营中央空调的销售，是一家集销售、安装、售后维修等于一体的公司。我公司经销的产品均为各大厂商生产，产品质量优良，技术先进，且产品型号多样，能够满足客户不同需求，因而得到了众多客户的支持。我公司同时提供批发与零售两种营销模式，销路广阔，公司业绩蒸蒸日上。此次借款是经营周转，希望大家支持。
还款来源: 公司拥有自己稳定的客户群体，同时在各地拥有众多经销批发商，销量稳步增长，还款无压力，且以自己的讴歌RLX作抵押，不会逾期，放心投标。','Loan_title' => '短期借款周转','Create_time' => '2147483647','Update_time' => '2147483647','Version' => '1.0'),
  array('LoanId' => '10','Uid' => '10','NickName' => 'summerls ','Username' => '陈毅豪','Level' => '','QQ' => '','Email' => '','Year_revenue' => '0','Jine' => '3000','Endtime' => '10','Phone' => '13596666666','Type' => '0','Income' => '69.00','SingleIncome' => '2.00','Loantype' => '2','Creditreport' => '','Icardstring' => '','Icardurl' => '','Workcard' => '','IncomeCert' => '','HouseCert' => '','LoanDetail' => ' 我公司专业设计、生产和销售各类标志性服装，如工作服、西服 , 保安服和校服等。我公司拥有先进的制衣设备和优秀的设计、生产人员，公司生产的服装，设计时尚、新颖，质量上乘，得到了客户的一致好评。此次借款是购买一批原材料，希望大家能够多多支持。
还款来源: 公司经营较好，有自己稳定的客户群体，还款有保障。且重视信用，无不良记录，同时以自己的大众途锐做抵押，不会逾期，放心投标。','Loan_title' => '进购原材料周转
','Create_time' => '2147483647','Update_time' => '2147483647','Version' => '1.0'),
  array('LoanId' => '11','Uid' => '11','NickName' => '风浪纸','Username' => '陈毅豪','Level' => '','QQ' => '','Email' => '','Year_revenue' => '0','Jine' => '9000','Endtime' => '12','Phone' => '13596666666','Type' => '0','Income' => '57.00','SingleIncome' => '2.00','Loantype' => '6','Creditreport' => '','Icardstring' => '','Icardurl' => '','Workcard' => '','IncomeCert' => '','HouseCert' => '','LoanDetail' => '我公司是一家集研发，生产，设计和安装于一体的专业保温防火材料生产商。公司拥有专业先进的生产设备与工艺，拥有专业的研发生产技术人才，且公司经过多年发展，已拥有丰富的实践经验，凭借着精湛的设计、优质的产品和专业的施工，受到了客户的一致好评，并相互建立了稳固的合作关系，公司不断稳步发展。现公司借款主要用于扩大规模后的资金临时周转，希望大家多多帮忙。
还款来源: 公司发展前景良好，有自己稳定的合作客户，且客户群不断拓展，公司规模不断扩大，有能力偿还借款。以自己的奔驰ML320作足值抵押，不会逾期，放心投标。','Loan_title' => '扩大规模，短期借款','Create_time' => '2147483647','Update_time' => '2147483647','Version' => '1.0'),
  array('LoanId' => '12','Uid' => '12','NickName' => '王二大甲鱼','Username' => '陈毅豪','Level' => '','QQ' => '','Email' => '','Year_revenue' => '0','Jine' => '2000','Endtime' => '17','Phone' => '13596666666','Type' => '0','Income' => '6.00','SingleIncome' => '2.00','Loantype' => '5','Creditreport' => '','Icardstring' => '','Icardurl' => '','Workcard' => '','IncomeCert' => '','HouseCert' => '','LoanDetail' => '我公司是一家集环保型喷砂设备、喷漆设备、工业涂装环保设备研发、设计、生产与销售为一体的企业，拥有完整、科学的质量管理体系。 自成立以来一直经营稳定，所生产的产品广受消费者的欢迎，有自己稳定的客户来源，此次借款是用于经营周转，望大家能够帮忙。','Loan_title' => '短期借款，多多帮忙','Create_time' => '2147483647','Update_time' => '2147483647','Version' => '1.0'),
  array('LoanId' => '13','Uid' => '13','NickName' => '大大大芒果','Username' => '陈毅豪','Level' => '','QQ' => '','Email' => '','Year_revenue' => '0','Jine' => '19000','Endtime' => '5','Phone' => '13596666666','Type' => '0','Income' => '16.00','SingleIncome' => '2.00','Loantype' => '4','Creditreport' => '','Icardstring' => '','Icardurl' => '','Workcard' => '','IncomeCert' => '','HouseCert' => '','LoanDetail' => '我公司主要从事喷码机的生产与销售等。公司已成立十年左右，实力雄厚，拥有较强的研发生产能力，现主要生产高解析喷码机、小字符喷码机和激光喷码机等。公司产品品种齐全，型号多样，能够满足客户不同需求，且质量优良，性能稳定，价格低廉，深受客户好评。现在由于公司业务发展较快，想扩大规模，已有部分资金，但缺部分资金周转，故来借款，望大家帮忙','Loan_title' => '扩大规模，短期借款','Create_time' => '2147483647','Update_time' => '2147483647','Version' => '1.0'),
  array('LoanId' => '14','Uid' => '14','NickName' => 'Heidi-嘟嘟小熊','Username' => '陈毅豪','Level' => '','QQ' => '','Email' => '','Year_revenue' => '0','Jine' => '60002','Endtime' => '4','Phone' => '13596666666','Type' => '0','Income' => '19.00','SingleIncome' => '2.00','Loantype' => '3','Creditreport' => '','Icardstring' => '','Icardurl' => '','Workcard' => '','IncomeCert' => '','HouseCert' => '','LoanDetail' => ' 公司产品具有寿命长、节能等优点，在市场上得到了客户的广泛认可，销售额节节攀升，公司经过多年发展已拥有自己稳定的客户群体，收入稳定，还款来源有保障。以自己的奥迪Q7做足值抵押，不会逾期，放心投标。','Loan_title' => '谢谢支持，按时还款','Create_time' => '2147483647','Update_time' => '2147483647','Version' => '1.0')
);
		return $fraud_loan;
	}
}
