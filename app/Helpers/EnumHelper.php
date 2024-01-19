<?php

namespace App\Helpers;

trait EnumHelper
{
	public static function asSelectArray(): array
	{
		$values = [];

		foreach (self::cases() as $value) {
			$values[$value->name] = $value->value;
		}

		return $values;
	}

	public static function asJson(): string
	{
		return json_encode(self::asSelectArray(), JSON_THROW_ON_ERROR);
	}

	public static function tryFromName(string $name): ?string
	{
		try {
			return self::fromName($name);
		} catch (\ValueError $error) {
			return null;
		}
	}

	public static function fromName(string $name): string
	{
		foreach (self::cases() as $status) {
			if ($name === $status->name) {
				return $status->value;
			}
		}
		throw new \ValueError("$name is not a valid backing value for enum " . self::class);
	}

	public static function getLoweCaseNames(): array
	{
		return array_map('strtolower', array_column(self::cases(), 'name'));
	}

}
