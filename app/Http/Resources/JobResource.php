<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use PHPUnit\Event\TestSuite\Loaded;

class JobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title'=>$this->title,
            'descrption'=>$this->descrption,
            'requirement'=>$this->requirement,
            'min_salary'=>$this->min_salary,
            'max_salary'=>$this->max_salary,
            'status'=>$this->status,
            'company'=>$this->whenLoaded('company')
        ];
    }
}
