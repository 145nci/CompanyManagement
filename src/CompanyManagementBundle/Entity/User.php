<?php

namespace CompanyManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="CompanyManagementBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255)
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    protected $lastName;

//    /**
//     * @var string
//     *
//     * @ORM\Column(name="email", type="string", length=255, unique=true)
//     */
//    protected $email;

//    /**
//     * @var string
//     *
//     * @ORM\Column(name="password", type="string", length=255)
//     */
//    protected $password;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime")
     */
    protected $dateAdded;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    protected $address;

    /**
     * @var string
     *
     * @ORM\Column(name="zip_code", type="string", length=255)
     */
    protected $zipCode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    protected $city;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255)
     */
    protected $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="hourly_rate", type="decimal", precision=10, scale=2)
     */
    protected $hourlyRate;

    /**
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="users")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    protected $company;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="WorkTimeLog", mappedBy="user")
     */
    protected $workTimeLogs;

    /**
     * @ORM\ManyToOne(targetEntity="Department", inversedBy="users")
     * @ORM\JoinColumn(name="department_id", referencedColumnName="id")
     */
    protected $department;

    /**
     * @var
     *
     * @ORM\OneToOne(targetEntity="Department", inversedBy="boss")
     */
    protected $managedDepartment;

    /**
     * @ORM\ManyToOne(targetEntity="Role", inversedBy="users")
     * @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     */
    protected $role;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     *
     * @return User
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * Get dateAdded
     *
     * @return \DateTime
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     *
     * @return User
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return User
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set hourlyRate
     *
     * @param string $hourlyRate
     *
     * @return User
     */
    public function setHourlyRate($hourlyRate)
    {
        $this->hourlyRate = $hourlyRate;

        return $this;
    }

    /**
     * Get hourlyRate
     *
     * @return string
     */
    public function getHourlyRate()
    {
        return $this->hourlyRate;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->workTimeLogs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set company
     *
     * @param \CompanyManagementBundle\Entity\Company $company
     *
     * @return User
     */
    public function setCompany(\CompanyManagementBundle\Entity\Company $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \CompanyManagementBundle\Entity\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Add workTimeLog
     *
     * @param \CompanyManagementBundle\Entity\WorkTimeLog $workTimeLog
     *
     * @return User
     */
    public function addWorkTimeLog(\CompanyManagementBundle\Entity\WorkTimeLog $workTimeLog)
    {
        $this->workTimeLogs[] = $workTimeLog;

        return $this;
    }

    /**
     * Remove workTimeLog
     *
     * @param \CompanyManagementBundle\Entity\WorkTimeLog $workTimeLog
     */
    public function removeWorkTimeLog(\CompanyManagementBundle\Entity\WorkTimeLog $workTimeLog)
    {
        $this->workTimeLogs->removeElement($workTimeLog);
    }

    /**
     * Get workTimeLogs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWorkTimeLogs()
    {
        return $this->workTimeLogs;
    }

    /**
     * Set department
     *
     * @param \CompanyManagementBundle\Entity\Department $department
     *
     * @return User
     */
    public function setDepartment(\CompanyManagementBundle\Entity\Department $department = null)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @return \CompanyManagementBundle\Entity\Department
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Set managedDepartment
     *
     * @param \CompanyManagementBundle\Entity\Department $managedDepartment
     *
     * @return User
     */
    public function setManagedDepartment(\CompanyManagementBundle\Entity\Department $managedDepartment = null)
    {
        $this->managedDepartment = $managedDepartment;

        return $this;
    }

    /**
     * Get managedDepartment
     *
     * @return \CompanyManagementBundle\Entity\Department
     */
    public function getManagedDepartment()
    {
        return $this->managedDepartment;
    }

    /**
     * Set role
     *
     * @param \CompanyManagementBundle\Entity\Role $role
     *
     * @return User
     */
    public function setRole(\CompanyManagementBundle\Entity\Role $role = null)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return \CompanyManagementBundle\Entity\Role
     */
    public function getRole()
    {
        return $this->role;
    }

    public function __toString(){
        return $this->firstName.' '.$this->lastName;
    }
}
