ext:sob
=======

Security by obscurity for TYPO3.CMS.

What does it do?
----------------

This extension enables you to remount `typo3/`:code, removing the inline comment
"...Powered by TYPO3..." and the `generator`:code meta tag from your frontend output
without modifying the core.

Why?
----

The TYPO3.CMS frontend output is an invitation for wanna be hackers and script
kiddies to apply 0d exploits or other malicious stuff to your TYPO3 instance.

How to
------

First you have to enable the extension in the extension manager!

Alternative Backend entrypoint
******************************

To use an alternative backend entrypoint, simply put these rules into your .htaccess:

.. code::

   # if trying to call HOST/typo3, redirect to frontend dispatcher
   RewriteCond %{REQUEST_URI} ^(\/)?typo3(\/)?$
   # next two lines, @see: http://stackoverflow.com/a/15147347
   RewriteCond %{HTTP_HOST} ^(.*)$
   # if the referrer is not the host
   RewriteCond %{HTTP_REFERER} !^(.*)?%1(.*)$
   # forbidden + last redirect to frontend dispatcher
   RewriteRule ^(.*)$ index.php [F,L]

They must reside right before the line:

.. code::

   RewriteRule ^(typo3/|t3lib/|tslib/|fileadmin/|typo3conf/|typo3temp/|uploads/|showpic\.php|favicon\.ico) - [L]

Now go and place a symlink to the typo3/ directory in your root directory:

.. code::

   $ ln -s typo3 admin

Frontend oscurity
*****************

The hooks for removing the `generator`:code meta tag and the `Powered by...`:code
inline comments are immediatly active.