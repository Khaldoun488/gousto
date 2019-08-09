<?php

namespace App\Domain\Entity;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Recipe
 */
class Recipe
{
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\Groups({"recipe_list", "recipe_item"})
     */
    private $id;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"recipe_item"})
     */
    private $boxType;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"recipe_list", "recipe_item"})
     */
    private $title;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"recipe_item"})
     */
    private $slug;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"recipe_item"})
     */
    private $shortTitle;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"recipe_list", "recipe_item"})
     */
    private $marketingDescription;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"recipe_item"})
     */
    private $caloriesKcal;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"recipe_item"})
     */
    private $proteinGrams;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"recipe_item"})
     */
    private $fatGrams;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"recipe_item"})
     */
    private $carbGrams;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"recipe_item"})
     */
    private $bulletPoint1;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"recipe_item"})
     */
    private $bulletPoint2;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"recipe_item"})
     */
    private $bulletPoint3;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"recipe_item"})
     */
    private $recipeDietTypeId;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"recipe_item"})
     */
    private $season;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"recipe_item"})
     */
    private $base;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"recipe_item"})
     */
    private $proteinSource;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"recipe_item"})
     */
    private $preparationTimeMinutes;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"recipe_item"})
     */
    private $shelfLifeDays;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"recipe_item"})
     */
    private $equipmentNeeded;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"recipe_item"})
     */
    private $originCountry;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"recipe_item"})
     */
    private $recipeCuisine;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"recipe_item"})
     */
    private $inYourBox;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"recipe_item"})
     */
    private $goustoReference;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return Recipe
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBoxType()
    {
        return $this->boxType;
    }

    /**
     * @param mixed $boxType
     *
     * @return Recipe
     */
    public function setBoxType($boxType)
    {
        $this->boxType = $boxType;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     *
     * @return Recipe
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     *
     * @return Recipe
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getShortTitle()
    {
        return $this->shortTitle;
    }

    /**
     * @param mixed $shortTitle
     *
     * @return Recipe
     */
    public function setShortTitle($shortTitle)
    {
        $this->shortTitle = $shortTitle;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMarketingDescription()
    {
        return $this->marketingDescription;
    }

    /**
     * @param mixed $marketingDescription
     *
     * @return Recipe
     */
    public function setMarketingDescription($marketingDescription)
    {
        $this->marketingDescription = $marketingDescription;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCaloriesKcal()
    {
        return $this->caloriesKcal;
    }

    /**
     * @param mixed $caloriesKcal
     *
     * @return Recipe
     */
    public function setCaloriesKcal($caloriesKcal)
    {
        $this->caloriesKcal = $caloriesKcal;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProteinGrams()
    {
        return $this->proteinGrams;
    }

    /**
     * @param mixed $proteinGrams
     *
     * @return Recipe
     */
    public function setProteinGrams($proteinGrams)
    {
        $this->proteinGrams = $proteinGrams;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFatGrams()
    {
        return $this->fatGrams;
    }

    /**
     * @param mixed $fatGrams
     *
     * @return Recipe
     */
    public function setFatGrams($fatGrams)
    {
        $this->fatGrams = $fatGrams;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCarbGrams()
    {
        return $this->carbGrams;
    }

    /**
     * @param mixed $carbGrams
     *
     * @return Recipe
     */
    public function setCarbGrams($carbGrams)
    {
        $this->carbGrams = $carbGrams;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBulletPoint1()
    {
        return $this->bulletPoint1;
    }

    /**
     * @param mixed $bulletPoint1
     *
     * @return Recipe
     */
    public function setBulletPoint1($bulletPoint1)
    {
        $this->bulletPoint1 = $bulletPoint1;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBulletPoint2()
    {
        return $this->bulletPoint2;
    }

    /**
     * @param mixed $bulletPoint2
     *
     * @return Recipe
     */
    public function setBulletPoint2($bulletPoint2)
    {
        $this->bulletPoint2 = $bulletPoint2;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBulletPoint3()
    {
        return $this->bulletPoint3;
    }

    /**
     * @param mixed $bulletPoint3
     *
     * @return Recipe
     */
    public function setBulletPoint3($bulletPoint3)
    {
        $this->bulletPoint3 = $bulletPoint3;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRecipeDietTypeId()
    {
        return $this->recipeDietTypeId;
    }

    /**
     * @param mixed $recipeDietTypeId
     *
     * @return Recipe
     */
    public function setRecipeDietTypeId($recipeDietTypeId)
    {
        $this->recipeDietTypeId = $recipeDietTypeId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * @param mixed $season
     *
     * @return Recipe
     */
    public function setSeason($season)
    {
        $this->season = $season;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * @param mixed $base
     *
     * @return Recipe
     */
    public function setBase($base)
    {
        $this->base = $base;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProteinSource()
    {
        return $this->proteinSource;
    }

    /**
     * @param mixed $proteinSource
     *
     * @return Recipe
     */
    public function setProteinSource($proteinSource)
    {
        $this->proteinSource = $proteinSource;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPreparationTimeMinutes()
    {
        return $this->preparationTimeMinutes;
    }

    /**
     * @param mixed $preparationTimeMinutes
     *
     * @return Recipe
     */
    public function setPreparationTimeMinutes($preparationTimeMinutes)
    {
        $this->preparationTimeMinutes = $preparationTimeMinutes;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getShelfLifeDays()
    {
        return $this->shelfLifeDays;
    }

    /**
     * @param mixed $shelfLifeDays
     *
     * @return Recipe
     */
    public function setShelfLifeDays($shelfLifeDays)
    {
        $this->shelfLifeDays = $shelfLifeDays;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEquipmentNeeded()
    {
        return $this->equipmentNeeded;
    }

    /**
     * @param mixed $equipmentNeeded
     *
     * @return Recipe
     */
    public function setEquipmentNeeded($equipmentNeeded)
    {
        $this->equipmentNeeded = $equipmentNeeded;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOriginCountry()
    {
        return $this->originCountry;
    }

    /**
     * @param mixed $originCountry
     *
     * @return Recipe
     */
    public function setOriginCountry($originCountry)
    {
        $this->originCountry = $originCountry;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRecipeCuisine()
    {
        return $this->recipeCuisine;
    }

    /**
     * @param mixed $recipeCuisine
     *
     * @return Recipe
     */
    public function setRecipeCuisine($recipeCuisine)
    {
        $this->recipeCuisine = $recipeCuisine;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInYourBox()
    {
        return $this->inYourBox;
    }

    /**
     * @param mixed $inYourBox
     *
     * @return Recipe
     */
    public function setInYourBox($inYourBox)
    {
        $this->inYourBox = $inYourBox;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGoustoReference()
    {
        return $this->goustoReference;
    }

    /**
     * @param mixed $goustoReference
     *
     * @return Recipe
     */
    public function setGoustoReference($goustoReference)
    {
        $this->goustoReference = $goustoReference;

        return $this;
    }
}
