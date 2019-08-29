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
     * @ORM\OneToMany(targetEntity="App\Entity\SeanceConduite", mappedBy="vehicule", cascade={"persist", "remove"})
     */
    private $seancesconduite;

    public function __construct()
    {
        $this->seancesconduite = new ArrayCollection();
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
     * @return Collection|SeanceConduite[]|null
     */
    public function getSeancesConduite()
    {
        return $this->seancesconduite;
    }

    public function addSeancesConduite(SeanceConduite $seancesconduite): self
    {
        if (!$this->seancesconduite->contains($seancesconduite)) {
            $this->seancesconduite[] = $seancesconduite;
            $seancesconduite->setVehicule($this);
        }

        return $this;
    }

    public function removeSeancesConduite(SeanceConduite $seancesconduite): self
    {
        if ($this->seancesconduite->contains($seancesconduite)) {
            $this->seancesconduite->removeElement($seancesconduite);
            // set the owning side to null (unless already changed)
            if ($seancesconduite->getVehicule() === $this) {
                $seancesconduite->setVehicule(null);
            }
        }

        return $this;
    }
}
