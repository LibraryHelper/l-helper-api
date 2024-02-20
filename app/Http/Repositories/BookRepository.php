<?php

namespace App\Http\Repositories;


use App\Http\Interfaces\BookInterface;
use App\Http\Resources\DefaultResource;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Repositories\BaseRepository;

class BookRepository extends BaseRepository implements BookInterface
{
    /**
     * @var Book $ modelClass
     */
    protected mixed $modelClass = Book::class;

    public function index(Request $request)
    {
        $query = $this->generateQuery($request);
        $data = $query->paginate($request->get('per_page'));
        return DefaultResource::collection($data);
    }

    public function adminIndex(Request $request)
    {
        $query = $this->generateQuery($request);
        $data = $query->paginate($request->get('per_page'));
        return DefaultResource::collection($data);
    }

    public function show(Request $request, int $id): JsonResponse
    {
        $query = $this->generateQuery($request);
        $book = $query->findOrFail($id);
        return okResponse($book);
    }

    public function store(Request $request): JsonResponse
    {
        $model = Book::query()->create($request->all());
        $this->defaultAppendAndInclude($model, $request);
        return createdResponse($model);
    }

    public function update(Request $request, Book $book): JsonResponse
    {
        $book = $book->update($request->all());
        $this->defaultAppendAndInclude($book, $request);
        return okResponse($book);
    }

    public function destroy(Book $book): JsonResponse
    {
        $book->delete();
        return okResponse($book);
    }
}

