/* Cheating, huh :) Purchase template if you need full version */
var css_engine = true,
        main_color_ = "#8F8F8F",
        postslider = jQuery(".ef-post-carousel"),
        postslider_options = {
            transition: "fade",
            transition_speed: 800,
            slide_interval: 4000,
            autoplay: false
        },
gallery = jQuery("#ef-gallery"),
        gallery_options = {
            transition_speed: 800,
            startAt: 1,
            prevText: "Previous",
            nextText: "Next",
            navigation: true,
            ajaxPages: {
                pages: 3,
                pageName: "gallery-page-"
            }
        },
portfolio_group = "portfolio-group",
        flickr = jQuery(".jflickr"),
        amount = 4,
        flickrId = "36587311@N08",
        insta = jQuery(".instagram"),
        ihash = "nature",
        icount = 4,
        iclientId = "2a5f90e37bc042a98f5f8a1fb2ca56d4",
        iuserId = "your-user-id",
        iaccessToken = "your-access-token",
        googmap = jQuery("#ef-map"),
        zoomLevel = 19,
        map_markers = [{
                latitude: 37.449063,
                longitude: -122.158358,
                id: "1",
                icon: "assets/map_marker1.png"
            }, {
                latitude: 52.515699,
                longitude: 13.397802,
                id: "2",
                icon: "assets/map_marker2.png"
            }];