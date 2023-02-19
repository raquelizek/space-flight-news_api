<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Http\Services\ArticlesService;
use Exception;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function __construct(ArticlesService $service)
    {
        $this->service = $service;
    }

    public function getById($id)
    {
        try {
            return $this->service->getById($id);
        } catch (\Exception $exception) {
            return response()->json(
                [
                    "type" => "error",
                    "message" => $exception->getMessage()
                ],
                $exception->getCode()
            );
        }
    }

    public function list()
    {
        $articles = Articles::paginate(5);

        return response()->json($articles);
    }

    public function create(Request $request)
    {
        try {
            return $this->service->create($request);
        } catch (\Exception $exception) {
            return response()->json(
                [
                    "type" => "error",
                    "message" => $exception->getMessage()
                ],
            );
        }
    }

    public function destroy($id)
    {
        try {
            return $this->service->destroy($id);
        } catch (\Exception $exception) {
            return response()->json(
                [
                    "type" => "error",
                    "message" => $exception->getMessage()
                ],
            );
        }
    }

    public function update(Request $request, $id)
    {
        try {
            return $this->service->update($request, $id);
        } catch (\Exception $exception) {
            return response()->json(
                [
                    "type" => "error",
                    "message" => $exception->getMessage()
                ],
            );
        }
    }
}
