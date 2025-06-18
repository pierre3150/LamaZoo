<?php

namespace App\Entity;

use App\Repository\ApplicationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApplicationRepository::class)]
class Application
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomAppli = null;

    /**
     * @var Collection<int, HistoHabilitation>
     */
    #[ORM\OneToMany(targetEntity: HistoHabilitation::class, mappedBy: 'apllication')]
    private Collection $histoHabilitations;

    #[ORM\ManyToOne(inversedBy: 'applications')]
    private ?RoleApplicatif $roleApplicatif = null;

    public function __construct()
    {
        $this->histoHabilitations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAppli(): ?string
    {
        return $this->nomAppli;
    }

    public function setNomAppli(string $nomAppli): static
    {
        $this->nomAppli = $nomAppli;

        return $this;
    }

    /**
     * @return Collection<int, HistoHabilitation>
     */
    public function getHistoHabilitations(): Collection
    {
        return $this->histoHabilitations;
    }

    public function addHistoHabilitation(HistoHabilitation $histoHabilitation): static
    {
        if (!$this->histoHabilitations->contains($histoHabilitation)) {
            $this->histoHabilitations->add($histoHabilitation);
            $histoHabilitation->setApllication($this);
        }

        return $this;
    }

    public function removeHistoHabilitation(HistoHabilitation $histoHabilitation): static
    {
        if ($this->histoHabilitations->removeElement($histoHabilitation)) {
            // set the owning side to null (unless already changed)
            if ($histoHabilitation->getApllication() === $this) {
                $histoHabilitation->setApllication(null);
            }
        }

        return $this;
    }

    public function getRoleApplicatif(): ?RoleApplicatif
    {
        return $this->roleApplicatif;
    }

    public function setRoleApplicatif(?RoleApplicatif $roleApplicatif): static
    {
        $this->roleApplicatif = $roleApplicatif;

        return $this;
    }
}
