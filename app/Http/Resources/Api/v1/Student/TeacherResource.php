<?php

namespace App\Http\Resources\Api\v1\Student;


use App\Http\Resources\Api\v1\Admin\EduLevelResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // $phone = $this->user->phone();
        // if ($phone->exists() && $phone->pluck('phone')->count() > 1) {
        //     $phones = array_combine(($this->user->phone()->pluck('country_code'))->toArray(), ($this->user->phone()->pluck('phone'))->toArray());
        //     $numbers = [];
        //     foreach ($phones as $key => $value) {
        //         $numbers[] = $key . $value;
        //     }
        //     $phones = $numbers;
        // } elseif ($phone->pluck('phone')->count() == 1) {
        //     $phones = $phone->pluck('country_code')->first() . $phone->pluck('phone')->first();
        // }
        // return [
        //     'id' => $this->id,
        //     'full_name' => $this->user->full_name,
        //     'phone' => $phone->exists() ? $phones : null,
        //     'experience' => $this->experience,
        //     'EduLevel' => EduLevelResource::make($this->whenLoaded('eduLevel')),
        //     'EduYears' => EduYearResource::collection($this->whenLoaded('eduYears')),
        //     'Subjects' => SubjectResource::collection($this->whenLoaded('subjects')),
        //     'Courses' => CourseResource::collection($this->whenLoaded('courses')),
        //     'is_approved' => $this->is_approved
        // ];
        return [
            'id'                => $this->id,
            'experience'        => $this->experience,
            'is_approved'       => $this->is_approved,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
            'user'              => new UserResource($this->whenLoaded('user')),
            'EduLevel'          => new EduLevelResource($this->whenLoaded('eduLevel')),
            'EduYears'          => EduYearResource::collection($this->whenLoaded('eduYears')),
            'Subjects'          => SubjectResource::collection($this->whenLoaded('subjects')),
            'Courses'           => CourseResource::collection($this->whenLoaded('courses')),
        ];
    }
}
