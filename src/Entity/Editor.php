<?php

namespace App\Entity;

use App\Repository\EditorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EditorRepository::class)]
class Editor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'editor', targetEntity: Book::class, orphanRemoval: false)]
    private Collection $editor;

    public function __construct()
    {
        $this->editor = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Book>
     */
    public function getEditor(): Collection
    {
        return $this->editor;
    }

    public function addEditor(Book $editor): static
    {
        if (!$this->editor->contains($editor)) {
            $this->editor->add($editor);
            $editor->setEditor($this);
        }

        return $this;
    }

    public function removeEditor(Book $editor): static
    {
        if ($this->editor->removeElement($editor)) {
            // set the owning side to null (unless already changed)
            if ($editor->getEditor() === $this) {
                $editor->setEditor(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
