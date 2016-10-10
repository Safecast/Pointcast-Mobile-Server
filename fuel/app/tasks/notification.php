<?php

namespace Fuel\Tasks;

class Notification
{
	public function send()
	{
            $subscribe = "/topics/all"; 
            $message = "iaaaaaa";
            \Model\Firebase\Message::send($subscribe, $message);
	}
}
