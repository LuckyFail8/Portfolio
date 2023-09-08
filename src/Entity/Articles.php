<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticlesRepository::class)]
class Articles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $content = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $publication_date = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $update_at = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $author = null;

    #[ORM\ManyToMany(targetEntity: Images::class, inversedBy: 'articles')]
    private Collection $image;

    #[ORM\ManyToMany(targetEntity: Projects::class, inversedBy: 'articles')]
    private Collection $project;

    #[ORM\ManyToMany(targetEntity: Technologies::class, inversedBy: 'articles')]
    private Collection $technology;

    public function __construct()
    {
        $this->image = new ArrayCollection();
        $this->project = new ArrayCollection();
        $this->technology = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getPublicationDate(): ?\DateTimeInterface
    {
        return $this->publication_date;
    }

    public function setPublicationDate(\DateTimeInterface $publication_date): static
    {
        $this->publication_date = $publication_date;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeImmutable
    {
        return $this->update_at;
    }

    public function setUpdateAt(?\DateTimeImmutable $update_at): static
    {
        $this->update_at = $update_at;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): static
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return Collection<int, Images>
     */
    public function getImage(): Collection
    {
        return $this->image;
    }

    public function addImage(Images $image): static
    {
        if (!$this->image->contains($image)) {
            $this->image->add($image);
        }

        return $this;
    }

    public function removeImage(Images $image): static
    {
        $this->image->removeElement($image);

        return $this;
    }

    /**
     * @return Collection<int, Projects>
     */
    public function getProject(): Collection
    {
        return $this->project;
    }

    public function addProject(Projects $project): static
    {
        if (!$this->project->contains($project)) {
            $this->project->add($project);
        }

        return $this;
    }

    public function removeProject(Projects $project): static
    {
        $this->project->removeElement($project);

        return $this;
    }

    /**
     * @return Collection<int, Technologies>
     */
    public function getTechnology(): Collection
    {
        return $this->technology;
    }

    public function addTechnology(Technologies $technology): static
    {
        if (!$this->technology->contains($technology)) {
            $this->technology->add($technology);
        }

        return $this;
    }

    public function removeTechnology(Technologies $technology): static
    {
        $this->technology->removeElement($technology);

        return $this;
    }
}
