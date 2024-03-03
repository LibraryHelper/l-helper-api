<?php

namespace App\Http\Repositories;


use App\Http\Interfaces\CategoryInterface;
use App\Http\Resources\DefaultResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryInterface
{
    /**
     * @var Category $ modelClass
     */
    protected mixed $modelClass = Category::class;

    public function index(Request $request, bool $is_genre = false)
    {
        $query = $this->generateQuery($request);
        $query->where('status', Category::STATUS_ACTIVE);
        if ($is_genre) {
            $query->where('type', Category::TYPE_GENRE);
        }
        $data = $query->paginate($request->get('per_page'));
        return DefaultResource::collection($data);
    }

    public function adminIndex(Request $request, bool $is_genre = false)
    {
        $query = $this->generateQuery($request);
        if ($is_genre) {
            $query->where('type', Category::TYPE_GENRE);
        }
        $data = $query->paginate($request->get('per_page'));
        return DefaultResource::collection($data);
    }

    public function show(Request $request, string $slug): JsonResponse
    {
        $category = $this->findBySlug($slug);

        $this->defaultAppendAndInclude($category, $request);

        return okResponse($category);
    }

    public function store(Request $request, bool $is_genre = false): JsonResponse
    {
        $request->merge(['type' => $is_genre ? Category::TYPE_GENRE : Category::TYPE_CATEGORY]);
        $model = Category::query()->create($request->all());
        $this->defaultAppendAndInclude($model, $request);
        return createdResponse($model);
    }

    public function update(Request $request, Category $category): JsonResponse
    {
        $category->update($request->all());
        $this->defaultAppendAndInclude($category, $request);
        return okResponse($category);
    }

    public function destroy(Category $category): JsonResponse
    {
        $category->delete();
        return okResponse($category);
    }
}

