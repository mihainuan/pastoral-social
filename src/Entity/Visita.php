<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VisitaRepository")
 */
class Visita
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Descricao;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DataVisita;

    /**
     * @ORM\ManyToOne(targetEntity="Familia", inversedBy="visita")
     */
    private $familia;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imagem;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescricao(): ?string
    {
        return $this->Descricao;
    }

    public function setDescricao(?string $Descricao): self
    {
        $this->Descricao = $Descricao;

        return $this;
    }

    public function getDataVisita(): ?\DateTimeInterface
    {
        return $this->DataVisita;
    }

    public function setDataVisita(?\DateTimeInterface $DataVisita): self
    {
        $this->DataVisita = $DataVisita;

        return $this;
    }

//    //FK
//    public function getFamilia(): ?Familia
//    {
//        return $this->familia;
//    }
//
//    public function setFamilia(?Familia $familia): self
//    {
//        $this->familia = $familia;
//
//        return $this;
//    }

    public function getImagem(): ?string
    {
        return $this->imagem;
    }

    public function setImagem(?string $imagem): self
    {
        $this->imagem = $imagem;

        return $this;
    }

    public function getFamilia(): ?Familia
    {
        return $this->familia;
    }

    public function setFamilia(?Familia $familia): self
    {
        $this->familia = $familia;

        return $this;
    }
}
