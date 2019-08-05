<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VehiculeRepository")
 */
class Vehicule
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numero_matricule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Moniteur", mappedBy="vehicule")
     */
    private $moniteurs;

    public function __construct()
    {
        $this->moniteurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroMatricule(): ?string
    {
        return $this->numero_matricule;
    }

    public function setNumeroMatricule(string $numero_matricule): self
    {
        $this->numero_matricule = $numero_matricule;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|Moniteur[]
     */
    public function getMoniteurs(): Collection
    {
        return $this->moniteurs;
    }

    public function addMoniteur(Moniteur $moniteur): self
    {
        if (!$this->moniteurs->contains($moniteur)) {
            $this->moniteurs[] = $moniteur;
            $moniteur->setVehicule($this);
        }

        return $this;
    }

    public function removeMoniteur(Moniteur $moniteur): self
    {
        if ($this->moniteurs->contains($moniteur)) {
            $this->moniteurs->removeElement($moniteur);
            // set the owning side to null (unless already changed)
            if ($moniteur->getVehicule() === $this) {
                $moniteur->setVehicule(null);
            }
        }

        return $this;
    }
}
