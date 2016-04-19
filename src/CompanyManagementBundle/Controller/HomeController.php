<?php

namespace CompanyManagementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller {

    public function homeAction() {



        return $this->render('CompanyManagementBundle:Home:home.html.twig', array());
    }

}
