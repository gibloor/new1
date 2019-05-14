@echo off
echo Starting PHP FastCGI...
set path=c:\usr\php-5.6.9;%PATH%
C:\site\php\php-cgi.exe -b 127.0.0.1:9123 -c C:\site\php\php.ini
