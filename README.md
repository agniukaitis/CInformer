CInformer
=========
 
A class written for Anax-MVC, which was originally written by Mikael Roos 
 
Built by Julius Semenas
 
License 
------------------
 
This software is free and carries a MIT license.
 

Usage 
------------------
The module is written primarily for Anax-MVC. TO include the module into your project use:

<code>$di->set('informer', '\Olive\CInformer\CInformer');</code>

The module is compatible with any other PHP framework as well.


Use <code>setMessage()</code> for setting the message. Use <code>getMessage()</code> to tretrieve the message at required place. Use <code>clear()</code> to clean the flash memeory variable. For style of the messages, put the css or .less file into the dedicate direcotry, or include your own style.


 
Copyright (c) 2014 Julius Semenas
