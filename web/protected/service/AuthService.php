<?php

// 只做产考，运行不来，还没写完
class AuthService extends BaseService{
    private $partner = null;

    public function register($registration, $type = 'default')
    {
        $authUser = $this->getAuthProvider()->register($registration);

        if ($type == 'default') {
            if (!empty($authUser['id'])){
                $registration['token'] = array(
                    'userId' => $authUser['id'],
                );
            }
            $newUser = $this->getUserService()->register($registration, $this->getAuthProvider()->getProviderName());

        } else {
            $newUser = $this->getUserService()->register($registration, $type);
            if (!empty($authUser['id'])) {
                $this->getUserService()->bindUser($this->getPartnerName(), $authUser['id'], $newUser['id'], null);
            }
        }

        return $newUser;
    }

    public function syncLogin($userId)
    {
        $providerName = $this->getAuthProvider()->getProviderName();
        $bind = $this->getUserService()->getUserBindByTypeAndUserId($providerName, $userId);
        if (empty($bind)) {
            return '';
        }

        return $this->getAuthProvider()->syncLogin($bind['fromId']);
    }

    public function syncLogout($userId)
    {
        $providerName = $this->getAuthProvider()->getProviderName();
        $bind = $this->getUserService()->getUserBindByTypeAndUserId($providerName, $userId);
        if (empty($bind)) {
            return '';
        }

        return $this->getAuthProvider()->syncLogout($bind['fromId']);
    }

    public function changeNickname($userId, $newName)
    {
        if ($this->hasPartnerAuth()) {
            $providerName = $this->getAuthProvider()->getProviderName();
            $bind = $this->getUserService()->getUserBindByTypeAndUserId($providerName, $userId);
            if ($bind) {
                $this->getAuthProvider()->changeNickname($bind['fromId'], $newName);
            }
           
        }
        
        $this->getUserService()->changeNickname($userId, $newName);
    }


    public function changePassword($userId, $oldPassword, $newPassword)
    {
        if ($this->hasPartnerAuth()) {
            $providerName = $this->getAuthProvider()->getProviderName();
            $bind = $this->getUserService()->getUserBindByTypeAndUserId($providerName, $userId);
            if ($bind) {
                $this->getAuthProvider()->changePassword($bind['fromId'], $oldPassword, $newPassword);
            }
        }

        $this->getUserService()->changePassword($userId, $newPassword);
    }

    public function checkUsername($username)
    {
        $result = $this->getAuthProvider()->checkUsername($username);
        if ($result[0] != 'success') {
            return $result;
        }


        $avaliable = $this->getUserService()->isNicknameAvaliable($username);
        if (!$avaliable) {
            return array('error_duplicate', '名称已存在!');
        }

        return array('success', '');
    }

    public function checkPhone($phone)
    {
        $result = $this->getAuthProvider()->checkPhone($phone);
        if ($result[0] != 'success') {
            return $result;
        }
        $avaliable = $this->getUserService()->isPhoneAvaliable($phone);
        if (!$avaliable) {
            return array('error_duplicate', 'Phone已存在!');
        }

        return array('success', '');
    }

    public function checkPassword($userId, $password)
    {
        if ($this->hasPartnerAuth()) {
            $providerName = $this->getAuthProvider()->getProviderName();
            $bind = $this->getUserService()->getUserBindByTypeAndUserId($providerName, $userId);
            if (!$bind) {
                return $this->getUserService()->verifyPassword($userId, $password);
            }
            $checked = $this->getAuthProvider()->checkPassword($bind['fromId'], $password);

            if ($checked) {
                return true;
            }
        }

        return $this->getUserService()->verifyPassword($userId, $password);
    }

    public function checkPartnerLoginById($userId, $password)
    {
        return $this->getAuthProvider()->checkLoginById($userId, $password);
    }

    public function checkPartnerLoginByNickname($nickname, $password)
    {
        return $this->getAuthProvider()->checkLoginByNickname($nickname, $password);
    }

    public function checkPartnerLoginByEmail($email, $password)
    {
        return $this->getAuthProvider()->checkLoginByEmail($email, $password);
    }

    public function getPartnerAvatar($userId, $size = 'middle')
    {
        $providerName = $this->getAuthProvider()->getProviderName();
        $bind = $this->getUserService()->getUserBindByTypeAndUserId($providerName, $userId);
        if (!$bind) {
            return null;
        }
        return $this->getAuthProvider()->getAvatar($bind['fromId'], $size);
    }

    public function hasPartnerAuth()
    {
        return $this->getAuthProvider()->getProviderName() != 'default';
    }

    public function getPartnerName()
    {
        return $this->getAuthProvider()->getProviderName();
    }

    private function getAuthProvider()
    {
        if (!$this->partner) {
            $setting = $this->getSettingService()->get('user_partner');
            if (empty($setting) or empty($setting['mode'])) {
                $partner = 'default';
            } else {
                 $partner = $setting['mode'];
            }

            if (!in_array($partner, array('discuz', 'phpwind', 'default'))) {
                throw new \InvalidArgumentException();
            }

            $class = substr(__NAMESPACE__, 0, -5) . "\\AuthProvider\\" . ucfirst($partner) . "AuthProvider";

            $this->partner = new $class();
        }

        return $this->partner;
    }

    public function getUserService()
    {
        $userService = new UserService;
        return $UserService;
    }

}