'use strict';

const loadImages = () => {
    const arrayImagens = [];

    for (let i = 1; i <= ( 2 ); i++){
        arrayImagens.push(`../imagens/imagem_slider_${i}.jpg`);
    }

    return arrayImagens;
}

const insertImages = ( images ) => {
    const htmlImg = images.map( img => `<img class="imagensSlider" src="${img}">` ).join( " " );

    const $conteinerSlider = document.getElementById( 'conteinerSlider' );
    const $conteinerImages = document.createElement( 'div' );
    const $next = document.getElementById( 'nextSlide' );
    // const $previous = document.getElementById( 'previousSlide' );

    $conteinerImages.id = 'conteinerImages';
    $conteinerImages.innerHTML = htmlImg;
    console.log($conteinerSlider);
    $conteinerSlider.insertBefore( $conteinerImages, $next );
}

const next = () => {
    const $img = document.querySelectorAll( '.imagensSlider' );
    const max = ( $img.length - 1 ) * ( 50 );
    let marginLeft = + ($img[0].style.marginLeft.replace( "vw", "" ));

    $img[0].style.marginLeft = ( marginLeft - 50 ) + "vw";
}

const prev = () => {
    const $img = document.querySelectorAll( '.imagensSlider' );
    const min = ( $img.length - ( $img.length - 1 ) ) * ( 50 );
    let marginLeft = + ($img[0].style.marginLeft.replace( "vw", "" ));

    if( marginLeft >= min  ){
        marginLeft = ( $img.length - 1 ) * ( 50 );
    }
    $img[0].style.marginLeft = ( marginLeft + 50 ) + "vw";
}

insertImages( loadImages() );

document.getElementById( 'nextSlide' ).addEventListener( 'click', next );
document.getElementById( 'previousSlide' ).addEventListener( 'click', prev );