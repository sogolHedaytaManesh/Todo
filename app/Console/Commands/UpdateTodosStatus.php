<?php

namespace App\Console\Commands;

use App\Enums\TodoStatusEnum;
use App\Models\Todo;
use App\Services\NotificationService\Repository\NotificationServiceContract;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;
class UpdateTodosStatus extends Command
{
	/**
	 * @var string
	 */
	protected $signature = 'todo:set-complete-status';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'This command set completed status for todos ';

	public function __construct(public readonly NotificationServiceContract $notificationService)
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle(): void
	{
		$this->info('Start updating status.');
		Todo::incomplete()
			->date(now()->subDays(2)->format('Y-m-d H:i:s'))
			->with('user')
			->chunk(10, function (Collection $todos) {
				$todos->each->update(['status' => TodoStatusEnum::COMPLETED->value]);
				foreach ($todos as $todo) {
					$this->notificationService::sendNotification(
						"user.{$todo->user->id}.todo",
						[
							'message' => __('todo.completed'),
							'object'  => $todo
						],
						'todo.status-updated'
					);
				}
			});

		$this->info('All todos where completed successfully.');
	}
}
