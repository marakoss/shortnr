# Shortnr
Dead Simple URL Shortener

# Benefits:
- Zero dependency
- Uses file system to store "redirects" (key => values pairs)
- Just deploy on some fancy domain and be happy
- Most HTTP servers will do (Apache, Nginx are preconfigured to serve files)

# Limits:
- Be aware of the limits of file system storage. Performance decreases after you hit more than ~1000 files in one folder.
- *If you do, feel free to upgrade the script to support partitioning, and post a PR.*

# Instalation
- create a folder named "u" in web root of project (where index.php is also located)

# Security
- Remember to properly set open_basedir restriction.
- Passed POST URL is not sanitized, but its checked with PHP's FILTER_VALIDATE_URL.


# Restricting access with .htaccess
- You can use Apache's .htaccess to allow only specific IP adresses from creating new "shorts". Create `.htaccess` in web root of your project containing something like this. Remember to change *IPADDRESS* to your allowed IP Address.
```
<FilesMatch "\.(php)$">
AddDefaultCharset UTF-8
Order Deny,Allow
Deny from all
Allow from *IPADDRESS*
</FilesMatch>
```
