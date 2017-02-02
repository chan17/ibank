<?php
/**
* 
*/
class LogGainClickService extends BaseService
{

	function __construct()
	{
	}

    // 用loanID 获取一条  点击收益流水 
    public function getSingleIncomeByLoanId($loanId)
    {
        if (empty($loanId)) {
            throw new Exception("未获得关键参数", 1);
        }

        $result = $this->getLogGainClickDao()->getSingleIncomeByLoanId($loanId);
        if (empty($result)) {
            throw new Exception("未获得返回参数", 1);
        }
        return $result;
    }

    // 用useID 获取一条  点击收益流水 
    public function getSingleIncomeByUserId($userId)
    {
        if (empty($userId)) {
            throw new Exception("未获得关键参数", 1);
        }

        $result = $this->getLogGainClickDao()->getSingleIncomeByUserId($userId);
        if (empty($result)) {
            throw new Exception("未获得返回参数", 1);
        }
        
        return $result;
    }

    public function getLoanIdsByUserId($userId)
    {
        if (empty($userId)) {
            throw new Exception("未获得关键参数", 1);
        }
        $result = $this->getLogGainClickDao()->getLoanIdsByUserId($userId);
        $loanIds =array();
        foreach ($result as $key => $value) {
            $loanIds[] = $value['LoanId'];
        }

        return $loanIds;
    }

    // 是否重复购买  未购买返回true
    public function isRepeatBuy($loanId,$userId)
    {
        if (empty($loanId)) {
            throw new Exception("未获得关键参数", 1);
        }        
        if (empty($userId)) {
            throw new Exception("未获得关键参数", 1);
        }
        $result = $this->getLogGainClickDao()->getlogByUserLoan($loanId,$userId);
        // var_dump('daaaaa',$result);exit();

        if (empty($result)) {
            return true;
        }else{
            return false;
        }
    }

}