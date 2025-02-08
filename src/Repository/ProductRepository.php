<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Product>
 */
class ProductRepository extends ServiceEntityRepository
{
  public function __construct(ManagerRegistry $registry)
  {
    parent::__construct($registry, Product::class);
  }

  public function transform(Product $product)
  {
    return [
      'id' => (int) $product->getId(),
      'name' => (string) $product->getName(),
      'price' => (float) $product->getPrice(),
    ];
  }

  public function transformAll()
  {
    $products = $this->findAll();
    $productCollection = [];

    foreach ($products as $product) {
      $productCollection[] = $this->transform($product);
    }

    return $productCollection;
  }
}
