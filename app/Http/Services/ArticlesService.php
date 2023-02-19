<?php

namespace App\Http\Services;

use App\Models\Articles;
use Exception;

class ArticlesService
{
  public function getById($id)
  {
    try {

      $article = Articles::find($id);

      if (empty($article)) {
        throw new Exception('Artigo não encontrado.', 400);
      }

      return $article;
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

  public function create($request)
  {
    try {
      $article = Articles::where('title', $request->title);

      if ($article->exists()) {
        throw new Exception('Título já está em uso.', 400);
      }

      Articles::create([
        "featured" => $request->featured,
        "title" => $request->title,
        "url" => $request->url,
        "imageUrl" => $request->imageUrl,
        "newsSite" => $request->newsSite,
        "summary" => $request->summary,
        "publishedAt" => $request->publishedAt,
        "launches"  => $request->launches,
        "events" => $request->events
      ]);
    } catch (\Exception $exception) {
      return response()->json(
        [
          "type" => "error",
          "message" => $exception->getMessage()
        ],
      );
    }
  }

  public function update($request, $id)
  {
    try {
      $articles = Articles::find($id);
      $articles->featured = $request->featured;
      $articles->title = $request->title;
      $articles->url = $request->url;
      $articles->imageUrl = $request->imageUrl;
      $articles->newsSite = $request->newsSite;
      $articles->summary = $request->summary;
      $articles->publishedAt = $request->publishedAt;
      $articles->launches = $request->launches;
      $articles->events = $request->events;

      $articles->save();

      return response()->json(
        [
          "type" => "success",
          "message" => 'Alterado com sucesso!'
        ],
      );
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
      Articles::destroy($id);
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
}
