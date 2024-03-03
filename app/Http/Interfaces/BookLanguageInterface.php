<?php

namespace App\Http\Interfaces;


use App\Models\BookLanguage;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

interface BookLanguageInterface
{
    public function index(Request $request);

    public function adminIndex(Request $request);

    public function show(Request $request, string $slug): JsonResponse;

    public function store(Request $request): JsonResponse;

    public function update(Request $request, BookLanguage $book_language): JsonResponse;

    public function destroy(BookLanguage $book_language): JsonResponse;
}
