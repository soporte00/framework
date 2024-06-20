<?php

namespace core;

class _serve extends console
{

    use _paths;

    private $port = 8000;

    public function __construct($params)
    {
        if (isset($params[0])) {

            if (!preg_match('/^[0-9]+$/', $params[0])) {
                $this->message('The port flag must be a number..', 'warning');
                die();
            }

            $this->port = $params[0];
        }
    }

    public function index()
    {
        $this->message('Try with: php console serve:local (This is for localhost)', "warning");
        $this->message('Try with: php console serve:remote (This is for local network)', "warning");
        $this->message('You can especify the port: php console serve:remote 3500', "warning");
    }

    public function local()
    {
        $host = '127.0.0.1';

        $command = sprintf('php -S %s:%d -t %s', $host, $this->port, $this->publicFolder);

        shell_exec($command);
    }

    public function remote()
    {
        $host = '0.0.0.0';

        $command = sprintf('php -S %s:%d -t %s', $host, $this->port, $this->publicFolder);

        shell_exec($command);
    }
}
