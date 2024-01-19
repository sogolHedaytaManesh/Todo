<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DispatchNotification implements ShouldBroadcast
{
	use Dispatchable, InteractsWithSockets, SerializesModels;

	/**
	 * @var
	 */
	private $data;

	/**
	 * @param $data
	 */
	public function __construct($data)
	{
		$this->data = $data;
	}

	/**
	 * @return Channel|Channel[]|mixed|string|string[]
	 */
	public function broadcastOn(): mixed
	{
		return $this->data['target'];
	}

	/**
	 * The event's broadcast name.
	 *
	 * @return string
	 */
	public function broadcastAs(): string
	{
		return $this->data['broadcastAs'];
	}

	/**
	 * Get the data to broadcast.
	 *
	 * @return array
	 */
	public function broadcastWith(): array
	{
		return $this->data['message'];
	}
}
