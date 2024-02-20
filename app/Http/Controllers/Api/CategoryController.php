<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Interfaces\CategoryInterface;
use Illuminate\Http\JsonResponse;
use App\Models\Category;
/**
 * @group Category
 *
 */
class CategoryController extends Controller
{

    public function __construct(public CategoryInterface $categoryRepository)
    {
    }

    /**
    * Category Get all
    *
    * @response {
    *  "updated_at": "date",
     *  "created_at": "date",
     *  "id": "integer",
     *  "parent_id": "integer",
     *  "status": "integer",
     *  "type": "integer",
     *  "name": "string",
     *  "slug": "string",
    * }
    * @return JsonResponse
    */

    public function index(Request $request)
    {
        return $this->categoryRepository->index($request);
    }

    /**
    * Category adminIndex get All
    *
    * @response {
    *  "updated_at": "date",
     *  "created_at": "date",
     *  "id": "integer",
     *  "parent_id": "integer",
     *  "status": "integer",
     *  "type": "integer",
     *  "name": "string",
     *  "slug": "string",
    * }
    * @return JsonResponse
    */

    public function adminIndex(Request $request)
    {
        return $this->categoryRepository->adminIndex($request);
    }

    /**
    * Category view
    *
    * @queryParam id required
    *
    * @param Request $request
    * @param int     $id
    * @return JsonResponse
    * @response {
    *  "updated_at": "date",
     *  "created_at": "date",
     *  "id": "integer",
     *  "parent_id": "integer",
     *  "status": "integer",
     *  "type": "integer",
     *  "name": "string",
     *  "slug": "string",
    * }
    */

    public function show(Request $request, string $slug): JsonResponse
    {
        return $this->categoryRepository->show($request, $slug);
    }

    /**
    * Category create
    *
         * @bodyParam parent_id integer
     * @bodyParam status integer
     * @bodyParam type integer
     * @bodyParam name string
     * @bodyParam slug string

    *
    * @param StoreCategoryRequest $request
    * @return JsonResponse
    */

    public function store(StoreCategoryRequest $request): JsonResponse
    {
        return $this->categoryRepository->store($request);
    }

    /**
    * Category update
    *
    * @queryParam category required
    *
         * @bodyParam parent_id integer
     * @bodyParam status integer
     * @bodyParam type integer
     * @bodyParam name string
     * @bodyParam slug string

    *
    * @param UpdateCategoryRequest $request
    * @param Category $category
    * @return JsonResponse
    */

    public function update(UpdateCategoryRequest $request, Category $category): JsonResponse
    {
         return $this->categoryRepository->update($request, $category);
    }

    /**
     * Category delete
     *
     * @queryParam category required
     *
     * @param Category $category
     * @return JsonResponse
     */

    public function destroy(Category $category): JsonResponse
    {
        return  $this->categoryRepository->destroy($category);
    }

    public function genres(Request $request)
    {
        return $this->categoryRepository->index($request, true);
    }

    public function storeGenre(StoreCategoryRequest $request)
    {
        return $this->categoryRepository->store($request, true);
    }

    public function updateGenre(UpdateCategoryRequest $request, Category $category)
    {
        return $this->categoryRepository->update($request, $category);
    }

    public function destroyGenre(Category $category)
    {
        return $this->categoryRepository->destroy($category);
    }

    public function showGenre(Request $request, string $slug)
    {
        return $this->categoryRepository->show($request, $slug);
    }

    public function adminIndexGenre(Request $request)
    {
        return $this->categoryRepository->adminIndex($request, true);
    }
}
