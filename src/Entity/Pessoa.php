<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PessoaRepository")
 */
class Pessoa
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $NomePessoa;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DataNascimento;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DataCadastro;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $Telefone;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $Celular;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $Email;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Familia", inversedBy="pessoas")
     */
    private $familia;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="pessoas")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imagem;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomePessoa(): ?string
    {
        return $this->NomePessoa;
    }

    public function setNomePessoa(?string $NomePessoa): self
    {
        $this->NomePessoa = $NomePessoa;

        return $this;
    }

    public function getDataNascimento(): ?DateTimeInterface
    {
        return $this->DataNascimento;
    }

    public function setDataNascimento(?DateTimeInterface $DataNascimento): self
    {
        $this->DataNascimento = $DataNascimento;

        return $this;
    }

    public function getDataCadastro(): ?DateTimeInterface
    {
        return $this->DataCadastro;
    }

    public function setDataCadastro(?DateTimeInterface $DataCadastro): self
    {
        $this->DataCadastro = $DataCadastro;

        return $this;
    }

    public function getTelefone(): ?string
    {
        return $this->Telefone;
    }

    public function setTelefone(?string $Telefone): self
    {
        $this->Telefone = $Telefone;

        return $this;
    }

    public function getCelular(): ?string
    {
        return $this->Celular;
    }

    public function setCelular(?string $Celular): self
    {
        $this->Celular = $Celular;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): self
    {
        $this->Email = $Email;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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
