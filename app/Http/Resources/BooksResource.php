<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BooksResource extends JsonResource
{ 
    public function toArray(Request $request): array 
    { 
        return [ 
            'id' => $this->id, 
            'title' => $this->title, 
            'author' => $this->author, 
            'description' => $this->description, 
            'published_year' => $this->published_year, 
            'created_at' => $this->created_at->toDateTimeString(), 
            'updated_at' => $this->updated_at->toDateTimeString(), 
        ]; 
    } 
}

