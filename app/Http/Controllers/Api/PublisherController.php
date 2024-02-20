<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Publisher\StorePublisherRequest;
use App\Http\Requests\Publisher\UpdatePublisherRequest;
use App\Http\Interfaces\PublisherInterface;
use Illuminate\Http\JsonResponse;
use App\Models\Publisher;
use App\Http\Resources\DefaultResource;
/**
 * @group Publisher
 *
 */
class PublisherController extends Controller
{

    public function __construct(public PublisherInterface $publisherRepository)
    {
    }

    /**
    * Publisher Get all
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
        return $this->publisherRepository->index($request);
    }

    /**
    * Publisher adminIndex get All
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
        return $this->publisherRepository->adminIndex($request);
    }

    /**
    * Publisher view
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
        return $this->publisherRepository->show($request, $id);
    }

    /**
    * Publisher create
    *
         * @bodyParam status integer
     * @bodyParam name string
     * @bodyParam slug string

    *
    * @param StorePublisherRequest $request
    * @return JsonResponse
    */

    public function store(StorePublisherRequest $request): JsonResponse
    {
        return $this->publisherRepository->store($request);
    }

    /**
    * Publisher update
    *
    * @queryParam publisher required
    *
         * @bodyParam status integer
     * @bodyParam name string
     * @bodyParam slug string

    *
    * @param UpdatePublisherRequest $request
    * @param Publisher $publisher
    * @return JsonResponse
    */

    public function update(UpdatePublisherRequest $request, Publisher $publisher): JsonResponse
    {
         return $this->publisherRepository->update($request, $publisher);
    }

    /**
     * Publisher delete
     *
     * @queryParam publisher required
     *
     * @param Publisher $publisher
     * @return JsonResponse
     */

    public function destroy(Publisher $publisher): JsonResponse
    {
        return  $this->publisherRepository->destroy($publisher);
    }
}
