<?php

namespace Lineup\Status\Services;

use Illuminate\Support\Facades\Auth;
use Lineup\Status\Contracts\StatusRelatedContract;
use Lineup\Status\Contracts\StatusServiceContract;

/**
 * Class StatusService
 */
class StatusService implements StatusServiceContract
{
    /**
     * @param \Lineup\Status\Contracts\StatusRelatedContract $related
     * @param string                                         $status
     *
     * @return mixed
     */
    public function changeStatus(StatusRelatedContract $related, string $status): StatusRelatedContract
    {
        if (Auth::guard('api-user')->check()) {
            $author = Auth::guard('api-user')->user();
        } elseif (Auth::guard('api-admin')->check()) {
            $author = Auth::guard('api-admin')->user();
        } else {
            $author = Auth::user();
        }

        return $related->updateStatus($status, $author);
    }
}