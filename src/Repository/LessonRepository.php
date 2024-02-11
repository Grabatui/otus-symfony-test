<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Lesson;
use App\Entity\StudentGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class LessonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lesson::class);
    }

    public function findLessonsByStudentGroup(StudentGroup $studentGroup): array
    {
        $queryBuilder = $this->createQueryBuilder('l')
            ->leftJoin('l.lessonRevisions', 'lr')
            ->leftJoin('lr.studentGroups', 'sg')

            ->where('sg = :studentGroup')

            ->setParameter('studentGroup', $studentGroup)

            ->orderBy('lr.revisionOrder');

        return $queryBuilder->getQuery()->execute();
    }
}
