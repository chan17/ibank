<?php
class BaseAuthController extends Controller{
	public function filters(){
		return array(
			array('application.filters.AuthFilter'), // 过滤器 
		);
	}

    /**
     * HTTP POST
     * @param  string 	$url    要请求的url地址
     * @param  array 	$params 请求的参数
     * @return string
     */
    public function postRequest($url, $params)
    {
    	$curl = curl_init();

    	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    	curl_setopt($curl, CURLOPT_USERAGENT, 'account client');
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
		curl_setopt($curl, CURLOPT_URL, $url );
// print_r($params);
		curl_setopt($curl, CURLINFO_HEADER_OUT, TRUE );
		// var_dump('curl',$curl);
		// var_dump('url',$url);
		$response = curl_exec($curl);

		curl_close($curl);

		return $response;
    }

    /**
     * HTTP GET
     * @param  string 	$url    要请求的url地址
     * @param  array 	$params 请求的参数
     * @return string
     */
    public function getRequest($url, $params)
    {

    	$curl = curl_init();

    	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    	curl_setopt($curl, CURLOPT_USERAGENT, 'account client');
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HEADER, 0);

    	$url = $url . '?' . http_build_query($params);
		curl_setopt($curl, CURLOPT_URL, $url );
		// print($url);exit();
		$response = curl_exec($curl);

		curl_close($curl);

		return $response;
    }
}