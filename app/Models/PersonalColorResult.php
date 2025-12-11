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
        'hair_color',
        'eye_color',
        'skin_brightness',
        'contrast_level',
        'saturation',
        'color_type',
        'notes',
        'accept_marketing',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'accept_marketing' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Accessor untuk get photo URL
     *
     * @return string|null
     */
    protected function photoUrl()
    {
        return $this->when($this->photo_path, function () {
            return Storage::url($this->photo_path);
        });
    }

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
     * Get formatted color information
     *
     * @return array
     */
    public function getFormattedColorInfoAttribute()
    {
        return [
            'skin_tone' => $this->skin_tone,
            'hair_color' => $this->hair_color,
            'eye_color' => $this->eye_color,
            'skin_brightness' => $this->skin_brightness,
            'contrast_level' => $this->contrast_level,
            'saturation' => $this->saturation,
            'color_type' => $this->color_type,
        ];
    }

    /**
     * Get friendly name untuk skin tone
     *
     * @return string
     */
    public function getSkinToneNameAttribute()
    {
        $names = [
            'warm' => 'Warm (Golden)',
            'cool' => 'Cool (Pink)',
            'neutral' => 'Neutral (Balanced)',
        ];

        return $names[$this->skin_tone] ?? $this->skin_tone;
    }

    /**
     * Get friendly name untuk brightness
     *
     * @return string
     */
    public function getSkinBrightnessNameAttribute()
    {
        $names = [
            'very_fair' => 'Sangat Putih (Very Fair)',
            'fair' => 'Putih (Fair)',
            'medium' => 'Sedang (Medium)',
            'tan' => 'Tan (Cokelat)',
            'deep' => 'Gelap (Deep)',
        ];

        return $names[$this->skin_brightness] ?? $this->skin_brightness;
    }

    /**
     * Get friendly name untuk contrast level
     *
     * @return string
     */
    public function getContrastLevelNameAttribute()
    {
        $names = [
            'high' => 'Tinggi',
            'medium' => 'Sedang',
            'low' => 'Rendah',
        ];

        return $names[$this->contrast_level] ?? $this->contrast_level;
    }

    /**
     * Get friendly name untuk saturation
     *
     * @return string
     */
    public function getSaturationNameAttribute()
    {
        $names = [
            'muted' => 'Muted (Lembut)',
            'medium' => 'Medium (Sedang)',
            'vibrant' => 'Vibrant (Cerah)',
        ];

        return $names[$this->saturation] ?? $this->saturation;
    }

    /**
     * Get friendly name untuk color type
     *
     * @return string
     */
    public function getColorTypeNameAttribute()
    {
        $names = [
            'spring' => 'Spring (Musim Semi)',
            'summer' => 'Summer (Musim Panas)',
            'autumn' => 'Autumn (Musim Gugur)',
            'winter' => 'Winter (Musim Dingin)',
        ];

        return $names[$this->color_type] ?? $this->color_type;
    }

    /**
     * Get icon emoji untuk color type
     *
     * @return string
     */
    public function getColorTypeEmojiAttribute()
    {
        $emojis = [
            'spring' => '🌸',
            'summer' => '☀️',
            'autumn' => '🍂',
            'winter' => '❄️',
        ];

        return $emojis[$this->color_type] ?? '';
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
     * Scope untuk filter by skin tone
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $skinTone
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBySkinTone($query, $skinTone)
    {
        return $query->where('skin_tone', $skinTone);
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

    /**
     * Scope untuk recent results
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  int  $limit
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRecent($query, $limit = 10)
    {
        return $query->orderBy('created_at', 'desc')->limit($limit);
    }

    /**
     * Scope untuk search by name atau email
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $search
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', "%{$search}%")
                     ->orWhere('email', 'like', "%{$search}%");
    }

    /**
     * Boot model
     */
    protected static function boot()
    {
        parent::boot();

        // Delete file saat model dihapus
        static::deleting(function ($model) {
            if ($model->photo_path) {
                Storage::disk('public')->delete($model->photo_path);
            }
        });
    }
}