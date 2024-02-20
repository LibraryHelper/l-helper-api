<?php

namespace App\Http\Interfaces;


use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

interface BookInterface
{
    public function index(Request $request);

    public function adminIndex(Request $request);

    public function show(Request $request, int $id): JsonResponse;

    public function store(Request $request): JsonResponse;

    public function update(Request $request, Book $book): JsonResponse;

    public function destroy(Book $book): JsonResponse;
}
