<?php

namespace App\Repository;

use App\Entity\Cidadao;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cidadao>
 *
 * @method Cidadao|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cidadao|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cidadao[]    findAll()
 * @method Cidadao[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CidadaoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cidadao::class);
    }

    /**
     * @return Cidadao|null Retorna o objeto Cidadão ou nulo de acordo com a busca pelo NIS
     */
    public function buscarCidadaoPorNis(string $nis) : ?Cidadao
    {
        return $this->findOneBy(['nis' => $nis]);
    }
}