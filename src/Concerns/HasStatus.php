<?php

namespace Lineup\Status\Concerns;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Lineup\Status\Models\Status;
use Spatie\Permission\Exceptions\UnauthorizedException;

/**
 * Trait HasStatus
 */
trait HasStatus
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function statuses(): MorphMany
    {
        /** @var \Eloquent $this */
        return $this->morphMany(Status::class, 'entity');
    }

    /**
     * @param string                                          $status
     * @param \Illuminate\Contracts\Auth\Authenticatable|null $author
     *
     * @return \Lineup\Status\Concerns\HasStatus
     * @throws \Throwable
     */
    public function updateStatus(string $status, ?Authenticatable $author): self
    {
        if (!isset($author)) {
            throw new UnauthorizedException(401);
        }

        \DB::beginTransaction();

        /** @var \Eloquent $this */
        $this->update(['status' => $status]);

        $this->statuses()->create([
            'status'      => $status,
            'author_id'   => $author->getAuthIdentifier(),
            'author_type' => get_class(($author))
        ]);

        \DB::commit();

        return $this;
    }
}