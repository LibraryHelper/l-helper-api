<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Book\StoreBookRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Http\Interfaces\BookInterface;
use Illuminate\Http\JsonResponse;
use App\Models\Book;
use App\Http\Resources\DefaultResource;
/**
 * @group Book
 *
 */
class BookController extends Controller
{

    public function __construct(public BookInterface $bookRepository)
    {
    }

    /**
    * Book Get all
    *
    * @response {
    *  "id": "integer",
     *  "status": "integer",
     *  "organization_id": "integer",
     *  "created_at": "date",
     *  "updated_at": "date",
     *  "page_count": "integer",
     *  "published_at": "date",
     *  "cover_image_id": "integer",
     *  "cover_type": "integer",
     *  "language_id": "integer",
     *  "publisher_id": "integer",
     *  "name": "string",
     *  "isbn": "string",
     *  "slug": "string",
     *  "description": "string",
    * }
    * @return JsonResponse
    */

    public function index(Request $request)
    {
        return $this->bookRepository->index($request);
    }

    /**
    * Book adminIndex get All
    *
    * @response {
    *  "id": "integer",
     *  "status": "integer",
     *  "organization_id": "integer",
     *  "created_at": "date",
     *  "updated_at": "date",
     *  "page_count": "integer",
     *  "published_at": "date",
     *  "cover_image_id": "integer",
     *  "cover_type": "integer",
     *  "language_id": "integer",
     *  "publisher_id": "integer",
     *  "name": "string",
     *  "isbn": "string",
     *  "slug": "string",
     *  "description": "string",
    * }
    * @return JsonResponse
    */

    public function adminIndex(Request $request)
    {
        return $this->bookRepository->adminIndex($request);
    }

    /**
    * Book view
    *
    * @queryParam id required
    *
    * @param Request $request
    * @param int     $id
    * @return JsonResponse
    * @response {
    *  "id": "integer",
     *  "status": "integer",
     *  "organization_id": "integer",
     *  "created_at": "date",
     *  "updated_at": "date",
     *  "page_count": "integer",
     *  "published_at": "date",
     *  "cover_image_id": "integer",
     *  "cover_type": "integer",
     *  "language_id": "integer",
     *  "publisher_id": "integer",
     *  "name": "string",
     *  "isbn": "string",
     *  "slug": "string",
     *  "description": "string",
    * }
    */

    public function show(Request $request, int $id): JsonResponse
    {
        return $this->bookRepository->show($request, $id);
    }

    /**
    * Book create
    *
         * @bodyParam status integer
     * @bodyParam organization_id integer
     * @bodyParam page_count integer
     * @bodyParam published_at date
     * @bodyParam cover_image_id integer
     * @bodyParam cover_type integer
     * @bodyParam language_id integer
     * @bodyParam publisher_id integer
     * @bodyParam name string
     * @bodyParam isbn string
     * @bodyParam slug string
     * @bodyParam description string

    *
    * @param StoreBookRequest $request
    * @return JsonResponse
    */

    public function store(StoreBookRequest $request): JsonResponse
    {
        return $this->bookRepository->store($request);
    }

    /**
    * Book update
    *
    * @queryParam book required
    *
         * @bodyParam status integer
     * @bodyParam organization_id integer
     * @bodyParam page_count integer
     * @bodyParam published_at date
     * @bodyParam cover_image_id integer
     * @bodyParam cover_type integer
     * @bodyParam language_id integer
     * @bodyParam publisher_id integer
     * @bodyParam name string
     * @bodyParam isbn string
     * @bodyParam slug string
     * @bodyParam description string

    *
    * @param UpdateBookRequest $request
    * @param Book $book
    * @return JsonResponse
    */

    public function update(UpdateBookRequest $request, Book $book): JsonResponse
    {
         return $this->bookRepository->update($request, $book);
    }

    /**
     * Book delete
     *
     * @queryParam book required
     *
     * @param Book $book
     * @return JsonResponse
     */

    public function destroy(Book $book): JsonResponse
    {
        return  $this->bookRepository->destroy($book);
    }
}
