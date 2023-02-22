<?php

namespace App\Repository;

use App\Entity\Logement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Logement>
 *
 * @method Logement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Logement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Logement[]    findAll()
 * @method Logement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Logement::class);
    }

    public function save(Logement $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Logement $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //Cette fonction sert à récupérer tous les logements de type mobilehome
    public function mobilehome(): array
    {
        return $this->createQueryBuilder('l')// On récupère la requête de la table logement
            ->innerJoin('l.infoLogement', 'i')// On fait une jointure avec la table infoLogement
            ->andWhere('i.type = :val')// On récupère les logements dont le type est égal à la valeur de la variable val
            ->setParameter('val', 'mobilehome')//On définit la valeur de la variable val en lui donnant la valeur 'mobilehome'
            ->orderBy('l.id', 'ASC')// Tri par ordre croissant
            ->getQuery()// On récupère la requête
            ->getResult();// On récupère le résultat
    }

    //Cette fonction sert à récupérer tous les logements de type caravane
    public function caravane(): array
    {
        return $this->createQueryBuilder('l') // On récupère la requête de la table logement
            ->innerJoin('l.infoLogement', 'i') // On fait une jointure avec la table infoLogement
            ->andWhere('i.type = :val') // On récupère les logements dont le type est égal à la valeur de la variable val
            ->setParameter('val', 'caravane') //On définit la valeur de la variable val en lui donnant la valeur 'caravane'
            ->orderBy('l.id', 'ASC') // Tri par ordre croissant
            ->getQuery() // On récupère la requête
            ->getResult(); // On récupère le résultat
    }

    //Cette fonction sert à récupérer tous les logements de type emplacement
    public function emplacement(): array
    {
        return $this->createQueryBuilder('l') // On récupère la requête de la table logement
            ->innerJoin('l.infoLogement', 'i') // On fait une jointure avec la table infoLogement
            ->andWhere('i.type = :val') // On récupère les logements dont le type est égal à la valeur de la variable val
            ->setParameter('val', 'emplacement') //On définit la valeur de la variable val en lui donnant la valeur 'emplacement'
            ->orderBy('l.id', 'ASC') // Tri par ordre croissant
            ->getQuery() // On récupère la requête
            ->getResult(); // On récupère le résultat
    }

}
