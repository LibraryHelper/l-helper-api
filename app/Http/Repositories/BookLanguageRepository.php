<?php

namespace App\Http\Repositories;


use App\Http\Interfaces\BookLanguageInterface;
use App\Http\Resources\DefaultResource;
use App\Models\BookLanguage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Repositories\BaseRepository;

class BookLanguageRepository extends BaseRepository implements BookLanguageInterface
{
    /**
     * @var BookLanguage $ modelClass
     */
    protected mixed $modelClass = BookLanguage::class;

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

    public function show(Request $request, string $slug): JsonResponse
    {
        $bookLanguage = $this->findBySlug($slug);
        $this->defaultAppendAndInclude($bookLanguage, $request);
        return okResponse($bookLanguage);
    }

    public function store(Request $request): JsonResponse
    {
        $model = BookLanguage::query()->create($request->all());
        $this->defaultAppendAndInclude($model, $request);
        return createdResponse($model);
    }

    public function update(Request $request, BookLanguage $book_language): JsonResponse
    {
        $book_language->update($request->all());
        $this->defaultAppendAndInclude($book_language, $request);
        return okResponse($book_language);
    }

    public function destroy(BookLanguage $book_language): JsonResponse
    {
        $book_language->delete();
        return okResponse($book_language);
    }
}

