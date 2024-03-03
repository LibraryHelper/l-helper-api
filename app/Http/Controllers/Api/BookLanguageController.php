<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BookLanguage\StoreBookLanguageRequest;
use App\Http\Requests\BookLanguage\UpdateBookLanguageRequest;
use App\Http\Interfaces\BookLanguageInterface;
use Illuminate\Http\JsonResponse;
use App\Models\BookLanguage;
use App\Http\Resources\DefaultResource;
/**
 * @group BookLanguage
 *
 */
class BookLanguageController extends Controller
{

    public function __construct(public BookLanguageInterface $bookLanguageRepository)
    {
    }

    /**
    * BookLanguage Get all
    *
    * @response {
    *  "icon_id": "integer",
     *  "created_at": "date",
     *  "updated_at": "date",
     *  "id": "integer",
     *  "status": "integer",
     *  "name": "string",
     *  "slug": "string",
    * }
    * @return JsonResponse
    */

    public function index(Request $request)
    {
        return $this->bookLanguageRepository->index($request);
    }

    /**
    * BookLanguage adminIndex get All
    *
    * @response {
    *  "icon_id": "integer",
     *  "created_at": "date",
     *  "updated_at": "date",
     *  "id": "integer",
     *  "status": "integer",
     *  "name": "string",
     *  "slug": "string",
    * }
    * @return JsonResponse
    */

    public function adminIndex(Request $request)
    {
        return $this->bookLanguageRepository->adminIndex($request);
    }

    /**
     * BookLanguage view
     *
     * @queryParam id required
     *
     * @param Request $request
     * @param string $slug
     * @return JsonResponse
     * @response {
     *  "icon_id": "integer",
     *  "created_at": "date",
     *  "updated_at": "date",
     *  "id": "integer",
     *  "status": "integer",
     *  "name": "string",
     *  "slug": "string",
     * }
     */

    public function show(Request $request, string $slug): JsonResponse
    {
        return $this->bookLanguageRepository->show($request, $slug);
    }

    /**
    * BookLanguage create
    *
         * @bodyParam icon_id integer
     * @bodyParam status integer
     * @bodyParam name string
     * @bodyParam slug string

    *
    * @param StoreBookLanguageRequest $request
    * @return JsonResponse
    */

    public function store(StoreBookLanguageRequest $request): JsonResponse
    {
        return $this->bookLanguageRepository->store($request);
    }

    /**
    * BookLanguage update
    *
    * @queryParam bookLanguage required
    *
         * @bodyParam icon_id integer
     * @bodyParam status integer
     * @bodyParam name string
     * @bodyParam slug string

    *
    * @param UpdateBookLanguageRequest $request
    * @param BookLanguage $bookLanguage
    * @return JsonResponse
    */

    public function update(UpdateBookLanguageRequest $request, BookLanguage $bookLanguage): JsonResponse
    {
         return $this->bookLanguageRepository->update($request, $bookLanguage);
    }

    /**
     * BookLanguage delete
     *
     * @queryParam bookLanguage required
     *
     * @param BookLanguage $bookLanguage
     * @return JsonResponse
     */

    public function destroy(BookLanguage $bookLanguage): JsonResponse
    {
        return  $this->bookLanguageRepository->destroy($bookLanguage);
    }
}
