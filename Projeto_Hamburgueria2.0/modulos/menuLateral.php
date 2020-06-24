<script>
    $( document ).ready( function(){
        // Function para o Click do Menu Mobile
        $( '#menuLateralIcon' ).click( function(){
            $( '#menuLateral' ).fadeToggle( 1000 );
        } );

        $( '.menuItemMobile' ).click( function(){
            $( '#menuLateral' ).fadeToggle();
        } );
    } );
</script>