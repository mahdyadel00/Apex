<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Constraint\Count;

function saveMedia($request, $model): bool
{
    return DB::transaction(function () use ($request, $model) {
        $files = [];
        foreach ($request->files->all() as $key => $media) {
            if (is_array($media) && Count($media) > 1) {
                foreach ($media as $index => $file) {
                    $file = $request->file($key)[$index] ?? $request->file($key)[$index]['file'];
                    $files[] = [
                        'name' => $request->input("$key.$index.name") ?? $key,
                        'path' => Storage::disk('public')->putFile(strtolower(class_basename($model)) . "/" . now()->format("Y_m_d"), $file),
                        'type' => $file->getMimeType(),
                        'size' => $file->getSize(),
                        'description' => $request->input("$key.$index.description") ?? $file->getClientOriginalName(),
                        'order' => $request->input("$key.$index.order") ?? 0,
                        'is_main' => $request->input("$key.$index.is_main") ?? 0,
                    ];
                }
            } else if (is_array($media) && Count($media) == 1) {
                $media = $request->file($key)[0] ?? $request->file($key)[0];
                $files[] = [
                    'name' => $request->input("$key.0.name") ?? $key,
                    'path' => Storage::disk('public')->putFile(strtolower(class_basename($model)) . "/" . now()->format("Y_m_d"), $media),
                    'type' => $media->getMimeType(),
                    'size' => $media->getSize(),
                    'description' => $request->input("$key.0.description") ?? $media->getClientOriginalName(),
                    'order' => $request->input("$key.0.order") ?? 0,
                    'is_main' => $request->input("$key.0.is_main") ?? 0,
                ];
            } else {
                $media = $request->file($key);
                $files[] = [
                    'name' =>  $key,
                    'path' => Storage::disk('public')->putFile(strtolower(class_basename($model)) . "/" . now()->format("Y_m_d"), $media),
                    'type' => $media->getMimeType(),
                    'size' => $media->getSize(),
                    'description' => $request->input("$key.description") ?? $media->getClientOriginalName(),
                    'order' => $request->input("$key.order") ?? 0,
                    'is_main' => $request->input("$key.is_main") ?? 0,
                ];
            }
        }
        if ($request->isMethod('put') || $request->isMethod('patch')) {
            if($key){
                $model->media()->where('name', $key)->delete();
            }
            else{
                $model->media()->whereNotIn('name', ['attachment', 'attachments'])->delete();
            }
        }
        else{
            //get old media
            $oldMedia = $model->media()->whereNotIn('name', ['attachment', 'attachments'])->get();
        }
        //create media
        $model->media()->createMany($files);
        return count($files) > 0;
//        $model->media()->createMany($files);
//        return count($files) > 0;
    });
}
