<?php

namespace App\Tests\App\Domain;

use App\Domain\Entity\Recipe;
use App\Domain\Exception\RecipeNotFoundException;
use App\Domain\Exception\ValidationException;
use App\Domain\Repository\RecipeRepository;
use App\Domain\Request\RecipeFetchRequest;
use App\Domain\Response\RecipeResponse;
use App\Domain\Service\HydratorService;
use App\Domain\Service\RecipeFetchService;

use Mockery\Adapter\Phpunit\MockeryTestCase;

class RecipeFetchServiceTest extends MockeryTestCase
{
    /**
     * @test
     */
    public function it_throws_an_exception_if_cuisine_is_not_provided()
    {
        $repository = $this->getRepository();
        $hydratorService = $this->getHydratorService();

        $request = new RecipeFetchRequest();
        $request->cuisine = null;

        $this->expectExceptionObject(new ValidationException('Please provide a cuisine!'));

        $service = new RecipeFetchService($repository, $hydratorService);

        $service->fetchByCuisine($request);
    }

    /**
     * @test
     */
    public function it_throws_an_exception_if_recipe_by_id_is_not_found()
    {
        $repository = $this->getRepository();
        $hydratorService = $this->getHydratorService();

        $repository->shouldReceive('findById')->withArgs([9999])->andReturn(null);

        $this->expectExceptionObject(new RecipeNotFoundException('Recipe not found!'));

        $service = new RecipeFetchService($repository, $hydratorService);

        $service->fetchById(9999);
    }

    /**
     * @test
     */
    public function it_throws_an_exception_if_id_is_not_valid()
    {
        $repository = $this->getRepository();
        $hydratorService = $this->getHydratorService();

        $this->expectExceptionObject(new ValidationException('Please provide a valid id!'));

        $service = new RecipeFetchService($repository, $hydratorService);

        $service->fetchById("a string");
    }

    /**
     * @test
     */
    public function it_hydrate_response_with_correct_group_when_fetching_by_kitchen()
    {
        $repository = $this->getRepository();
        $hydratorService = $this->getHydratorService();
        $recipe = new Recipe();
        $recipe->setId(1)
            ->setBase('base')
            ->setTitle('title')
            ->setMarketingDescription('desc')
            ->setGoustoReference('ref');

        $repository->shouldReceive('findByCuisine')->withArgs(['italian', 5, 0])->andReturn([$recipe]);
        $hydratorService->shouldReceive('hydrate')->withArgs([$recipe, RecipeResponse::class, ['recipe_list']]);
        $request = new RecipeFetchRequest();
        $request->cuisine = 'italian';
        $request->limit = 5;
        $request->offset = 0;

        $service = new RecipeFetchService($repository, $hydratorService);

        $service->fetchByCuisine($request);
    }

    /**
     * @test
     */
    public function it_hydrate_response_with_correct_group_when_fetching_by_id()
    {
        $repository = $this->getRepository();
        $hydratorService = $this->getHydratorService();
        $recipe = new Recipe();
        $recipe->setId(1)
            ->setBase('base')
            ->setTitle('title')
            ->setMarketingDescription('desc')
            ->setGoustoReference('ref');

        $repository->shouldReceive('findById')->withArgs([1])->andReturn($recipe);
        $hydratorService->shouldReceive('hydrate')->withArgs([$recipe, RecipeResponse::class, ['recipe_item']]);

        $service = new RecipeFetchService($repository, $hydratorService);

        $service->fetchById(1);
    }

    private function getRepository()
    {
        return \Mockery::mock(RecipeRepository::class);
    }

    private function getHydratorService()
    {
        return \Mockery::mock(HydratorService::class);
    }
}
