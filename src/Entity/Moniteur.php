<?php

namespace App\Entity;
use App\Application\Sonata\UserBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 **/
class Moniteur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */

    private $id;

   

   
    /**
     * @ORM\Column(type="string",length=8)
     * 
     */
    private $cin;
   

   


    /**
     * @ORM\Column(type="string", length=255,name="city")
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255,name="address")
     */
    private $address;

    /**
     * @ORM\Column(type="string",name="postalcode")

     */
    private $postalcode;

   

   



    /**
     * @ORM\Column(type="date",name="recruitmentDate")
     */
    private $recruitmentDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true,name="passport")
     */
    private $passport;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="moniteur", cascade={"persist", "remove"})
     */
    private $category;

    /**
     * @ORM\OneToOne(targetEntity="App\Application\Sonata\UserBundle\Entity\User", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SeanceConduite", mappedBy="Moniteur", cascade={"persist", "remove"})
     */
    private $seancesconduite;

  

    public function __construct()
    {
        $this->seancesconduite = new ArrayCollection();
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
            $seancesconduite->setMoniteur($this);
        }

        return $this;
    }

    public function removeSeancesConduite(SeancesConduite $seancesconduite): self
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




    public function getId(): ?int
    {
        return $this->id;
    }

   



 

    public function getCin(): ?int
    {
        return $this->cin;
    }

    public function setCin(int $cin): self
    {
        $this->cin = $cin;

        return $this;
    }
    /**
     * @return mixed
     */
  
   
   

   
    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalcode;
    }

    public function setPostalCode(string $postalcode): self
    {
        $this->postalcode = $postalcode;

        return $this;
    }

  

  

   

   



    public function getRecruitmentDate(): ?\DateTimeInterface
    {
        return $this->recruitmentDate;
    }

    public function setRecruitmentDate(\DateTimeInterface $recruitmentDate): self
    {
        $this->recruitmentDate = $recruitmentDate;

        return $this;
    }

    public function getPassport(): ?string
    {
        return $this->passport;
    }

    public function setPassport(?string $passport): self
    {
        $this->passport = $passport;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    
    

   

   


}


