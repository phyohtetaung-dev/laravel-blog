<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    use HasFactory;

    protected $guarded = [];

    const STATUS = [
        'active' => 1,
        'inactive' => 0,
    ];

    public function showImage()
    {
        return $this->image ?? 'images/no-image.jpg';
    }

    public function getStatusColor()
    {
        return $this->status === HomeSlider::STATUS['active'] ? 'text-success' : 'text-danger';
    }

    public function getStatus()
    {
        return $this->status === HomeSlider::STATUS['active'] ? 'Active' : 'Inactive';
    }
}
