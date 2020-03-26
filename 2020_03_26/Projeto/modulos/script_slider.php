<script>
    $( document ).ready( function(){
        // Function para o Click do Menu Mobile
        $( '#iconeMenuMobile' ).click( function(){
            $( '#menuMobile' ).fadeToggle( 1000 );
        } );

        $( '.menuItemMobile' ).click( function(){
            $( '#menuMobile' ).fadeToggle();
        } );
    } );
</script>