<?php
namespace App\Entity;
use App\Application\Sonata\UserBundle\Entity\User as User;
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
use Symfony\Component\Validator\Constraints as Assert;
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
   
   
   
    
    /**
     * @var string
     * @ORM\Column(name="address", type="string",nullable=true)
     */
    private $address;
    /**
     * @var string
     * @ORM\Column(name="city", type="string",nullable=true)
     */
    private $city;
    
    /**
     * @var int
     * @ORM\Column(name="postalcode",nullable=true)
     */
    private $postalcode;

   
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
     * @ORM\Column(type="string", length=8,name="cin")
     * /
     
      */
      /** 
     * @Assert\Length(
     *      min = 8,
     *      max = 8,
   
     * )
     */
     /**
     * @Assert\Regex(
     *     pattern     = "/^[0-9]{8}$/i",
     *    
     * )
     */
    private $cin;

    /**
     * @ORM\OneToOne(targetEntity="App\Application\Sonata\UserBundle\Entity\User", cascade={"persist", "remove"})
     */
     protected $user;
/*
     ** @ORM\Column(type="string", length=255)
     */
   public $firstname;
     /* public function getFirstName(){
          return $this->firstname;
      }
      
      public function setFirstName(string $firstname){
          $this->firstname=$firstname;
      }*/
      /*public function setLastName( $lastname) {
        $this->lastname= $lastname;

        return $this;
    }*/
    /*
     ** @ORM\Column(type="string", length=255)
     */
    /*protected $lastname;
    public function getLastName()
    {
        return $this->lastname;
    }*/

    
   /*
     ** @ORM\Column(type="string", length=255)
     */
    




   

   
   

    
   

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }

  /**
 * @return mixed
 */public function getPostalCode()
{
    return $this->postalcode;
}/**
 * @param mixed $postalcode
 */public function setPostalCode($postalcode): void
{
    $this->postalcode = $postalcode;
}

   /**
    * *@var postalcode
    * @var address
      * @var city
      *@var cin
    */
    public function __construct($address,$city,$postalcode,$cin)
    {

        Parent::__construct();
        $this->user=new User();
        $this->address=$address;
        $this->city=$city;
        $this->postalcode=$postalcode;
        $this->cin=$cin;


        $this->image = new EmbeddedFile();

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

    public function getDateBirth(): ?\DateTimeInterface
    {
        return $this->date_birth;
    }

    public function setDateBirth(?\DateTimeInterface $date_birth): self
    {
        $this->date_birth = $date_birth;

        return $this;
    }

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(string $cin): self
    {
        $this->cin = $cin;

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

    /*public function getFirstName(){
        return $this->getUser()->getFirstName();

    }*/
   public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }


}