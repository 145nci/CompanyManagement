<?php

namespace CompanyManagementBundle\Libraries;


class AclService {

    private $allowed;

    public function __construct() {
        $this->allowed = array();
        $this->allowed[] = 'company_management_homepage';
        $this->allowed[] = 'fos_user_security_login';
        $this->allowed[] = 'fos_user_security_check';
        $this->allowed[] = 'fos_user_security_logout';
        $this->allowed[] = 'fos_user_resetting_request';
        $this->allowed[] = 'fos_user_resetting_send_email';
        $this->allowed[] = 'fos_user_resetting_check_email';
        $this->allowed[] = 'fos_user_resetting_reset';
        $this->allowed[] = 'fos_user_change_password';
    }

    /**
     * @param \CompanyManagementBundle\Entity\User $user
     * @return boolean
     */
    public function hasAccess($user, $request) {

        $action = $request->attributes->get('_route');

        if(in_array($action, $this->allowed)) {
            return true;
        }

        $actions = $this->notEmpty($user);

        if ($actions === false) {
            return false;
        }

        if (in_array($action, $actions)) {
            return true;
        }

        return false;
    }

    private function notEmpty($user) {

        if (!isset($user) || empty($user) || !is_object($user)) {
            return false;
        }

        $role = $user->getRole();

        if (!isset($role) || empty($role) || !is_object($role)) {
            return false;
        }

        $actions = @unserialize($user->getRole()->getAllowedActions());

        if (!isset($actions) || empty($actions) || !is_array($actions)) {
            return false;
        }

        return $actions;
    }
}
