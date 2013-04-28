<?php


/**
 * Baskonfiguration f�r WordPress.
 *
 * Denna fil inneh�ller f�ljande konfigurationer: Inst�llningar f�r MySQL,
 * Tabellprefix, S�kerhetsnycklar, WordPress-spr�k, och ABSPATH.
 * Mer information p� {@link http://codex.wordpress.org/Editing_wp-config.php 
 * Editing wp-config.php}. MySQL-uppgifter f�r du fr�n ditt webbhotell.
 *
 * Denna fil anv�nds av wp-config.php-genereringsskript under installationen.
 * Du beh�ver inte anv�nda webbplatsen, du kan kopiera denna fil direkt till
 * "wp-config.php" och fylla i v�rdena.
 *
 * @package WordPress
 */

// ** MySQL-inst�llningar - MySQL-uppgifter f�r du fr�n ditt webbhotell ** //
/** Namnet p� databasen du vill anv�nda f�r WordPress */
define('DB_NAME', 'heroku_07fc25a20773df2');

/** MySQL-databasens anv�ndarnamn */
define('DB_USER', 'b35676cd06952d');

/** MySQL-databasens l�senord */
define('DB_PASSWORD', '97581e56');

/** MySQL-server */
define('DB_HOST', 'us-cdbr-east-03.cleardb.com');

/** Teckenkodning f�r tabellerna i databasen. */
define('DB_CHARSET', 'utf8');

/** Kollationeringstyp f�r databasen. �ndra inte om du �r os�ker. */
define('DB_COLLATE', '');

/**#@+
 * Unika autentiseringsnycklar och salter.
 *
 * �ndra dessa till unika fraser!
 * Du kan generera nycklar med {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Du kan n�r som helst �ndra dessa nycklar f�r att g�ra aktiva cookies obrukbara, vilket tvingar alla anv�ndare att logga in p� nytt.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'JcWEt>le=bC^FP([~-TX+|Gy,9wX]&bi^gfliSkT?50JitC?/i0S]-))96p4EX)g');
define('SECURE_AUTH_KEY',  '82*FSy3w:@3BR]tAO;=6+S[q1(:`_=yts[:%/pN_DWU]va9r|u`-F~o/3pI7$s0U');
define('LOGGED_IN_KEY',    'K-4@nRD9&r]c@Ym@Rz0Jh!):5BCC<Wo:4~<cH]|m5[b1g;7#Vu2#gm?mP+W*!ge?');
define('NONCE_KEY',        'Lv^TxMT&=-SqcxEa2dZm&@?^)RHs`;EkJSat+~}p1?*1d;Si|:?-_6VmW)@_ZFN|');
define('AUTH_SALT',        'Wpg/-#,9EDnWd!s3X_*.)FsgeH40{ZlI0?Sw6Q4yLaW-%>s:>uYXB}61cBREc~GZ');
define('SECURE_AUTH_SALT', ',BSL8Bnn1@rnhetE|i |A2gSJuY-wv)c~H&+,af9d|.bq~L}/k{5aa eqb iFY{)');
define('LOGGED_IN_SALT',   '+%4J]B:^B>AxYxVpI,zY1(oZixPVypM{Lip axZPr-;n0f[-#I}~2i18B&j0=]? ');
define('NONCE_SALT',       'WZu(@e2W;?%<vmbX$|1ng!:/ *3[k,VK}qqVX-`bmei--6Lx2aVy4aOF%UH129(h');

/**#@-*/

/**
 * Tabellprefix f�r WordPress Databasen.
 *
 * Du kan ha flera installationer i samma databas om du ger varje installation ett unikt
 * prefix. Endast siffror, bokst�ver och understreck!
 */
$table_prefix  = 'wp_';

/**
 * WordPress-spr�k, f�rinst�llt f�r svenska.
 *
 * Du kan �ndra detta f�r att �ndra spr�k f�r WordPress.  En motsvarande .mo-fil
 * f�r det valda spr�ket m�ste finnas i wp-content/languages. Exempel, l�gg till
 * sv_SE.mo i wp-content/languages och ange WPLANG till 'sv_SE' f�r att f� sidan
 * p� svenska.
 */
define('WPLANG', 'sv_SE');

/** 
 * F�r utvecklare: WordPress fels�kningsl�ge. 
 * 
 * �ndra detta till true f�r att aktivera meddelanden under utveckling. 
 * Det �r rekommderat att man som till�ggsskapare och temaskapare anv�nder WP_DEBUG 
 * i sin utvecklingsmilj�. 
 */ 
define('WP_DEBUG', false);

/* Det var allt, sluta redigera h�r! Blogga p�. */

/** Absoluta s�kv�g till WordPress-katalogen. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Anger WordPress-v�rden och inkluderade filer. */
require_once(ABSPATH . 'wp-settings.php');