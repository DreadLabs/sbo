Security by obscurity
=====================

For TYPO3.CMS.

Sometimes it's necessary to remove all treasonable footprint which is a sign to
script kiddies or other criminal people in order to give 'em no input what system
you're using.

This extension is for you. Without modifying the core.

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

They're must reside right before the line:

.. code::
   RewriteRule ^(typo3/|t3lib/|tslib/|fileadmin/|typo3conf/|typo3temp/|uploads/|showpic\.php|favicon\.ico) - [L]

Now, go and place a symlink to the typo3/ directory in your root directory:

.. code::
   $ ln -s typo3 admin

Enable the extension in the extension manager, and you're done!