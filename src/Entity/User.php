<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ApiResource]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstnam = null;    

    #[ORM\ManyToOne(inversedBy: 'users')]
    private ?Jobs $jobs = null;

    #[Assert\LessThan('-150 years')]
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateOfBirth = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstnam(): ?string
    {
        return $this->firstnam;
    }

    public function setFirstnam(string $firstnam): static
    {
        $this->firstnam = $firstnam;

        return $this;
    }  

    public function getJobs(): ?Jobs
    {
        return $this->jobs;
    }

    public function setJobs(?Jobs $jobs): static
    {
        $this->jobs = $jobs;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(\DateTimeInterface $dateOfBirth): static
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }
}
