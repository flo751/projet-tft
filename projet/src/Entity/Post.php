<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostRepository::class)]
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 10000)]
    private ?string $message = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $creat_at = null;

    #[ORM\ManyToOne(inversedBy: 'posts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?users $userid = null;

    #[ORM\ManyToOne(inversedBy: 'posts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?catégorie $catégorie = null;

    #[ORM\OneToMany(mappedBy: 'postid', targetEntity: Commentaire::class)]
    private Collection $commentaires;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
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

    public function getCatégorie(): ?catégorie
    {
        return $this->catégorie;
    }

    public function setCatégorie(?catégorie $catégorie): static
    {
        $this->catégorie = $catégorie;

        return $this;
    }

    /**
     * @return Collection<int, Commentaire>
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): static
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires->add($commentaire);
            $commentaire->setPostid($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): static
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getPostid() === $this) {
                $commentaire->setPostid(null);
            }
        }

        return $this;
    }
}
