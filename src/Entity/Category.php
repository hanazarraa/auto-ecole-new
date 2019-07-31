<?php
namespace App\Entity;
use Sonata\AdminBundle\Admin\AdminInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Security\Acl\Domain\UserSecurityIdentity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


use Sonata\AdminBundle\Util\ObjectAclManipulatorInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category 

{
// ...
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Moniteur", mappedBy="category")
     */
    private $moniteurs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Candidat", mappedBy="Category")
     */
    private $candidats;

    

    public function __construct()
    {
        $this->moniteurs = new ArrayCollection();
        $this->candidats = new ArrayCollection();
    }


    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }








   


    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return Collection|Moniteurs[]
     */
   /* public function getMoniteur(): Collection
    {
        return $this->moniteur;
    }

    public function addMoniteur(Moniteurs $moniteur): self
    {
        if (!$this->moniteur->contains($moniteur)) {
            $this->moniteur[] = $moniteur;
            $moniteur->setCategory($this);
        }

        return $this;
    }

    public function removeMoniteur(Moniteurs $moniteur): self
    {
        if ($this->moniteur->contains($moniteur)) {
            $this->moniteur->removeElement($moniteur);
            // set the owning side to null (unless already changed)
            if ($moniteur->getCategory() === $this) {
                $moniteur->setCategory(null);
            }
        }

        return $this;
    }*/

    /**
     * @return Collection|Candidat[]
     */
   /* public function getCandidat(): Collection
    {
        return $this->candidat;
    }
*/
   /* public function addCandidat(Candidat $candidat): self
    {
        if (!$this->candidat->contains($candidat)) {
            $this->candidat[] = $candidat;
            $candidat->setCategory($this);
        }

        return $this;
    }*/

   /* public function removeCandidat(Candidat $candidat): self
    {
        if ($this->candidat->contains($candidat)) {
            $this->candidat->removeElement($candidat);
            // set the owning side to null (unless already changed)
            if ($candidat->getCategory() === $this) {
                $candidat->setCategory(null);
            }
        }

        return $this;
    }*/

    /**
     * @return Collection|Candidat[]
     */
 /*   public function getCandidats(): Collection
    {
        return $this->candidats;
    }*/
}

