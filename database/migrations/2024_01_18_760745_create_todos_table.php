<?php

use App\Enums\TodoStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up(): void
	{
		Schema::create('todos', static function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id')->constrained();
			$table->boolean('status')->default(TodoStatusEnum::INCOMPELETE->value)
				->comment(TodoStatusEnum::asJson());
			$table->string('title');
			$table->text('description');
			$table->timestamp('completed_at')->nullable();
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('todos');
	}
};
