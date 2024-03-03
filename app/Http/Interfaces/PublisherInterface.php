<?php

namespace App\Http\Interfaces;


use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

interface PublisherInterface
{
    public function index(Request $request);

    public function adminIndex(Request $request);

    public function show(Request $request, string $slug): JsonResponse;

    public function store(Request $request): JsonResponse;

    public function update(Request $request, Publisher $publisher): JsonResponse;

    public function destroy(Publisher $publisher): JsonResponse;
}
