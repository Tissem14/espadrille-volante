<?php

namespace App\Entity;

use App\Repository\InfoLogementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InfoLogementRepository::class)]
class InfoLogement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?int $size = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    // Cette fonction me permet de retourner le titre et le prix de l'annonce en string pour me permettre de l'afficher dans le LogementCrudController.php
    public function __toString()
    {
        return $this->title . ' ' . $this->price . '€';
    }

    // Getters : ID
    public function getId(): ?int
    {
        return $this->id;
    }

    // Getters et Setters : TITLE
    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    // Getters et Setters : SIZE
    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    // Getters et Setters : PRIX
    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    // Getters et Setters : TYPE
    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
