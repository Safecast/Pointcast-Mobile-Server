<?php

namespace Fuel\Tasks;

class Notification
{
	public function send()
	{
            $subscribe = "/topics/all"; 
            $message = "This is From Notification Task.";
            \Model\Firebase\Message::send($subscribe, $message);
	}
}
