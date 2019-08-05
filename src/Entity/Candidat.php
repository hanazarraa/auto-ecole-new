<?php
namespace App\Entity;
use App\Application\Sonata\UserBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Entity\File as EmbeddedFile;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Sonata\AdminBundle\Util\ObjectAclManipulatorInterface;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Exception\ModelManagerException;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Security\Acl\Domain\UserSecurityIdentity;
use Sonata\UserBundle\Model\UserInterface;

/**
 * @ORM\Entity
 * @Vich\Uploadable
 */

class Candidat
{

// ...
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
   
   
   
    private $cin;
    /**
     * @var string
     * @ORM\Column(name="adresse", type="string",nullable=true)
     */
    private $adresse;
    /**
     * @var string
     * @ORM\Column(name="ville", type="string",nullable=true)
     */
    private $ville;
    /**
     * @var int
     * @ORM\Column(name="telephone",nullable=true,length=8)
     */
    private $telephone;
    /**
     * @var int
     * @ORM\Column(name="codePostal",nullable=true)
     */
    private $codePostal;

   
    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="imageName", size="imageSize")
     *
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     *
     * @var string
     */
    private $imageName;

    /**
     * @ORM\Column(type="integer",nullable=true)
     *
     * @var integer
     */
    private $imageSize;

    
    /**
     * @ORM\Column(type="integer",nullable=true)
     */
    private $typePermit;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="candidats")
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity="App\Application\Sonata\UserBundle\Entity\User", inversedBy="candidats")
     */
    private $User;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Seance", inversedBy="seances")
     */
    private $seance;
      
      
      
    

   




   

   
   

    
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * @param mixed $cin
     */
    public function setCin($cin): void
    {
        $this->cin = $cin;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville): void
    {
        $this->ville = $ville;
    }

  /**
 * @return mixed
 */public function getCodePostal()
{
    return $this->codePostal;
}/**
 * @param mixed $codePostal
 */public function setCodePostal($codePostal): void
{
    $this->codePostal = $codePostal;
}

   
    public function __construct()
    {
        $this->image = new EmbeddedFile();
        $this->User = new ArrayCollection();
        $this->seance = new ArrayCollection();
    }

    /**
     * @param File|UploadedFile $imageFile
     * @throws \Exception
     */
    public function setImageFile(?File $imageFile ): void
    {
        

        if (null !== $imageFile) {
            $this->imageFile = $imageFile;
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    /**
     * @param int|null $imageSize
     */
    public function setImageSize(?int $imageSize): void
    {
        $this->imageSize = $imageSize;
    }

    public function getImageSize(): ?int
    {
        return $this->imageSize;
    }

    public function getTypePermit(): ?int
    {
        return $this->typePermit;
    }

    public function setTypePermit(int $typePermit): self
    {
        $this->typePermit = $typePermit;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser(): Collection
    {
        return $this->User;
    }

    public function addUser(User $user): self
    {
        if (!$this->User->contains($user)) {
            $this->User[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->User->contains($user)) {
            $this->User->removeElement($user);
        }

        return $this;
    }

    /**
     * @return Collection|Seance[]
     */
    public function getSeance(): Collection
    {
        return $this->seance;
    }

    public function addSeance(Seance $seance): self
    {
        if (!$this->seance->contains($seance)) {
            $this->seance[] = $seance;
        }

        return $this;
    }

    public function removeSeance(Seance $seance): self
    {
        if ($this->seance->contains($seance)) {
            $this->seance->removeElement($seance);
        }

        return $this;
    }

   /* public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }*/




}