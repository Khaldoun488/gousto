<?php

namespace App\Infrastructure;

use App\Domain\Entity\Recipe;
use App\Domain\Repository\RecipeRepository as RecipeRepositoryInterface;

/**
 * Class RecipeRepository
 */
class RecipeRepository implements RecipeRepositoryInterface
{
    private $csv;

    /**
     * RecipeRepository constructor.
     */
    public function __construct()
    {
        $this->csv = [];
        $file = fopen(__DIR__.'/../../recipe-data.csv', 'r+');
        $header = fgetcsv($file);
        while ($row = fgetcsv($file)) {
            $this->csv[] = array_combine($header, $row);
        }
    }

    /**
     * @param     $cuisine
     * @param     $limit
     * @param int $offset
     *
     * @return Recipe[]
     */
    public function findByCuisine($cuisine, $limit, $offset = 0)
    {
        $recipes = [];
        $i = 0;
        foreach ($this->csv as $record) {
            if ($record['recipe_cuisine'] === $cuisine) {
                if ($i++ < $offset) continue;
                if ($i > $offset + $limit) break;
                $recipes[] = $this->hydrateRecipeEntity($record);
            }
        }

        return $recipes;
    }

    /**
     * @param $id
     *
     * @return Recipe
     */
    public function findById($id)
    {
        foreach ($this->csv as $record) {
            if ($record['id'] === $id) {
                return $this->hydrateRecipeEntity($record);
            }
        }

        return null;
    }

    /**
     * @param $record
     *
     * @return Recipe
     */
    private function hydrateRecipeEntity($record)
    {
        $recipe = new Recipe();
        $recipe->setId($record['id'])
            ->setRecipeCuisine($record['recipe_cuisine'])
            ->setGoustoReference($record['gousto_reference'])
            ->setMarketingDescription($record['marketing_description'])
            ->setTitle($record['title'])
            ->setBase($record['base'])
            ->setBoxType($record['box_type'])
            ->setBulletPoint1($record['bulletpoint1'])
            ->setBulletPoint2($record['bulletpoint2'])
            ->setBulletPoint3($record['bulletpoint3'])
            ->setCaloriesKcal($record['calories_kcal'])
            ->setCarbGrams($record['carbs_grams'])
            ->setEquipmentNeeded($record['equipment_needed'])
            ->setFatGrams($record['fat_grams'])
            ->setInYourBox($record['in_your_box'])
            ->setOriginCountry($record['origin_country'])
            ->setPreparationTimeMinutes($record['preparation_time_minutes'])
            ->setProteinGrams($record['protein_grams'])
            ->setProteinSource($record['protein_source'])
            ->setRecipeDietTypeId($record['recipe_diet_type_id'])
            ->setSeason($record['season'])
            ->setShelfLifeDays($record['shelf_life_days'])
            ->setShortTitle($record['short_title'])
            ->setSlug($record['slug']);

        return $recipe;
    }
}
