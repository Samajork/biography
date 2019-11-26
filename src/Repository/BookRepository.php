<?php

namespace App\Repository;

use App\Entity\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Book|null find($id, $lockMode = null, $lockVersion = null)
 * @method Book|null findOneBy(array $criteria, array $orderBy = null)
 * @method Book[]    findAll()
 * @method Book[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }


     /**
     // * @return Book[] Returns an array of Book objects
     // */

    public function GetByGenre()
    {

     //  récuperer le query builder( pour faire les requetes sql)
        $queryBuilder = $this->createQueryBuilder('b');
        // construire les requetes sql, mais en php
        $query = $queryBuilder->select('b')
            // traduire la requête en veritable requête SQL
            ->where('b.style= :style')
            // Exécuter la requete sql en base de donnée pour récuperer les bons livres classé par genre
            ->setParameter('style', 'FICTION')
            ->getQuery();

        $books = $query->getArrayResult();

        return $books;
    }
    /**
    // * @return Book[] Returns an array of Book objects
    // */

    public function GetByWords()
    {
        $word='il';

        $queryBuilder = $this->createQueryBuilder('book');
        $query = $queryBuilder->select('book')
        ->where('book.biography= :word')
        ->setParameter('word','%'.$word.'%')
        ->getQuery();

        $books=$query->getArrayResult();

        return $books;

    }

        /*
        return $this->createQueryBuilder('book')
           ->andWhere('books-list.auteur = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
           ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;/*
    }


    /*
    public function findOneBySomeField($value): ?Book
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
