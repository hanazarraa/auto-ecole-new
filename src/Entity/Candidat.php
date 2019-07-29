<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Entity\File as EmbeddedFile;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @ORM\Entity
 * @Vich\Uploadable
 */

class Candidat
{
    const TYPEPERMIT = [
        1 => 'A1',
        2 => 'A',
        3 => 'B',
        4 => 'B+E',
        5 => 'C',
        6 => 'C+E',
        7 => 'D',
        8 => 'D1',
        9 => 'D+E',
        10 =>'H'

    ];
// ...
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()SSS
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
     * @ORM\Column(name="nom", type="string",nullable=true)
     */
    private $nom;
    /**
     * @var string
     * @ORM\Column(name="prenom", type="string",nullable=true)
     */
    private $prenom;
    /**
     * @var int
     * @ORM\Column(name="cin",nullable=true)
     */
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
     * @ORM\Column(name="telephone",nullable=true)
     */
    private $telephone;
    /**
     * @var int
     * @ORM\Column(name="codePostal",nullable=true)
     */
    private $codePostal;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateNaissance;
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
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="integer",nullable=true)
     */
    private $typePermit;
    private $category;

    /**
     * @return string
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return string
     */
    public function setNom(string $nom): string
    {
        $this->nom = $nom;
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
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
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone): void
    {
        $this->telephone = $telephone;
    }/**
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

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }
    public function __construct()
    {
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

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }
}