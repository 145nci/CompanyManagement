<?php

/**
 * Created by PhpStorm.
 * User: adam
 * Date: 05.04.16
 * Time: 13:28
 */
namespace CompanyManagement\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use CompanyManagementBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin->setFirstName('admin');
        $userAdmin->setLastName('admin');
        $userAdmin->setEmail('admin@admin.pl');
        $userAdmin->setPassword('test');
        $userAdmin->setDateAdded(new \DateTime());
        $userAdmin->setAddress('adminowa 12');
        $userAdmin->setZipCode('48-123');
        $userAdmin->setCity('Mrągowo');
        $userAdmin->setTelephone('123456789');
        $userAdmin->setDepartment($this->getReference('department_1'));
        $userAdmin->setHourlyRate('42.31');
        $userAdmin->setCompany($this->getReference('company_1'));

        $userAdmin->setRole($this->getReference('role_1'));

        $this->addReference('user_1', $userAdmin);

        $manager->persist($userAdmin);
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 3;
    }
}