<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Resources\Api\v1\ErrorResource;
use App\Http\Resources\Api\v1\NotificationResource;
use App\Http\Resources\Api\v1\SuccessResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    public function index()
    {
        // $notifications = auth('api')->user()->notifications()->paginate(config('app.pagination'));
        $notifications = auth('api')->user()->notifications()->get();
        return count($notifications) > 0
            ? NotificationResource::collection($notifications)
            : ErrorResource::make(__('messages.no_notifications') , 200);
    }

    public function show($id): ErrorResource|NotificationResource
    {
        $notification = auth('api')->user()->notifications()->find($id);
        return $notification
            ? NotificationResource::make($notification)
            : ErrorResource::make(__('messages.notification_not_found'));
    }

    public function update($id): SuccessResource|ErrorResource
    {
        try {
            $notification = auth('api')->user()->notifications()->find($id);
            if ($notification) {
                $notification->markAsRead();
                return SuccessResource::make(__('messages.notification_marked_as_read'));
            }
            return ErrorResource::make(__('messages.notification_not_found'));
        } catch (\Exception $e) {
            Log::channel('tourguide')->error("Error in NotificationController@update: {$e->getMessage()} at Line: {$e->getLine()} in File: {$e->getFile()}");
            return ErrorResource::make(__('messages.something_went_wrong'));
        }
    }

    public function destroy($id): SuccessResource|ErrorResource
    {
        try {
            $notification = auth('api')->user()->notifications()->find($id);
            if ($notification) {
                $notification->delete();
                return SuccessResource::make(__('messages.notification_deleted'));
            }
            return ErrorResource::make(__('messages.notification_not_found'));
        } catch (\Exception $e) {
            Log::channel('tourguide')->error("Error in NotificationController@destroy: {$e->getMessage()} at Line: {$e->getLine()} in File: {$e->getFile()}");
            return ErrorResource::make(__('messages.something_went_wrong'));
        }
    }

    public function markAllAsRead(): SuccessResource|ErrorResource
    {
        try {
            if (auth('api')->user()->unreadNotifications->count() > 0) {
                auth('api')->user()->unreadNotifications->markAsRead();
                return SuccessResource::make(__('messages.all_notifications_marked_as_read'));
            }
            return ErrorResource::make(__('messages.no_unread_notifications'));
        } catch (\Exception $e) {
            Log::channel('tourguide')->error("Error in NotificationController@markAllAsRead: {$e->getMessage()} at Line: {$e->getLine()} in File: {$e->getFile()}");
            return ErrorResource::make(__('messages.something_went_wrong'));
        }
    }
}
