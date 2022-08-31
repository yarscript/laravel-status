<?php

namespace Yarscript\Status\Contracts;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Relations\MorphMany;

interface StatusRelatedContract
{
    public function statuses(): MorphMany;

    public function updateStatus(string $status, ?Authenticatable $author);

    public function getStatusKey(): string;
}
