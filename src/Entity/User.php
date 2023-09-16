<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class), UniqueEntity(fields: ['username'], message: "Ce nom d'utilisateur est déjà utilisé")]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255), Assert\Length(min: 3, max: 15, minMessage: "Le nom d'utilisateur doit contenir au moins 5 caractères", maxMessage: "Le nom d'utilisateur doit contenir au maximum 10 caractères")]
    private ?string $username = null;

    #[ORM\Column(length: 255)] 
    private ?string $password = null;

    #[Assert\EqualTo(propertyPath: "password", message: "Les mots de passe ne sont pas identiques")] 
    private ?string $verifyPassword = null;

    #[ORM\Column(length: 255)]
    private ?string $roles = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getVerifyPassword(): ?string
    {
        return $this->verifyPassword;
    }

    public function setVerifyPassword(string $verifyPassword): static
    {
        $this->verifyPassword = $verifyPassword;

        return $this;
    }

    public function getRoles(): array
    {
        return [$this->roles];
    }

    public function eraseCredentials(): void
    {
    }

    public function getUserIdentifier(): string
    {
        return $this->username;
    }

    public function setRoles(?string $roles): static
    {
        if($roles === null) {
            $this->roles = "ROLE_USER";
        }else {
            $this->roles = $roles;
        }
        
        return $this;
    }
}
