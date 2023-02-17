<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $last_name = null;

    #[ORM\Column(length: 255)]
    private ?string $fisrt_name = null;

    #[ORM\Column]
    private ?int $phone = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Logement $logement_id = null;

    #[ORM\Column]
    private ?int $nbr_adulte = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbr_enfant = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_debut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_fin = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLast�Name(): ?string
    {
        return $this->last�_name;
    }

    public function setLast�Name(string $last�_name): self
    {
        $this->last�_name = $last�_name;

        return $this;
    }

    public function getFisrtName(): ?string
    {
        return $this->fisrt_name;
    }

    public function setFisrtName(string $fisrt_name): self
    {
        $this->fisrt_name = $fisrt_name;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getLogementId(): ?Logement
    {
        return $this->logement_id;
    }

    public function setLogementId(?Logement $logement_id): self
    {
        $this->logement_id = $logement_id;

        return $this;
    }

    public function getNbrAdulte(): ?int
    {
        return $this->nbr_adulte;
    }

    public function setNbrAdulte(int $nbr_adulte): self
    {
        $this->nbr_adulte = $nbr_adulte;

        return $this;
    }

    public function getNbrEnfant(): ?int
    {
        return $this->nbr_enfant;
    }

    public function setNbrEnfant(?int $nbr_enfant): self
    {
        $this->nbr_enfant = $nbr_enfant;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }
}
