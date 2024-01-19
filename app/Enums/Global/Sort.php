<?php

namespace App\Enums\Global;

use App\Helpers\EnumHelper;

enum Sort: string
{
	use EnumHelper;

	case ASCENDING = 'asc';
	case DESCENDING = 'desc';

	public function text(): string
	{
		return match ($this) {
			self::ASCENDING => 'ascending',
			self::DESCENDING => 'descending',
		};
	}
}
