<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CestaRepository")
 */
class Cesta
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
    private $DescricaoCesta;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DataCesta;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Familia", inversedBy="cestas")
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

    public function getDescricaoCesta(): ?string
    {
        return $this->DescricaoCesta;
    }

    public function setDescricaoCesta(?string $DescricaoCesta): self
    {
        $this->DescricaoCesta = $DescricaoCesta;

        return $this;
    }

    public function getDataCesta(): ?DateTimeInterface
    {
        return $this->DataCesta;
    }

    public function setDataCesta(?DateTimeInterface $DataCesta): self
    {
        $this->DataCesta = $DataCesta;

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

    public function getImagem(): ?string
    {
        return $this->imagem;
    }

    public function setImagem(?string $imagem): self
    {
        $this->imagem = $imagem;

        return $this;
    }
}
