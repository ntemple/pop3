POP3Server
====

Minimilist PHP5 class to read email messages from a POP3 server

Example:
```
include('POP3Server.php');

try {
    $server = new POP3Server('ssl://pop.gmail.com', 995, '<username>', '<password>');
    $messages = $server->processMessages();
} catch (Exception $e) {
    // Problem!
    print_r($e);
    exit(1);
}

// $messages now contains a list of messages from the server, continue processing

```

