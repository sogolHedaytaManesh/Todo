<?php

namespace App\Models;

use App\Models\Traits\Attributes\UserAttributesTrait;
use App\Models\Traits\Methods\UserMethodsTrait;
use App\Models\Traits\Relations\UserRelationsTrait;
use App\Models\Traits\Scopes\UserScopesTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
	use HasApiTokens,
		HasFactory,
		Notifiable,
		SoftDeletes,
		UserRelationsTrait,
		UserAttributesTrait,
		UserScopesTrait,
		UserMethodsTrait;

	protected $fillable = [
		'first_name',
		'last_name',
		'email',
		'password',
		'email_verified_at',
	];

	protected $hidden = [
		'password',
		'remember_token',
	];

	protected $casts = [
		'email_verified_at' => 'datetime',
		'date_of_birth'     => 'date',
	];

	protected $appends = ['full_name'];
}
