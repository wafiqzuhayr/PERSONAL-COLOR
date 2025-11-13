<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PersonalColorResult extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'personal_color_results';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'photo_path',
        'skin_tone',
        'undertones',
        'color_type',
        'accept_marketing'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'undertones' => 'array',
        'accept_marketing' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Get the photo URL
     *
     * @return string|null
     */
    public function getPhotoUrlAttribute()
    {
        if ($this->photo_path) {
            return Storage::url($this->photo_path);
        }
        return null;
    }

    /**
     * Get formatted undertones
     *
     * @return array
     */
    public function getFormattedUndertonesAttribute()
    {
        $undertones = $this->undertones;
        return [
            'step_1' => $undertones[1] ?? null,
            'step_2' => $undertones[2] ?? null,
            'step_3' => $undertones[3] ?? null,
        ];
    }

    /**
     * Scope untuk filter by email
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $email
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByEmail($query, $email)
    {
        return $query->where('email', $email);
    }

    /**
     * Scope untuk filter by color type
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $colorType
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByColorType($query, $colorType)
    {
        return $query->where('color_type', $colorType);
    }

    /**
     * Scope untuk users yang accept marketing
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAcceptedMarketing($query)
    {
        return $query->where('accept_marketing', true);
    }
}