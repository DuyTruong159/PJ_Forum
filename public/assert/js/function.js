function scrollTopFunction() {
    if (document.documentElement.scrollTop > 200 || document.body.scrollTop > 200) {
        document.getElementById('to-top').style.display = "block";
    } else {
        document.getElementById('to-top').style.display = "none";
    }
}

function topFunction() {
    document.documentElement.scrollTop = 0;
    document.body.scrollTop = 0;
}

function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

$(document).ready(function() {
    $('.selected').css('background-color' , 'black')
    $('.selected').css('color' , 'white')

    var a = document.querySelectorAll('.src_cmt')
    var b = document.querySelectorAll('.content_cmt')
    var c = document.querySelectorAll('.btn_cancel')
    for( let i = 0 ; i < a.length ; i++){
        $(a[i]).click(function(){
            if ( $(b[i]).is( ":hidden" )) {
                $(b[i]).slideDown('slow')
                if(c.length > 0){
                    for( let j = 0 ; j < c.length ; j++){
                        $(c[i]).click(function(){
                            $(c[i]).closest('.content_cmt').hide()
                        })
                    }
                }
            } else {
                $(b[i]).slideUp()
            }
        });
    }
});

$(document).ready(function() {
    var a = document.querySelectorAll('.header_inner')
    var b = document.querySelectorAll('.tag_field .body_')
    console.log(b.length)
    for( let i = 0 ; i < a.length ; i++){
        $(a[i]).click(function(){
            if ( $(b[i]).is( ":hidden" )) {
                $(b[i]).slideDown('slow')
            } else {
                $(b[i]).slideUp('slow')
            }

        });
    }
});
