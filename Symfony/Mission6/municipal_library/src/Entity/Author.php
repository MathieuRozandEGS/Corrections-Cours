<?php

namespace App\Entity;

use App\Repository\AuthorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuthorRepository::class)]
class Author
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $last_name = null;

    #[ORM\Column(length: 50)]
    private ?string $first_name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $birth_date = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    /**
     * @var Collection<int, country>
     */
    #[ORM\OneToMany(targetEntity: country::class, mappedBy: 'author')]
    private Collection $country;

    public function __construct()
    {
        $this->country = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): static
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): static
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getBirthDate(): ?\DateTime
    {
        return $this->birth_date;
    }

    public function setBirthDate(\DateTime $birth_date): static
    {
        $this->birth_date = $birth_date;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return Collection<int, country>
     */
    public function getCountry(): Collection
    {
        return $this->country;
    }

    public function addCountry(country $country): static
    {
        if (!$this->country->contains($country)) {
            $this->country->add($country);
            $country->setAuthor($this);
        }

        return $this;
    }

    public function removeCountry(country $country): static
    {
        if ($this->country->removeElement($country)) {
            // set the owning side to null (unless already changed)
            if ($country->getAuthor() === $this) {
                $country->setAuthor(null);
            }
        }

        return $this;
    }
}
