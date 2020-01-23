<?php
/**
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define( 'DB_NAME', 'wordpress' );

/** Tu nombre de usuario de MySQL */
define( 'DB_USER', 'root' );

/** Tu contraseña de MySQL */
define( 'DB_PASSWORD', '7539510.' );

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define( 'DB_HOST', 'localhost' );

/** Codificación de caracteres para la base de datos. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', '4iilM}gPEnxex@@,nr[3&U>r#8N1n`>VMF$Jk*:&^IC31nGW*!Bm$!s{yo8}`dAL' );
define( 'SECURE_AUTH_KEY', 'VdZoQ9eml:n7h+;iC]^*@/bE_65fb=PATS,-#IZ`E J~y?i/DNe4/ZK_)b/u-+$O' );
define( 'LOGGED_IN_KEY', 'sFMv`4W-&]Z/Z}67[:bsC3>OfKmo-mdc<vA(2ZVC1>?dKeJ&OcH?gtaW]q:wrfHT' );
define( 'NONCE_KEY', 'IPZvoGZE}75`l4{:Lxpb`wC!/vz>Xt4-NpK$q]SEX*33=1Cc@D^vI;7{6AndnNCQ' );
define( 'AUTH_SALT', 'o*Bu20:VaL{zrV~)B!30IW=(WHMNcb!iRdQ!B>rEpHG91K)X6%<2<-c[)}d*}.4g' );
define( 'SECURE_AUTH_SALT', '05f W(1qOMhKD0<uW=l74B_EY0@e0z%JTq6{[-]U[*Of@5rCns$MIt}l)G]=7jtG' );
define( 'LOGGED_IN_SALT', '{w*j/fl&E#_iVrKW^ZCI#TPQM{?xlSn NTT[}IM/In&sfO2=N ,TEvGIh^Rt_0Q8' );
define( 'NONCE_SALT', '.vN73MGZdY2fh|jFy5sc%z2OvNm|z{BVL%,%a?zz%jL3IbaCA?kKTZehi2~=-1^w' );

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

