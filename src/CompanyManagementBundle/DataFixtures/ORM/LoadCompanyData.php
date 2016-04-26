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
use CompanyManagementBundle\Entity\Company;

class LoadCompanyData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $company = new Company();
        $company->setAddress('address');
        $company->setCity('city');
        $company->setDescription('description');
        $company->setEmail('mail@mail.pl');
        $company->setFax('123456789');
        $company->setName('name');
        $company->setNip('123456789');
        $company->setTelephone('123456789');
        $company->setZipCode('123456789');

        $this->addReference('company_1', $company);

        $manager->persist($company);
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