<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SeanceRepository")
 */
class Seance
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="time")
     */
    private $Horaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_formation;

    /**
     * @ORM\Column(type="time")
     */
    private $Heure_debut;

    /**
     * @ORM\Column(type="time")
     */
    private $Heure_fin;
    /**
     * @ORM\Column(type="time")
     */
    protected $debut;

    /**
     * @ORM\Column(type="time")
     */
    private $fin;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Moniteur", mappedBy="seance")
     */
    private $moniteur;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Moniteur", mappedBy="Seance")
     */
    private $moniteurs;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Moniteur", mappedBy="seance")
     */
    private $seance;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Candidat", mappedBy="seance")
     */
    private $seances;



    /**
     * @ORM\Column(type="time")
     */
    private $total;

    /**
     * @ORM\Column(type="integer")
     */
    private $Nbjc;

    public function __construct()
    {
        $this->moniteur = new ArrayCollection();
        $this->moniteurs = new ArrayCollection();
        $this->seance = new ArrayCollection();
        $this->seances = new ArrayCollection();
    }


    public function getDebut(): ?\DateTimeInterface
   {
            return $this->fin;
   }

    public function setDebut(\DateTimeInterface $debut): self
    {
            $this->debut = $debut;

            return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHoraire(): ?\DateTimeInterface
    {
        return $this->Horaire;
    }

    public function setHoraire(\DateTimeInterface $Horaire): self
    {
        $this->Horaire = $Horaire;

        return $this;
    }

    public function getTypeFormation(): ?string
    {
        return $this->type_formation;
    }

    public function setTypeFormation(string $type_formation): self
    {
        $this->type_formation = $type_formation;

        return $this;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->Heure_debut;
    }

    public function setHeureDebut(\DateTimeInterface $Heure_debut): self
    {
        $this->Heure_debut = $Heure_debut;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->Heure_fin;
    }

    public function setHeureFin(\DateTimeInterface $Heure_fin): self
    {
        $this->Heure_fin = $Heure_fin;

        return $this;
    }

    public function getFin(): ?\DateTimeInterface
    {
        return $this->fin;
    }

    public function setFin(\DateTimeInterface $fin): self
    {
        $this->fin = $fin;

        return $this;
    }

    /**
     * @return Collection|Moniteur[]
     */
    public function getMoniteur(): Collection
    {
        return $this->moniteur;
    }

    public function addMoniteur(Moniteur $moniteur): self
    {
        if (!$this->moniteur->contains($moniteur)) {
            $this->moniteur[] = $moniteur;
            $moniteur->setSeance($this);
        }

        return $this;
    }

    public function removeMoniteur(Moniteur $moniteur): self
    {
        if ($this->moniteur->contains($moniteur)) {
            $this->moniteur->removeElement($moniteur);
            // set the owning side to null (unless already changed)
            if ($moniteur->getSeance() === $this) {
                $moniteur->setSeance(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Moniteur[]
     */
    public function getMoniteurs(): Collection
    {
        return $this->moniteurs;
    }

    /**
     * @return Collection|Moniteur[]
     */
    public function getSeance(): Collection
    {
        return $this->seance;
    }

    public function addSeance(Moniteur $seance): self
    {
        if (!$this->seance->contains($seance)) {
            $this->seance[] = $seance;
            $seance->addSeance($this);
        }

        return $this;
    }

    public function removeSeance(Moniteur $seance): self
    {
        if ($this->seance->contains($seance)) {
            $this->seance->removeElement($seance);
            $seance->removeSeance($this);
        }

        return $this;
    }

    /**
     * @return Collection|Candidat[]
     */
    public function getSeances(): Collection
    {
        return $this->seances;
    }


    public function getTotal(): ?\DateTimeInterface
    {
       return $this->total;
    }

    public function setTotal(\DateTimeInterface $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getNbjc(): ?int
    {
    return $this->Nbjc;
    }

    public function setNbjc(int $Nbjc): self
    {

       $this->Nbjc = mktime($this->getDebut()) - mktime( $this->getFin());

                return $this->Nbjc;

       // $this->Nbjc = $Nbjc;

        //return $this;
    }
}
