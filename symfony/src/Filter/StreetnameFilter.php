<?php

namespace App\Filter;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\AbstractContextAwareFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use Doctrine\ORM\QueryBuilder;

final class StreetnameFilter extends AbstractContextAwareFilter
{
    private $supportedFilters = ['city', 'street'];

    protected function filterProperty(
        string $property,
        $value,
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator,
        string $resourceClass,
        string $operationName = null
    ) {
        if (!in_array($property, $this->supportedFilters)) {
            return;
        }

        if ($property == 'city') {
            $queryBuilder
                ->andWhere(sprintf(
                    'o.postal_code_name_finnish LIKE :%s OR o.postal_code_name_swedish LIKE :%s',
                    $property,
                    $property
                ))
                ->setParameter($property, '%' . $value . '%');
        }

        if ($property == 'street') {
            $queryBuilder
                ->andWhere(sprintf(
                    'o.location_name_finnish LIKE :%s OR o.location_name_swedish LIKE :%s',
                    $property,
                    $property
                ))
                ->setParameter($property, '%' . $value . '%');
        }
    }

    // This function is only used to hook in documentation generators (supported by Swagger and Hydra)
    public function getDescription(string $resourceClass): array
    {
        $description = [];

        foreach ($this->supportedFilters as $property) {
            $description["$property"] = [
                'property' => $property,
                'type' => 'string',
                'required' => $property === 'street',
                'swagger' => [
                    'description' => ucfirst($property) . ' name search, searches Finnish and Swedish names',
                    'name' => $property,
                    'type' => 'string',
                ],
            ];
        }

        return $description;
    }
}
