<?php
/*
** Schema Classes
*/

if( !class_exists( 'Jevelin_Schema' ) ) :
    class Jevelin_Schema {

        /*
        ** blog
        */
		static function blog(){
			echo 'itemscope="itemscope" itemtype="http://schema.org/Article"';
		}



    }
endif;
