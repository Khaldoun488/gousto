<?php

namespace App\Controller;


use App\Domain\Exception\RecipeNotFoundException;
use App\Domain\Exception\ValidationException;
use App\Domain\Request\RecipeFetchRequest;
use App\Domain\Service\RecipeFetchService;
use App\Domain\Service\RecipeUpdateService;
use JMS\Serializer\ArrayTransformerInterface;
use JMS\Serializer\Serializer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class RecipeController
 * @package App\Application\Controller
 */
class RecipeController extends AbstractController
{
    /** @var RecipeFetchService */
    private $fetchService;

    /** @var ArrayTransformerInterface */
    private $serializer;

    /**
     * RecipeController constructor.
     *
     * @param RecipeFetchService  $fetchService
     * @param ArrayTransformerInterface          $serializer
     */
    public function __construct(
        RecipeFetchService $fetchService,
        ArrayTransformerInterface $serializer
    ) {
        $this->fetchService = $fetchService;
        $this->serializer = $serializer;
    }

    /**
     * @param Request $request
     * @Route(name="recipe_index", path="/recipes", methods={"GET"})
     *
     * @return JsonResponse
     */
    public function indexAction(Request $request)
    {
        try {
            $recipeListResponse = $this->fetchService->fetchByCuisine($this->hydrateFetchRequest($request));
        } catch (ValidationException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        $response = $this->serializer->serialize($recipeListResponse, 'json');

        return new JsonResponse($response, 200, [], true);
    }

    /**
     * @Route(name="recipe_get", path="/recipes/{id}", methods={"GET"})
     * @param $id
     *
     * @return JsonResponse
     */
    public function getAction($id)
    {
        try {
            $response = $this->fetchService->fetchById($id);
        } catch (RecipeNotFoundException $e) {
            throw new NotFoundHttpException($e->getMessage());
        } catch (ValidationException $ve) {
            throw new BadRequestHttpException($ve->getMessage());
        }

        return new JsonResponse( $this->serializer->serialize($response, 'json'), 200, [], true);
    }

    /**
     * @param Request $request
     *
     * @return RecipeFetchRequest
     */
    private function hydrateFetchRequest(Request $request)
    {
        $fetchRequest = new RecipeFetchRequest();
        $fetchRequest->limit = 5;
        $fetchRequest->offset = $fetchRequest->limit * ($request->query->get('page', 1) - 1);
        $fetchRequest->cuisine = $request->query->get('cuisine', null);

        return $fetchRequest;
    }
}
