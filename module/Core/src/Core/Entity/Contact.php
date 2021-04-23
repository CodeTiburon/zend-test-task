<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Core\Entity\Repository\ContactRepository")
 * @ORM\Table(name="contacts")
 */
class Contact extends Base
{
    /**
     * @var integer $id
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * Contact's name
     *
     * @ORM\Column(name="name", type="string", length=70)
     * @var string
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=60, unique=true)
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", unique=true, nullable=true)
     */
    protected $phone;

    /**
     * @var string
     * 
     * @ORM\Column(name="agence", type="string")
     */
    protected $agence;

    /**
     * @var string
     * 
     * @ORM\Column(name="dept", type="string", nullable=true)
     */
    protected $dept;

    /**
     * @var string
     * 
     * @ORM\Column(name="canal", type="string")
     */
    protected $canal;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get email address
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set email address
     *
     * @return Person
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAgence(): ?string
    {
        return $this->agence;
    }

    public function setAgence(string $agence): self
    {
        $this->agence = $agence;

        return $this;
    }

    public function getDept(): ?string
    {
        return $this->dept;
    }

    public function setDept(string $dept): self
    {
        $this->dept = $dept;

        return $this;
    }

    public function getCanal(): ?string
    {
        return $this->canal;
    }

    public function setCanal(string $canal): self
    {
        $this->dept = $canal;

        return $this;
    }

    /**
     * Array representation of user entity.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'id'        => $this->getId(),
            'name'      => $this->getName(),
            'email'     => $this->getEmail(),
            'phone'     => $this->getPhone(),
            'agence'    => $this->getAgence(),
            'dept'      => $this->getDept(),
            'canal'     => $this->getCanal(),
        ];
    }
}
