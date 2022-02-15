<?php

namespace App\Traits;

use DateTime;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property int id
 * @property DateTime created_at
 * @property DateTime updated_at
 * @method static Builder where(string $field, string $operator, mixed $value)
 * @method static Builder inRandomOrder()
 * @method static Builder find(int $id)
 * @method static self first()
 * @method static Builder latest()
 * @method static int count()
 * @method static self create(array $data)
 */
trait ApiResource {
    public static function randomId(): int {
        return self::inRandomOrder()->first()->id;
    }

}
