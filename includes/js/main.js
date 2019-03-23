

var imageArray = ["includes/images/product/background/girl1.jpg",
                    "includes/images/product/background/girl2.jpg",
                    "includes/images/product/background/girl3.jpg"];

var imageIndex = 0;

function slideShow() {

	images.setAttribute("src",imageArray[imageIndex]);
	imageIndex++;

	if (imageIndex >= imageArray.length) {
		imageIndex = 0;
	}
	
}

var intervalHandler = setInterval(slideShow,5000);


$(function(){

	$('#slide-submenu').on('click',function() {			        
        $(this).closest('.list-group').fadeOut('slide',function(){
        	$('.mini-submenu').fadeIn();	
        });
        
      });

	$('.mini-submenu').on('click',function(){		
        $(this).next('.list-group').toggle('slide');
        $('.mini-submenu').hide();
	})
})
