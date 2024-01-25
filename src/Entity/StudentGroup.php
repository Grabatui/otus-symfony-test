<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\StudentGroupRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentGroupRepository::class)]
class StudentGroup
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public int $id;

    /** @var Collection<Student> */
    #[Orm\ManyToMany(targetEntity: Student::class, inversedBy: 'studentGroups')]
    public Collection $students;

    /** @var Collection<LessonRevision> */
    #[Orm\ManyToMany(targetEntity: LessonRevision::class)]
    public Collection $lessonRevisions;
}