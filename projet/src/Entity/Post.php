<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostRepository::class)]
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10000)]
    private ?string $message = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $creat_at = null;

    #[ORM\ManyToOne(inversedBy: 'idpost')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $userid = null;

    #[ORM\ManyToOne(inversedBy: 'idpost')]
    #[ORM\JoinColumn(nullable: false)]
    private ?catégorie $catégorie = null;

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

    public function getCreatAt(): ?\DateTimeImmutable
    {
        return $this->creat_at;
    }

    public function setCreatAt(\DateTimeImmutable $creat_at): static
    {
        $this->creat_at = $creat_at;

        return $this;
    }

    public function getUserid(): ?Users
    {
        return $this->userid;
    }

    public function setUserid(?Users $userid): static
    {
        $this->userid = $userid;

        return $this;
    }

    public function getCatégorie(): ?catégorie
    {
        return $this->catégorie;
    }

    public function setCatégorie(?catégorie $catégorie): static
    {
        $this->catégorie = $catégorie;

        return $this;
    }
}
