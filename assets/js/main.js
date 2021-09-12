jQuery(document).ready(function ($) {

    //Product Tab
    //Get prioject data from post type - Project
    $('.resp-tab-item').on('click', function () {
        //e.preventDefault();
        get_response('get_top_products', $(this).data('slug'))
        //$('#nmTabClass').addClass('tab-1 resp-tab-content')
    });

    //Get Ajax response
    function get_response(action, values) {
        $.ajax({
            url: ajax_obj.ajax_url,
            method: 'POST',
            data: {
                action: action,
                value: values,
                nonce: ajax_obj.nmnonce
            },

            success: function (res) {
                $("#nmProductsHome").html(res.data);
                console.log(res)
            }
        });
    }

    //Form Validation
    // var validator = $( "#nmApplyForm" ).validate();
    // validator.form();

    $("#nmApplyForm").validate({
        rules: {
            usc_name: "required",
            usc_email: {
                required: true,
                email: true
            },
            usc_phone: "required",
            usc_country: "required",
            usc_zip: "required"
        },

        // messages: {
        //     usc_name: "Please enter your name",
        //     usc_phone: "Please enter your phone number",
        //     usc_name: "Please enter your name",
        //     usc_name: "Please enter your name",
        //     nmMail: "Please enter a valid email address"
        // }
    })

    //Dropdown
    $(".dropdown").hover(
        function () {
            $('.dropdown-menu', this).stop(true, true).slideDown("fast");
            $(this).toggleClass('open');
        },
        function () {
            $('.dropdown-menu', this).stop(true, true).slideUp("fast");
            $(this).toggleClass('open');
        }
    );

    // Product Tab
    $('#horizontalTab').easyResponsiveTabs({
        type: 'default', //Types: default, vertical, accordion           
        width: 'auto', //auto or any width like 600px
        fit: true // 100% fit in a container
    });

    //WMUslider
    $('.example1').wmuSlider();

    //Minicart
    // w3ls1.render();

    // w3ls1.cart.on('w3sb1_checkout', function (evt) {
    //     var items, len, i;

    //     if (this.subtotal() > 0) {
    //         items = this.items();

    //         for (i = 0, len = items.length; i < len; i++) {
    //             items[i].set('shipping', 0);
    //             items[i].set('shipping2', 0);
    //         }
    //     }
    // });

});

//Flexisel
$(window).load(function () {
    $("#flexiselDemo1").flexisel({
        visibleItems: 4,
        animationSpeed: 1000,
        autoPlay: false,
        autoPlaySpeed: 3000,
        pauseOnHover: true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: {
            portrait: {
                changePoint: 480,
                visibleItems: 1
            },
            landscape: {
                changePoint: 640,
                visibleItems: 2
            },
            tablet: {
                changePoint: 768,
                visibleItems: 3
            }
        }
    });

});