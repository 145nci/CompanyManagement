<?php

namespace CompanyManagementBundle\Libraries\Regexp;

class RegexpService {

    private $container;

    private $generator;

    public function __construct($container) {

        $this->container = $container;
        $this->generator = $this->container->get('regexp_generator');
    }

    public function matchAll($wordsToMatch, $compareAgainst) {

        if(!isset($wordsToMatch) || !is_array($wordsToMatch) || count($wordsToMatch) == 0) {

            throw new \Exception('Bad parameter passed.');
        }

        $expression = $this->generator->matchingAll($wordsToMatch);

        if(preg_match($expression, $compareAgainst)) {
            return true;
        }

        return false;
    }

}
