
var ImagesSliderStart = [];
var ImagesSliderBlog = [];

var sliderStartLA = $('.index__part1__slider .lightbox__leftArrow');
var sliderStartRA = $('.index__part1__slider .lightbox__rightArrow');
var sliderStartMainPic = $('.index__part1__slider .lightbox__mainPic');
var i = 0;

var sliderBlogLA = $('.index__part5__slider .lightbox__leftArrow');
var sliderBlogRA = $('.index__part5__slider .lightbox__rightArrow');
var sliderBlogMainPic = $('.index__part5__slider .lightbox__mainPic');
var j = 0;


$(window).on('load', chooseTableImages);
$(window).on('load', initImg);
$(window).on('resize', chooseTableImages);

sliderStartRA.on('click', function(e) {
    i = SliderImageDroite(e, ImagesSliderStart, sliderStartMainPic, 'ressources/img/slider_start/', i);
});
sliderStartLA.on('click', function(e) {
    i = SliderImageGauche(e, ImagesSliderStart, sliderStartMainPic, 'ressources/img/slider_start/', i);
});

sliderBlogRA.on('click', function(e) {
    j = SliderImageDroite(e, ImagesSliderBlog, sliderBlogMainPic, 'ressources/img/slider_blog/', j);
});
sliderBlogLA.on('click', function(e) {
    j = SliderImageGauche(e, ImagesSliderBlog, sliderBlogMainPic, 'ressources/img/slider_blog/', j);
});


function chooseTableImages() {
    var w = $( window ).width();
    if (w > 640) {
        ImagesSliderStart = ['img1.jpg', 'img2.jpg', 'img3.jpg', 'img4.jpg', 'img5.jpg'];
        ImagesSliderBlog = ['tour-blog-backend.jpg', 'tour-blog-frontend.jpg', 'tour-blog-frontend-dialog.jpg'];
    } else if (w > 320) {
        ImagesSliderStart = ['img1-640.jpg', 'img2-640.jpg', 'img3-640.jpg', 'img4-640.jpg', 'img5-640.jpg'];
        ImagesSliderBlog = ['tour-blog-backend-640.jpg', 'tour-blog-frontend-640.jpg', 'tour-blog-frontend-dialog-640.jpg'];
    } else {
        ImagesSliderStart = ['img1-320.jpg', 'img2-320.jpg', 'img3-320.jpg', 'img4-320.jpg', 'img5-320.jpg'];
        ImagesSliderBlog = ['tour-blog-backend-320.jpg', 'tour-blog-frontend-320.jpg', 'tour-blog-frontend-dialog-320.jpg'];
    }
}

function initImg() {
    sliderStartMainPic.attr('src', 'ressources/img/slider_start/' +ImagesSliderStart[0]);
    sliderBlogMainPic.attr('src', 'ressources/img/slider_blog/' +ImagesSliderBlog[0]);
}

function SliderImageDroite(e, tabImages, SlidermainPic, chemin, counter) {
    e.preventDefault();
    if (counter < tabImages.length - 1) {
        counter += 1;
    } else {
        counter = 0;
    }
    SlidermainPic.attr('src', '' + chemin + tabImages[counter]);
    return counter;
}

function SliderImageGauche(e, tabImages, SlidermainPic, chemin, counter) {
    e.preventDefault();
    if (counter > 0) {
        counter -= 1;
    } else {
        counter = tabImages.length - 1;
    }
    SlidermainPic.attr('src', '' + chemin + tabImages[counter]);
    return counter;
}