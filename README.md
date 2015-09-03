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

Just a note about using Gmail. You will have to go to https://www.google.com/settings/security/lesssecureapps and allow access from less secure apps.
Also Google will only let you grab all your emails once. To circumvent this you can use recent:email@gmail.com (which will only grab emails from the past 30 days) or use a service that allows insecure access (like juno.com).
