<?php
// xmlrpc.php honeypot — delay + 402 Payment Required + domain logging

$delay = rand(10, 30);
sleep($delay);

$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$ua = $_SERVER['HTTP_USER_AGENT'] ?? 'no-UA';
$host = $_SERVER['HTTP_HOST'] ?? 'no-host';
$logfile = '/tmp/xmlrpc_honeypot.log';

$entry = sprintf(
    "[%s] Host: %s | IP: %s | UA: %s | Delay: %ds\n",
    date("Y-m-d H:i:s"),
    $host,
    $ip,
    $ua,
    $delay
);

file_put_contents($logfile, $entry, FILE_APPEND);

// Return 402 Payment Required
http_response_code(402);
header("Content-Type: text/plain");
echo "XML-RPC interface is now a premium feature. Please insert $0.01 to continue.\n";
?>
