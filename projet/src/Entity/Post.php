<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostRepository::class)]
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 2500)]
    private ?string $message = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, options:['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?int $userid = null;

    #[ORM\Column]
    private ?int $catégorie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getUserid(): ?int
    {
        return $this->userid;
    }

    public function setUserid(int $userid): static
    {
        $this->userid = $userid;

        return $this;
    }

    public function getCatégorie(): ?int
    {
        return $this->catégorie;
    }

    public function setCatégorie(int $catégorie): static
    {
        $this->catégorie = $catégorie;

        return $this;
    }
}
