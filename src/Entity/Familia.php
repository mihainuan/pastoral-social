<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FamiliaRepository")
 */
class Familia
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomeFamilia;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Endereco;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $Bairro;

    /**
     * @ORM\Column(type="date")
     */
    private $DataCadastro;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Biografia;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $Telefone;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $AssistenciaSocial;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $SituacaoEspecial;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $CadastroUnico;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $BeneficioGoverno;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $RendaFamiliar;

    /**
     * @ORM\OneToMany(targetEntity="Visita", mappedBy="familia")
     */
    private $visita;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Cesta", mappedBy="familia")
     */
    private $cestas;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Pessoa", mappedBy="familia")
     */
    private $pessoas;

    public function __construct()
    {
        $this->visita = new ArrayCollection();
        $this->cestas = new ArrayCollection();
        $this->pessoas = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->NomeFamilia;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomeFamilia(): ?string
    {
        return $this->NomeFamilia;
    }

    public function setNomeFamilia(string $NomeFamilia): self
    {
        $this->NomeFamilia = $NomeFamilia;

        return $this;
    }

    public function getEndereco(): ?string
    {
        return $this->Endereco;
    }

    public function setEndereco(?string $Endereco): self
    {
        $this->Endereco = $Endereco;

        return $this;
    }

    public function getBairro(): ?string
    {
        return $this->Bairro;
    }

    public function setBairro(?string $Bairro): self
    {
        $this->Bairro = $Bairro;

        return $this;
    }

    public function getDataCadastro(): ?DateTimeInterface
    {
        return $this->DataCadastro;
    }

    public function setDataCadastro(DateTimeInterface $DataCadastro): self
    {
        $this->DataCadastro = $DataCadastro;

        return $this;
    }

    public function getBiografia(): ?string
    {
        return $this->Biografia;
    }

    public function setBiografia(?string $Biografia): self
    {
        $this->Biografia = $Biografia;

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

    public function getAssistenciaSocial(): ?bool
    {
        return $this->AssistenciaSocial;
    }

    public function setAssistenciaSocial(?bool $AssistenciaSocial): self
    {
        $this->AssistenciaSocial = $AssistenciaSocial;

        return $this;
    }

    public function getSituacaoEspecial(): ?bool
    {
        return $this->SituacaoEspecial;
    }

    public function setSituacaoEspecial(?bool $SituacaoEspecial): self
    {
        $this->SituacaoEspecial = $SituacaoEspecial;

        return $this;
    }

    public function getCadastroUnico(): ?bool
    {
        return $this->CadastroUnico;
    }

    public function setCadastroUnico(?bool $CadastroUnico): self
    {
        $this->CadastroUnico = $CadastroUnico;

        return $this;
    }

    public function getBeneficioGoverno(): ?bool
    {
        return $this->BeneficioGoverno;
    }

    public function setBeneficioGoverno(?bool $BeneficioGoverno): self
    {
        $this->BeneficioGoverno = $BeneficioGoverno;

        return $this;
    }

    public function getRendaFamiliar(): ?string
    {
        return $this->RendaFamiliar;
    }

    public function setRendaFamiliar(?string $RendaFamiliar): self
    {
        $this->RendaFamiliar = $RendaFamiliar;

        return $this;
    }

    public function addVisitum(Visita $visitum): self
    {
        if (!$this->visita->contains($visitum)) {
            $this->visita[] = $visitum;
            $visitum->setFamilia($this);
        }

        return $this;
    }

    public function removeVisitum(Visita $visitum): self
    {
        if ($this->visita->contains($visitum)) {
            $this->visita->removeElement($visitum);
            // set the owning side to null (unless already changed)
            if ($visitum->getFamilia() === $this) {
                $visitum->setFamilia(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Visita[]
     */
    public function getVisita(): Collection
    {
        return $this->visita;
    }

    /**
     * @return Collection|Cesta[]
     */
    public function getCestas(): Collection
    {
        return $this->cestas;
    }

    public function addCesta(Cesta $cesta): self
    {
        if (!$this->cestas->contains($cesta)) {
            $this->cestas[] = $cesta;
            $cesta->setFamilia($this);
        }

        return $this;
    }

    public function removeCesta(Cesta $cesta): self
    {
        if ($this->cestas->contains($cesta)) {
            $this->cestas->removeElement($cesta);
            // set the owning side to null (unless already changed)
            if ($cesta->getFamilia() === $this) {
                $cesta->setFamilia(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Pessoa[]
     */
    public function getPessoas(): Collection
    {
        return $this->pessoas;
    }

    public function addPessoa(Pessoa $pessoa): self
    {
        if (!$this->pessoas->contains($pessoa)) {
            $this->pessoas[] = $pessoa;
            $pessoa->setFamilia($this);
        }

        return $this;
    }

    public function removePessoa(Pessoa $pessoa): self
    {
        if ($this->pessoas->contains($pessoa)) {
            $this->pessoas->removeElement($pessoa);
            // set the owning side to null (unless already changed)
            if ($pessoa->getFamilia() === $this) {
                $pessoa->setFamilia(null);
            }
        }

        return $this;
    }
}
