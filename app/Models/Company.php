<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Company
 *
 * Represents a company entity.
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property string|null $email
 * @property string|null $website
 * @property int $createdAt
 * @property int $updatedAt
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Employee[] $employees
 */
class Company extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "companies";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'website',
    ];

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'U';

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    /**
     * Get the format used for date columns.
     *
     * @return string
     */
    public function getDateFormat(): string
    {
        return 'U';
    }

    /**
     * Get the employees for this company.
     *
     * @return HasMany
     */
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
