<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentaireRepository::class)]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10000)]
    private ?string $message = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $creat_at = null;

    #[ORM\ManyToOne(inversedBy: 'commentaires')]
    #[ORM\JoinColumn(nullable: false)]
    private ?users $userid = null;

    #[ORM\ManyToOne(inversedBy: 'commentaires')]
    #[ORM\JoinColumn(nullable: false)]
    private ?post $postid = null;

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

    public function getUserid(): ?users
    {
        return $this->userid;
    }

    public function setUserid(?users $userid): static
    {
        $this->userid = $userid;

        return $this;
    }

    public function getPostid(): ?post
    {
        return $this->postid;
    }

    public function setPostid(?post $postid): static
    {
        $this->postid = $postid;

        return $this;
    }
}
