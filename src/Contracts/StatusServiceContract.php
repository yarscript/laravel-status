<?php

namespace Yarscript\Status\Contracts;

interface StatusServiceContract
{
    public function changeStatus(StatusRelatedContract $related, string $status): StatusRelatedContract;
}