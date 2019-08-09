<?php

namespace App\Domain\Request;

/**
 * Class RecipeUpdateRequest
 */
class RecipeUpdateRequest
{
    public $boxType;

    public $title;

    public $slug;

    public $shortTitle;

    public $marketingDescription;

    public $caloriesKcal;

    public $proteinGrams;

    public $fatGrams;

    public $carbGrams;

    public $bulletPoint1;

    public $bulletPoint2;

    public $bulletPoint3;

    public $recipeDietTypeId;

    public $season;

    public $base;

    public $proteinSource;

    public $preparationTimeMinutes;

    public $shelfLifeDays;

    public $equipmentNeeded;

    public $originCountry;

    public $recipeCuisine;

    public $inYourBox;

    public $goustoReference;

    public $createdAt;

    public $updatedAt;
}
