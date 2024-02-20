<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Author\StoreAuthorRequest;
use App\Http\Requests\Author\UpdateAuthorRequest;
use App\Http\Interfaces\AuthorInterface;
use Illuminate\Http\JsonResponse;
use App\Models\Author;
use App\Http\Resources\DefaultResource;
/**
 * @group Author
 *
 */
class AuthorController extends Controller
{

    public function __construct(public AuthorInterface $authorRepository)
    {
    }

    /**
    * Author Get all
    *
    * @response {
    *  "id": "integer",
     *  "status": "integer",
     *  "created_at": "date",
     *  "updated_at": "date",
     *  "name": "string",
     *  "slug": "string",
    * }
    * @return JsonResponse
    */

    public function index(Request $request)
    {
        return $this->authorRepository->index($request);
    }

    /**
    * Author adminIndex get All
    *
    * @response {
    *  "id": "integer",
     *  "status": "integer",
     *  "created_at": "date",
     *  "updated_at": "date",
     *  "name": "string",
     *  "slug": "string",
    * }
    * @return JsonResponse
    */

    public function adminIndex(Request $request)
    {
        return $this->authorRepository->adminIndex($request);
    }

    /**
    * Author view
    *
    * @queryParam id required
    *
    * @param Request $request
    * @param int     $id
    * @return JsonResponse
    * @response {
    *  "id": "integer",
     *  "status": "integer",
     *  "created_at": "date",
     *  "updated_at": "date",
     *  "name": "string",
     *  "slug": "string",
    * }
    */

    public function show(Request $request, int $id): JsonResponse
    {
        return $this->authorRepository->show($request, $id);
    }

    /**
    * Author create
    *
         * @bodyParam status integer
     * @bodyParam name string
     * @bodyParam slug string

    *
    * @param StoreAuthorRequest $request
    * @return JsonResponse
    */

    public function store(StoreAuthorRequest $request): JsonResponse
    {
        return $this->authorRepository->store($request);
    }

    /**
    * Author update
    *
    * @queryParam author required
    *
         * @bodyParam status integer
     * @bodyParam name string
     * @bodyParam slug string

    *
    * @param UpdateAuthorRequest $request
    * @param Author $author
    * @return JsonResponse
    */

    public function update(UpdateAuthorRequest $request, Author $author): JsonResponse
    {
         return $this->authorRepository->update($request, $author);
    }

    /**
     * Author delete
     *
     * @queryParam author required
     *
     * @param Author $author
     * @return JsonResponse
     */

    public function destroy(Author $author): JsonResponse
    {
        return  $this->authorRepository->destroy($author);
    }
}
