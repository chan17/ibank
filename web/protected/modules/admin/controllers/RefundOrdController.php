<?php
/**
*	退款什么的
*
**/
class RefundOrdController extends BaseAdminAuthController
{
	public $layout = '';
	
	// 提款记录ID
	public function actionYeepay($id)
	{
		$recordWithdrawal = RecordWithdrawalModel::model()->findByPk($id);
		$url = 'https://www.yeepay.com/app-merchant-proxy/command';
		// $$params = array(
		// 	'p0_Cmd'=>'RefundOrd',
		// 	'p1_MerId'=>
		// );
		$this->postRequest($url,$params);
		return 
	}

	/**
	 * HTTP POST
	 * @param  string 	$url    要请求的url地址
	 * @param  array 	$params 请求的参数
	 * @return string
	 */
	function postRequest($url, $params)
	{
		$curl = curl_init();

		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_USERAGENT, 'account client');
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 0);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
		curl_setopt($curl, CURLOPT_URL, $url );
		// curl_setopt($tuCurl, CURLOPT_HTTPHEADER, array("Content-Disposition: form-data", "name=yeepay")); 
		// curl_setopt($curl, CURLINFO_HEADER_OUT, TRUE );
		var_dump('curl',$url);
		$response = curl_exec($curl);
		var_dump('postRequestpostRequest',$response);

		curl_close($curl);

		return $response;
	}