<?php

namespace App\Enums;

use App\Helpers\EnumHelper;

enum TodoStatusEnum: int
{
	use EnumHelper;

	case COMPLETED = 1;
	case INCOMPLETE = 0;

	public function text(): string
	{
		return match ($this) {
			self::COMPLETED => 'completed',
			self::INCOMPLETE => 'incomplete',
		};
	}
}
