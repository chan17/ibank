<?php
Yii::import("application.utils.MessengerClient.cloopen.*"); 

class CloopenBase {
    protected $soft_version = "2013-12-26";  // 平台定义

    protected $main_account;      //读取主账号
    protected $main_token;        //读取主账号Token
    protected $sub_account;       //读取子账号
    protected $sub_token;     //读取子账号Token
    protected $voip_account;      //读取VoIP账号
    protected $voip_password;         //读取VoIP账号密码
    protected $app_id;        //读取APPID 
    protected $address;       //读取REST服务器地址
    protected $xml_config;

    public function __construct()  
    {
        $xml_config = $this->getXML();

        $this->main_account =       $xml_config->main_account;
        $this->main_token =         $xml_config->main_token;
        $this->sub_account =        $xml_config->sub_account;
        $this->sub_token =          $xml_config->sub_token;
        $this->voip_account =       $xml_config->voip_account;
        $this->voip_password =      $xml_config->voip_password;
        $this->app_id =             $xml_config->app_id;
        $this->address =            $xml_config->server_address;
    }

    /**
    * 创建子账户
    * @param friendlyName 子账户名称
    */
    public function CreateSubAccountBase($friendlyName)
    {
        // 拼接请求包体
        $body="{'appId':'$this->app_id','friendlyName':'$friendlyName'}";
        // 大写的sig参数  
        $sig =  strtoupper(md5($this->main_account . $this->main_token . date("YmdHis")));
        // 生成请求URL
        $url="https://$this->address/$this->soft_version/Accounts/$this->main_account/SubAccounts?sig=$sig";
        // 生成授权：主账户Id + 英文冒号 + 时间戳。
        $authen = base64_encode($this->main_account . ":" . date("YmdHis"));
        // 生成包头 
        $header = array("Accept:application/json","Content-Type:application/json;charset=utf-8","Authorization:$authen");
        
        // 发送请求
        $result = $this->curl_postJSON($url,$body,$header);

        return $result;
    }

    /**
    * 双向回呼
    * @param from 主叫电话号码。
    * @param to 被叫电话号码。
    * @param sub_account 子账户Id
    * @param sub_token 子账户的授权令牌   
    */
    // public function CallBack($from,$to,$sub_account,$sub_token)
    // {
    //       // 拼接请求包体
    //       $body= "{'from':'$from','to':'$to'}";       
    //       // 大写的sig参数  
    //       $sig =  strtoupper(md5($sub_account . $sub_token . date("YmdHis")));
    //       // 生成请求URL
    //       $url="https://$this->address/$this->soft_version/SubAccounts/$sub_account/Calls/Callback?sig=$sig";
    //       // 生成授权：子账户Id + 英文冒号 + 时间戳。 
    //       $authen=base64_encode($sub_account . ":" . date("YmdHis"));
    //       // 生成包头 
    //       $header = array("Accept:application/json","Content-Type:application/json;charset=utf-8","Authorization:$authen");
    //       // 发送请求
    //       $result = $this->curl_postJSON($url,$body,$header);
         
    //       return $result;
    // }

    /**
    * 发送短信
    * @param to 短信接收端手机号码集合,用逗号分开
    * @param body 短信正文
    * @param msgType 消息类型。取值0（普通短信）、1（长短信），默认值 0
    * @param sub_account 子账户Id
    */
    public function SendSMSBase($to,$body,$msgType=0,$sub_account)
    {
        // 拼接请求包体
        $body= "{'to':'$to','body':'$body','msgType':'$msgType','appId':'$this->app_id','subAccountSid':'$sub_account'}"; 
        // 大写的sig参数 
        $sig =  strtoupper(md5($this->main_account . $this->main_token . date("YmdHis")));
        // 生成请求URL        
        $url="https://$this->address/$this->soft_version/Accounts/$this->main_account/SMS/Messages?sig=$sig";

        // 生成授权：主账户Id + 英文冒号 + 时间戳。
        $authen = base64_encode($this->main_account . ":" . date("YmdHis"));
        // 生成包头
        $header = array("Accept:application/json","Content-Type:application/json;charset=utf-8","Authorization:$authen");
        // 发送请求
        $result = $this->curl_postJSON($url,$body,$header);

        return $result;
    }

    /**
    * 发起HTTPS请求
    */
    protected function curl_postJSON($url,$data,$header,$post=1)
    {
        // if (function_exists('curl_init')) {
        //     $ch = curl_init('http://www.baidu.com/');
        //     curl_getinfo($ch) ? print('CURL已开启') : print('CURL未开启');
        // } else {
        //     print('CURL未开启');
        // }

        //初始化curl
        $ch = curl_init();

        //参数设置     
        $result = curl_setopt ($ch, CURLOPT_URL,$url);  
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt ($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, $post);

        // if($post){
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch,CURLOPT_HTTPHEADER,$header);

            $result = curl_exec ($ch);
        // }
        连接失败
        if($result == FALSE){
           return print curl_error($ch);
        }

        curl_close($ch);
        return $result;
    }

    /**
    *读取xml参数
    */
    protected function getXML()
    {
        ini_set('allow_url_fopen ','ON');
        // var_dump(dirname(__FILE__));die();
        $xml_config = simplexml_load_file(dirname(__FILE__).'/config.xml'); //将配置文件 XML中的数据,读取到数组对象中 
        
        return $xml_config;
    }

}
?>
