function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

// $(function () {
//     $(window).on('scroll', function () {
//         if ( $(window).scrollTop() > 10 ) {
//             $('.nav-item ').addClass('active');
//         } else {
//             $('.nav-item ').removeClass('active');
//         }
//     });
// });

    // owl's carousel
    // $('.owl-carousel').owlCarousel({
    //     loop: true,
    //     margin: 0,
    //     nav: true,
    //     responsive: {
    //         0: {
    //             items: 0
    //         },
    //         320: {
    //             items: 1
    //         },
    //         600: {
    //             items: 1
    //         },
    //         1000: {
    //             items: 4
    //         },
    //         1200: {
    //             items: 5
    //         }
    //     }
    // });

// line clamp
var module = document.querySelector(".blog_short_detail h3");

$clamp(module, {clamp: 2});
