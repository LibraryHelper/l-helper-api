<?php

namespace App\Http\Interfaces;


use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

interface AuthorInterface
{
    public function index(Request $request);

    public function adminIndex(Request $request);

    public function show(Request $request, int $id): JsonResponse;

    public function store(Request $request): JsonResponse;

    public function update(Request $request, Author $author): JsonResponse;

    public function destroy(Author $author): JsonResponse;
}
