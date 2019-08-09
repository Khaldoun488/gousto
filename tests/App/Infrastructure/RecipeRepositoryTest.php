<?php

namespace App\Tests\App\Infrastructure;


use App\Domain\Service\HydratorService;
use App\Infrastructure\RecipeRepository;
use Mockery\Adapter\Phpunit\MockeryTestCase;

class RecipeRepositoryTest extends MockeryTestCase
{
    /**
     * @test
     * @dataProvider cuisinesProvider
     */
    public function it_fetch_by_cuisine($cuisine, $outputIds)
    {
        $repo = new RecipeRepository();

        $recipes = $repo->findByCuisine($cuisine, 100, 0);

        $ids = [];
        foreach ($recipes as $recipe)
        {
            $ids[] = $recipe->getId();
        }

        $this->assertEquals($outputIds, $ids);
    }

    /**
     * @test
     * @dataProvider cuisinesLimitedProvider
     */
    public function it_respect_limit($cuisine, $outputIds)
    {
        $repo = new RecipeRepository();

        $recipes = $repo->findByCuisine($cuisine, 1, 0);

        $ids = [];
        foreach ($recipes as $recipe)
        {
            $ids[] = $recipe->getId();
        }

        $this->assertEquals($outputIds, $ids);
    }

    /**
     * @test
     * @dataProvider cuisinesOffsetProvider
     */
    public function it_respect_offset($cuisine, $outputIds)
    {
        $repo = new RecipeRepository();

        $recipes = $repo->findByCuisine($cuisine, 1, 1);

        $ids = [];
        foreach ($recipes as $recipe)
        {
            $ids[] = $recipe->getId();
        }

        $this->assertEquals($outputIds, $ids);
    }

    /**
     * @test
     */
    public function it_return_null_if_id_is_wrong()
    {
        $repo = new RecipeRepository();

        $this->assertEquals(null, $repo->findById(9999));
    }

    public function cuisinesProvider()
    {
        return [
            ['italian',[2,8]],
            ['british',[3,4,5,7]],
            ['unknown',[]],
        ];
    }

    public function cuisinesLimitedProvider()
    {
        return [
            ['italian',[2]],
            ['british',[3]],
            ['unknown',[]],
        ];
    }

    public function cuisinesOffsetProvider()
    {
        return [
            ['italian',[8]],
            ['british',[4]],
            ['unknown',[]],
        ];
    }
}
