<?php
namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\DateTime;
use App\Application\Sonata\UserBundle\Validator\Constraints as CustomAssert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SeanceCodeRepository")
 */

class SeanceCode
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
     * @ORM\Column(type="time",nullable=true)
     */
   
    
   
    protected $debut;
    /**
     * @ORM\Column(type="time",nullable=true)
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
     * @ORM\OneToMany(targetEntity="App\Entity\Candidat", mappedBy="seancecode")
     */
 
 
    private $candidats;
   
    
   

 

   
    public function __construct()
    {
       // $this->moniteur = new ArrayCollection();
        //$this->moniteurs = new ArrayCollection();
       // $this->seance = new ArrayCollection();
       // $this->seances = new ArrayCollection();
       $this->debut = new \DateTime();
       $this->fin = new \DateTime();
       $this->candidats = new ArrayCollection();
      

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
    public function getTotal(): ?\DateTimeInterface
    {
       return $this->total;
    }
    public function setTotal(\DateTimeInterface $total): self
    {
        $this->total = $total;
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

    /**
     * @return Collection|Candidat[]
     */
    public function getCandidats()
    {
        return $this->candidats;
    }
    

    public function addCandidat(Candidat $candidat): self
    {
        if ($this->getCandidats()==null || !$this->candidats->contains($candidat)) {
            $this->candidats[] = $candidat;
            $candidat->setSeancecode($this);
        }

        return $this;
    }
    

    public function removeCandidat(Candidat $candidat): self
    {
        if ($this->candidats->contains($candidat)) {
            $this->candidats->removeElement($candidat);
            // set the owning side to null (unless already changed)
            if ($candidat->getSeancecode() === $this) {
                $candidat->setSeancecode(null);
            }
        }

        return $this;
    }

   
  

   
        

      
   

  
    

}