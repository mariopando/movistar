$(document).ready(function(){
    if(localStorage.getItem('images')){
        var images = JSON.parse(localStorage.getItem('images'));
        for(i = 0; i < images.src.length; i++){
            $('#gallery_localstorage').append('<div id="image-'+i+'" class="masonry-thumb"><a title="Sample Image 1" href="javascript:void(0)"><img class="grayscale" src="'+images.src[i]+'"></a></div>')
        }
    }
});