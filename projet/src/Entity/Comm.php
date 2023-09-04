<?php

namespace App\Entity;

use App\Repository\CommRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommRepository::class)]
class Comm
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10000)]
    private ?string $message = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $creat_att = null;

    #[ORM\ManyToOne(inversedBy: 'comms')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateurs $userid = null;

    #[ORM\ManyToOne(inversedBy: 'comms')]
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

    public function getCreatAtt(): ?\DateTimeImmutable
    {
        return $this->creat_att;
    }

    public function setCreatAtt(\DateTimeImmutable $creat_att): static
    {
        $this->creat_att = $creat_att;

        return $this;
    }

    public function getUserid(): ?Utilisateurs
    {
        return $this->userid;
    }

    public function setUserid(?Utilisateurs $userid): static
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
