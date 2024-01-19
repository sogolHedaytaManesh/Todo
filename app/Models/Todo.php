<?php

namespace App\Models;

use App\Enums\TodoStatusEnum;
use App\Models\Traits\Relations\TodoRelationsTrait;
use App\Models\Traits\Scopes\TodoScopesTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
	use TodoRelationsTrait,
		TodoScopesTrait,
		HasFactory,
		SoftDeletes;

	protected $fillable = [
		'user_id',
		'status',
		'title',
		'description',
		'completed_at',
	];

	protected $casts = [
		'status' => TodoStatusEnum::class,
	];
}
