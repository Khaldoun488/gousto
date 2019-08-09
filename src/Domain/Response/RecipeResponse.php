<?php

namespace App\Domain\Response;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class RecipeResponse
 */
class RecipeResponse
{
    /**
     * @var int
     * @Serializer\Type("int")
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $boxType;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $title;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $slug;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $shortTitle;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $marketingDescription;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $caloriesKcal;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $proteinGrams;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $fatGrams;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $carbGrams;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $bulletPoint1;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $bulletPoint2;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $bulletPoint3;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $recipeDietTypeId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $season;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $base;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $proteinSource;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $preparationTimeMinutes;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $shelfLifeDays;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $equipmentNeeded;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $originCountry;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $recipeCuisine;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $inYourBox;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $goustoReference;

}
