<?php

namespace App\Entity;

use App\Repository\HistoHabilitationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HistoHabilitationRepository::class)]
class HistoHabilitation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTime $dateHeure = null;

    #[ORM\Column(length: 255)]
    private ?string $action = null;

    #[ORM\ManyToOne(inversedBy: 'histoHabilitations')]
    private ?Personnel $personnel = null;

    #[ORM\ManyToOne(inversedBy: 'histoHabilitations')]
    private ?Application $apllication = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateHeure(): ?\DateTime
    {
        return $this->dateHeure;
    }

    public function setDateHeure(\DateTime $dateHeure): static
    {
        $this->dateHeure = $dateHeure;

        return $this;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(string $action): static
    {
        $this->action = $action;

        return $this;
    }

    public function getPersonnel(): ?Personnel
    {
        return $this->personnel;
    }

    public function setPersonnel(?Personnel $personnel): static
    {
        $this->personnel = $personnel;

        return $this;
    }

    public function getApllication(): ?Application
    {
        return $this->apllication;
    }

    public function setApllication(?Application $apllication): static
    {
        $this->apllication = $apllication;

        return $this;
    }
}
