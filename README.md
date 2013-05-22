pop3
====

Minimilist PHP5 class to read email messages from a POP3 server

// Example
<code>
include('POP3Server.php');

try {
    $server = new POP3Server('ssl://pop.gmail.com', 995, '<username>', '<password>');
    $messages = $server->processMessages();
    // $messages is a list of messages from the server, continue processing
} catch (Exception $e) {
    // Problem!
    print_r($e);
}
</code>

