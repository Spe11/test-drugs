<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * Лекарство
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Drug newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Drug newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Drug query()
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Substance[] $substances
 * @property-read int|null $substances_count
 */
	class Drug extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DrugSubstance
 *
 * @property int $drug_id
 * @property int $substance_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DrugSubstance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugSubstance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugSubstance query()
 * @mixin \Eloquent
 */
	class DrugSubstance extends \Eloquent {}
}

namespace App\Models{
/**
 * Вещество
 *
 * @property int $id
 * @property string $name
 * @property bool $visible
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Substance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Substance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Substance query()
 * @method static \Illuminate\Database\Eloquent\Builder|Substance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Substance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Substance whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Substance whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Substance whereVisible($value)
 * @mixin \Eloquent
 */
	class Substance extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

