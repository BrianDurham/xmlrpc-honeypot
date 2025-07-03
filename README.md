# xmlrpc-honeypot

A lightweight, PHP-based honeypot for catching and logging automated bot activity targeting `xmlrpc.php` on WordPress sites. Designed to simulate a vulnerable endpoint while wasting attacker resources and providing actionable logs.

## Description

This project provides a fake `xmlrpc.php` endpoint that mimics the behavior of a real WordPress XML-RPC interface. It introduces a randomized delay, returns HTTP error codes such as 402 or 451, and logs details about each request including IP address, user agent, and target domain. Ideal for defensive web admins looking to track and mitigate bot activity without exposing real XML-RPC functionality.

## Features

- Minimal PHP, no dependencies
- Randomized delay to waste bot time
- Logs IP, user agent, host, and request time
- Supports integration with iptables or fail2ban
- Easy to deploy across multiple domains

## Getting Started

1. Copy `xmlrpc.php` into your site’s document root (replacing or overriding any real XML-RPC handler)
2. Ensure the web server user can write to the log location (default: `/tmp/xmlrpc_honeypot.log`)
3. Watch logs using:
   ```bash
   tail -f /tmp/xmlrpc_honeypot.log
   ```

## Example Log Entry

```
[2025-07-03 12:38:21] Host: example.com | IP: 170.106.153.210 | UA: Mozilla/5.0 (...) | Delay: 17s
```

## Customization

You may adjust:
- Delay range
- Returned HTTP status code
- Logging format or destination
- Optional integration with firewall rules

## License

MIT License – free to use, modify, and redistribute with attribution.

## Author

Maintained by [Your Name or Handle]. Contributions and feedback are welcome.
