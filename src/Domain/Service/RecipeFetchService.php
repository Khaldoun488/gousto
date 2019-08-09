<?php

namespace App\Domain\Service;

use App\Domain\Exception\RecipeNotFoundException;
use App\Domain\Exception\ValidationException;
use App\Domain\Repository\RecipeRepository;
use App\Domain\Request\RecipeFetchRequest;
use App\Domain\Response\RecipeListResponse;
use App\Domain\Response\RecipeResponse;
use JMS\Serializer\ArrayTransformerInterface;

/**
 * Class RecipeGetService
 */
class RecipeFetchService
{
    /** @var RecipeRepository */
    private $repository;

    /** @var HydratorService */
    private $hydratorService;

    /**
     * RecipeFetchService constructor.
     *
     * @param RecipeRepository $repository
     * @param HydratorService  $hydratorService
     */
    public function __construct(RecipeRepository $repository, HydratorService $hydratorService)
    {
        $this->repository = $repository;
        $this->hydratorService = $hydratorService;
    }

    /**
     * @param RecipeFetchRequest $request
     *
     * @return RecipeListResponse
     * @throws ValidationException
     */
    public function fetchByCuisine(RecipeFetchRequest $request)
    {
        $this->validateFetchRequest($request);

        $recipes = $this->repository->findByCuisine($request->cuisine, $request->limit, $request->offset);

        $response = new RecipeListResponse();

        foreach ($recipes as $recipe) {
            $response->recipes [] = $this->hydrateRecipeResponse($recipe, ['recipe_list']);
        }

        return $response;
    }

    /**
     * @param $id
     *
     * @return RecipeResponse
     * @throws RecipeNotFoundException
     * @throws ValidationException
     */
    public function fetchById($id)
    {
        $this->validateRecipeId($id);

        $recipe = $this->repository->findById($id);

        if ($recipe === null) {
            throw new RecipeNotFoundException('Recipe not found!');
        }

        return $this->hydrateRecipeResponse($recipe, ['recipe_item']);
    }

    /**
     * @param RecipeFetchRequest $request
     *
     * @throws ValidationException
     */
    private function validateFetchRequest(RecipeFetchRequest $request)
    {
        if (!$request->cuisine) {
            throw new ValidationException('Please provide a cuisine!');
        }
    }

    /**
     * @param       $recipe
     * @param array $groups
     *
     * @return RecipeResponse|object
     */
    private function hydrateRecipeResponse($recipe, $groups = [])
    {
        $hydrate = $this->hydratorService->hydrate($recipe, RecipeResponse::class, $groups);

        return $hydrate;
    }

    /**
     * @param $id
     *
     * @throws ValidationException
     */
    private function validateRecipeId($id)
    {
        if (!is_numeric($id)) {
            throw new ValidationException('Please provide a valid id!');
        }
    }
}
