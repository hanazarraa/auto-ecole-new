<?php
namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\DateTime;
/**
 * @ORM\Entity(repositoryClass="App\Repository\SeanceConduiteRepository")
 */
class SeanceConduite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @ORM\Column(type="date")
     */
    private $date;
  
    
    /**
     * @ORM\Column(type="time")
     */
    protected $debut;
    /**
     * @ORM\Column(type="time")
     */
    private $fin;
    
   
   
    
    /**
     * @ORM\Column(type="time",nullable=true)
     */
    private $total;
   
    /**
     * @ORM\Column(type="string",nullable=true)
     *  
     */
    private $Nbjc;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Candidat", inversedBy="SeanceConduite")
     */
    private $candidat;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Vehicule", inversedBy="SeanceConduite")
     */
    private $vehicule;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Moniteur", inversedBy="SeanceConduite")
     */
    private $moniteur;
    public function __construct()
    {
       // $this->moniteur = new ArrayCollection();
        //$this->moniteurs = new ArrayCollection();
       // $this->seance = new ArrayCollection();
       // $this->seances = new ArrayCollection();
       $this->debut = new \DateTime();
       $this->fin = new \DateTime();

    }
    public function getDebut()
   {
            return $this->debut;
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
  
   
    public function getFin()
    {
        return $this->fin;
    }
    public function setFin(\DateTimeInterface $fin): self
    {
        $this->fin = $fin;
        return $this;
    }

    public function getNbjc()
    {
    return $this->Nbjc;
    }
     /**
    * @ORM\PreUpdate
    * @ORM\PrePersist
    */
    public function setNbjc(string $Nbjc)
    {
       $this->Nbjc = $Nbjc;
                return $this;
       // $this->Nbjc = $Nbjc;
        //return $this;
    }

    public function getCandidat(): ?Candidat
    {
        return $this->candidat;
    }

    public function setCandidat(?Candidat $candidat): self
    {
        $this->candidat = $candidat;

        return $this;
    }
    public function getVehicule(): ?Vehicule
    {
        return $this->vehicule;
    }

    public function setVehicule(?Vehicule $vehicule): self
    {
        $this->vehicule = $vehicule;

        return $this;
    }
    public function getMoniteur(): ?Moniteur
    {
        return $this->moniteur;
    }

    public function setMoniteur(?Moniteur $Moniteur): self
    {
        $this->moniteur = $Moniteur;

        return $this;
    }

 

    //eni chnchouf les vehicule disponibles f seance heki 
    //nekhou heure deb et heure fin 
    //w nchoufou les vehicule l mch mawjoudine f seanceVehicule maa wa9t aka 
    //cad on cherche les candidats qui se netrouve pas dans la table seanceVehicule avec la seance vehicule li tarjaa aa seance conduite dans ce temps la
    // meme fonctionnement pour le moniteur
    //et on fait aad a seance conduite 

}