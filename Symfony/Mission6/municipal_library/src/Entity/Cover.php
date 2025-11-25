<?php

namespace App\Entity;

use App\Repository\CoverRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoverRepository::class)]
class Cover
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $file_path = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?book $book = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getFilePath(): ?string
    {
        return $this->file_path;
    }

    public function setFilePath(string $file_path): static
    {
        $this->file_path = $file_path;

        return $this;
    }

    public function getBook(): ?book
    {
        return $this->book;
    }

    public function setBook(?book $book): static
    {
        $this->book = $book;

        return $this;
    }
}
