<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\StudentGroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
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
    #[ORM\JoinTable(
        name: 'student_student_group',
        joinColumns: [
            new ORM\JoinColumn(name: 'student_group_id', referencedColumnName: 'id'),
        ],
        inverseJoinColumns: [
            new ORM\JoinColumn(name: 'student_id', referencedColumnName: 'id'),
        ]
    )]
    public Collection $students;

    /** @var Collection<LessonRevision> */
    #[Orm\ManyToMany(targetEntity: LessonRevision::class, inversedBy: 'studentGroups')]
    #[ORM\JoinTable(
        name: 'student_group_lesson_revision',
        joinColumns: [
            new ORM\JoinColumn(name: 'student_group_id', referencedColumnName: 'id'),
        ],
        inverseJoinColumns: [
            new ORM\JoinColumn(name: 'lesson_revision_id', referencedColumnName: 'id'),
        ]
    )]
    public Collection $lessonRevisions;

    public function __construct()
    {
        $this->students = new ArrayCollection();
        $this->lessonRevisions = new ArrayCollection();
    }
}