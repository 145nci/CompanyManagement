<?php
/**
 * Created by PhpStorm.
 * User: oskar
 * Date: 08.04.16
 * Time: 15:14
 */

namespace CompanyManagement\DataFixtures\ORM;

use CompanyManagementBundle\Entity\Department;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadDepartmentData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $department = new Department();
        $department->setName('department');
        $department->setDescription('description');
//        $department->setBoss($this->getReference('user_1'));

        $this->addReference('department_1', $department);

        $manager->persist($department);
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }
}