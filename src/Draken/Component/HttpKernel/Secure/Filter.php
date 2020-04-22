<?php
namespace CodeStx\Draken\Component\HttpKernel\Secure;

class Filter
{
    public static function utf8(string $s_entry)    
    {
        return @iconv("utf-8", "utf-8//IGNORE", $s_entry);
    }

    public static function xss(string $s_entry)
    {
        return htmlspecialchars($s_entry, ENT_QUOTES. 'UTF-8');
    }
}

/**TODO:  Implement code that protects the program against, 
 *		  following type's of attack:
 * @url(https://lukasz-socha.pl/php/niebezpieczny-kod-spis-tresci/)
 *
 *	- [ Brute-Force ]						( BFA )		-> 	[ ]
 *  - [ Cross-Site-Scripting ]				( XSS )		->	[x]
 *	- [ Cross-Site-Request-Forgery ]		( CSRF )	->	[ ]
 *  - [ Code  Injection ]					( COIN )	->	[ ]
 *  - [ Shell Injection ]					( SHIN )	->	[ ]
 *  - [ SQL   Injection ]					( SQIN )	->	[ ]
 *
 */
 
 
 