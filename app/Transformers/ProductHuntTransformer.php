<?php

namespace App\Transformers;

use Carbon\Carbon;
use App\Transformers\TransformerAbstract;

class ProductHuntTransformer extends TransformerAbstract
{
  public function transform($payload)
  {
    return [
      'title' => $payload->name,
      'link' => $payload->redirect_url,
      'description' => $payload->tagline,
      'image_url' => $this->ImageTransform($payload->screenshot_url),
      'votes_count' => $payload->votes_count,
      'comments_count' => $payload->comments_count,
      'timestamp' => Carbon::parse($payload->created_at, 'UTC')->getTimestamp(),
      'service' => 'ProductHunt'
    ];
  }

  protected function ImageTransform($images)
  {
    foreach ($images as $key => $image) {
      return $image;
    }
  }
}
