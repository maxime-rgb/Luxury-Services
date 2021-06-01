<?php

namespace App\Entity;

use App\Repository\GenderRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GenderRepository::class)
 */
class Gender
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Male;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Female;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Undefined;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMale(): ?string
    {
        return $this->Male;
    }

    public function setMale(string $Male): self
    {
        $this->Male = $Male;

        return $this;
    }

    public function getFemale(): ?string
    {
        return $this->Female;
    }

    public function setFemale(string $Female): self
    {
        $this->Female = $Female;

        return $this;
    }

    public function getUndefined(): ?string
    {
        return $this->Undefined;
    }

    public function setUndefined(string $Undefined): self
    {
        $this->Undefined = $Undefined;

        return $this;
    }
}
