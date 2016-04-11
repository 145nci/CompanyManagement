<?php

namespace CompanyManagementBundle\Libraries;

class RegexpGeneratorService {

    public function matchingAll($array) {

        if(!isset($array) || !is_array($array) || count($array) == 0) {

            throw new \Exception('Bad parameter passed.');
        }

        $regexp = '/^';

        foreach($array as $futureMatch) {

            $regexp .= '(?=.*\b' . $futureMatch . '\b)';
        }

        $regexp .= '.*$/si';

        return $regexp;
    }
}
