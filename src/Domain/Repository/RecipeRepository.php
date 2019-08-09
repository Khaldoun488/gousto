<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Recipe;

/**
 * Interface RecipeRepository
 */
interface RecipeRepository
{
    /**
     * @param $cuisine
     *
     * @param $limit
     * @param $offset
     *
     * @return Recipe[]
     */
    public function findByCuisine($cuisine, $limit, $offset);

    /**
     * @param $id
     *
     * @return Recipe
     */
    public function findById($id);
}
