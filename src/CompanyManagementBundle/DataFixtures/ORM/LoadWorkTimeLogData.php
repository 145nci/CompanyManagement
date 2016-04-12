<?php
/**
 * Created by PhpStorm.
 * User: oskar
 * Date: 09.04.16
 * Time: 14:14
 */

namespace CompanyManagement\DataFixtures\ORM;

use CompanyManagementBundle\Entity\WorkTimeLog;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadWorkTimeLogData
{
    public function load(ObjectManager $manager)
    {
        $worktime = new WorkTimeLog();
        $worktime->setDateStart(new \DateTime());
        $worktime->setDateEnd(new \DateTime());
        $worktime->setUser($this->getReference('user_1'));


        $manager->persist($worktime);
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }
}