<?php

namespace App\Http\Interfaces;


use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

interface CategoryInterface
{
    public function index(Request $request, bool $is_genre = false);

    public function adminIndex(Request $request, bool $is_genre = false);

    public function show(Request $request, string $slug): JsonResponse;

    public function store(Request $request, bool $is_genre = false): JsonResponse;

    public function update(Request $request, Category $category): JsonResponse;

    public function destroy(Category $category): JsonResponse;
}
