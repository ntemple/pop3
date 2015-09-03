<?php

	/*
	 * Process messages from a gmail inbox.
	 * Note: you need to add your full gmail address as your username, and your gmail password.
	 * POP3 access must also be enabled in your account.
	 * See: http://www.ghacks.net/2009/06/19/gmail-pop3-configuration/
	 */

	include('POP3Server.php');
	define('POP_USERNAME', 'username@gmail.com');
	define('POP_PASSWORD', 'password');

	/**
	 * Class MyPOP3Server
	 *
	 * Optional: Extend the class in order to override the logging capability
	 *
	 */
	class MyPOP3Server extends POP3Server {
		function writeLog($msg) {
			print "$msg\n";
		}

	}

	/**
	 * Class MyMessage
	 *
	 * Optional: Process the mail message from the server after the connection is closed.
	 */

	class MyMessage extends POP3Message {

		function process() {
			print "== Message==\n{$this->message}\n==\n";
		}
	}

	// Minimilistic Example
	try {
		$server = new POP3Server('ssl://pop.gmail.com', 995, POP_USERNAME, POP_PASSWORD);

		/*
		 * The next line:
		 * - connects to the server
		 * - downloads all the messages, creating a new Message object, MyMessage for each
		 * - closes the connection, which deletes the messages if the 2nd param is true
		 * - runs the process() function on each message, if it exists.
		 */

		$messages = $server->processMessages('MyMessage', false, false);
		print_r($messages);
	} catch (Exception $e) {
		// Problem!
		print_r($e);
	}

	// Headers example
	try {
		$server = new POP3Server('ssl://pop.gmail.com', 995, POP_USERNAME, POP_PASSWORD);
		$messages = $server->processMessages('POP3Message',false,true);
		
		// Print results nicely
		foreach ($messages as $message) {
			echo("Message ID: ".$message->id."<BR/>");	// Display message ID
			foreach ($message->message as $item) {		// Display portions of message seperated by lines
				echo($item."<BR/>");	
			}
			echo("<BR/>");
		}

	} catch (Exception $e) {
		print_r($e->getMessage());
	}

?>
