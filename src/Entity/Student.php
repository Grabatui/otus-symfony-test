<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public int $id;

    /** @var Collection<StudentGroup> */
    #[Orm\ManyToMany(targetEntity: StudentGroup::class, mappedBy: 'students', fetch: 'EAGER')]
    public Collection $studentGroups;

    public function __construct()
    {
        $this->studentGroups = new ArrayCollection();
    }
}