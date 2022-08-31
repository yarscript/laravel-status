<?php

namespace Yarscript\Status\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Class Status
 * @mixin \Eloquent
 */
class Status extends Model
{
    /**
     * @var string
     */
    protected $table = 'statuses';

    /**
     * @var string
     */
    protected $primaryKey = 'status_id';

    /**
     * @var string[]
     */
    protected $fillable = [
        'status_id', 'entity_id', 'entity_type', 'status', 'author_id', 'author_type', 'created_at', 'updated_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function entity(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function author(): MorphTo
    {
        return $this->morphTo();
    }
}