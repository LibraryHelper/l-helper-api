<?php

namespace App\Http\Repositories;


use App\Http\Interfaces\AuthorInterface;
use App\Http\Resources\DefaultResource;
use App\Models\Author;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Repositories\BaseRepository;

class AuthorRepository extends BaseRepository implements AuthorInterface
{
    /**
     * @var Author $ modelClass
     */
    protected mixed $modelClass = Author::class;

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
        $author = $query->findOrFail($id);
        return okResponse($author);
    }

    public function store(Request $request): JsonResponse
    {
        $model = Author::query()->create($request->all());
        $this->defaultAppendAndInclude($model, $request);
        return createdResponse($model);
    }

    public function update(Request $request, Author $author): JsonResponse
    {
        $author = $author->update($request->all());
        $this->defaultAppendAndInclude($author, $request);
        return okResponse($author);
    }

    public function destroy(Author $author): JsonResponse
    {
        $author->delete();
        return okResponse($author);
    }
}

