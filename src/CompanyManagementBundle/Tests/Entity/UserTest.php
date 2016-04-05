<?php

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Created by PhpStorm.
 * User: setzo
 * Date: 05.04.16
 * Time: 11:29
 */
class UserTest extends WebTestCase {

    /**
     * @var EntityManager
     */
    private $_em;

    protected function setUp() {

        $kernel = static::createKernel();
        $kernel->boot();
        $this->_em = $kernel->getContainer()->get('doctrine.orm.entity_manager');
    }

    public function testCreateUser() {

        $user = new \CompanyManagementBundle\Entity\User();

        $department = new \CompanyManagementBundle\Entity\Department();
        $department->setDescription('dsfjbgfsduy');
        $department->setBoss($user);
        $department->setName('ssadasfasf');

        $company = new \CompanyManagementBundle\Entity\Company();
        $company->setName('sadsadd');
        $company->setDescription('asdfsa');
        $company->setCity('sfdiufdsgyuyfdsg');

        $user->setAddress("llelelelel");
        $user->setCity('sasdihasuf');
        $user->setCompany('dsadfsfd');
        $user->setDateAdded(new \DateTime());
        $user->setDepartment($department);

        $this->_em->persist($user);
        $this->_em->flush();
    }
}
