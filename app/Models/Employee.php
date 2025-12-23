<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Employee
 *
 * Represents an employee entity.
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $firstName
 * @property string $lastName
 * @property int $companyId
 * @property string|null $email
 * @property string|null $phone
 * @property int $createdAt
 * @property int $updatedAt
 *
 * @property-read \App\Models\Company|null $company
 */
class Employee extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "employees";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'companyId',
        'email',
        'phone',
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
     * Get the company that owns this employee.
     *
     * @return BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'companyId');
    }
}
