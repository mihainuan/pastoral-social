<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use mysql_xdevapi\Collection;

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

    public function __construct()
    {
        $this->visita = new ArrayCollection();
    }

//    public function __construct()
//    {
//        $this->visita = new ArrayCollection();
//    }


//    /**
//     *@return Collection|Visita[]
//     */
//    public function getVisita(): Collection
//    {
//        return $this->visita;
//    }
//
//    public function addVisita(Visita $visita): self
//    {
//        if(!$this->visita->contains($visita)){
//            $this->visita[] = $visita;
//            $visita->setFamilia($this);
//        }
//        return $this;
//    }
//
//    public function removeVisita(Visita $visita): self
//    {
//        if($this->visita->contains($visita)){
//            $this->visita->removeElement($visita);
//
//            //Set the owning side to null (unless already changed)
//            if($visita->getFamilia() === $this){
//                $visita->setFamilia(null);
//            }
//        }
//        return $this;
//    }

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

    public function getDataCadastro(): ?\DateTimeInterface
    {
        return $this->DataCadastro;
    }

    public function setDataCadastro(\DateTimeInterface $DataCadastro): self
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
     * @return \Doctrine\Common\Collections\Collection|Visita[]
     */
    public function getVisita(): \Doctrine\Common\Collections\Collection
    {
        return $this->visita;
    }
}
