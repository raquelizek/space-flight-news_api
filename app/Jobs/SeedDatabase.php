<?php

namespace App\Jobs;

use App\Models\Articles;
use Exception;
use Illuminate\Support\Facades\Log;

class SeedDatabase
{
  public function execute()
  {
    $content = file_get_contents('https://api.spaceflightnewsapi.net/v3/articles?_limit=250');
    $articles = json_decode($content);

    foreach ($articles as $article) {
      $alreadyHasArticle = Articles::where('title', $article->title);

      if (!$alreadyHasArticle->exists()) {

        Articles::create([
          "featured" => $article->featured,
          "title" => $article->title,
          "url" => $article->url,
          "imageUrl" => $article->imageUrl,
          "newsSite" => $article->newsSite,
          "summary" => $article->summary,
          "publishedAt" => $article->publishedAt,
          "launches"  => $article->launches,
          "events" => $article->events
        ]);
      }
    }
  }
}
