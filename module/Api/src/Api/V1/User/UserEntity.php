<?php
namespace Api\V1\User;

use Doctrine\ORM\Mapping as ORM;

/*
 * @ORM\Entity(repositoryClass="Core\Entity\Repository\UserRepository")
 * @ORM\Table(name="contacts")
 */
class UserEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    protected $email;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    protected $phone;

    /**
     * @ORM\Column(type="string")
     */
    protected $agence;

    /**
     * @ORM\Column(type="string")
     */
    protected $dept;

    /**
     * @ORM\Column(type="string")
     */
    protected $canal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
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
}
