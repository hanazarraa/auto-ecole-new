<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParametresRepository")
 */
class Parametres
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombre_pcs;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombrePcs(): ?int
    {
        return $this->nombre_pcs;
    }

    public function setNombrePcs(int $nombre_pcs): self
    {
        $this->nombre_pcs = $nombre_pcs;

        return $this;
    }
}
