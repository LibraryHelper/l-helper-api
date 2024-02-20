<?php

namespace App\Http\Repositories;


use App\Http\Interfaces\PublisherInterface;
use App\Http\Resources\DefaultResource;
use App\Models\Publisher;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Repositories\BaseRepository;

class PublisherRepository extends BaseRepository implements PublisherInterface
{
    /**
     * @var Publisher $ modelClass
     */
    protected mixed $modelClass = Publisher::class;

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
        $publisher = $query->findOrFail($id);
        return okResponse($publisher);
    }

    public function store(Request $request): JsonResponse
    {
        $model = Publisher::query()->create($request->all());
        $this->defaultAppendAndInclude($model, $request);
        return createdResponse($model);
    }

    public function update(Request $request, Publisher $publisher): JsonResponse
    {
        $publisher = $publisher->update($request->all());
        $this->defaultAppendAndInclude($publisher, $request);
        return okResponse($publisher);
    }

    public function destroy(Publisher $publisher): JsonResponse
    {
        $publisher->delete();
        return okResponse($publisher);
    }
}

