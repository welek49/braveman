<?php

    get_header();

    // Change ref number to id of the "Single post header" reusable block that you've created
    // echo do_blocks('<!-- wp:block {"ref":0000} /-->');

    the_content();
    
    // Change ref number to id of the "Single post footer" reusable block that you've created
    // echo do_blocks('<!-- wp:block {"ref":0000} /-->');

    get_footer();

?>