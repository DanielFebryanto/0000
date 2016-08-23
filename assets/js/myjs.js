/*$(document).ready(function(){
  //modal js
  $('.modal-trigger').leanModal({
        dismissible: true, // Modal can be dismissed by clicking outside of the modal
        opacity: .5, // Opacity of modal background
        in_duration: 300, // Transition in duration
        out_duration: 200, // Transition out duration
        starting_top: '4%', // Starting top style attribute
        ending_top: '10%', // Ending top style attribute
        //ready: function() { alert('Ready'); }, // Callback for Modal open
        //complete: function() { alert('Closed'); } // Callback for Modal close
      }
    );

    //carrousel banner
    ('.carousel.carousel-slider').carousel({full_width: true});

    //mobile menu
      $(".button-collapse").sideNav();

      //select or ddl
        $('select').material_select();
});*/



$(function(){
  $('.modal-trigger').leanModal({
        dismissible: true, // Modal can be dismissed by clicking outside of the modal
        opacity: .5, // Opacity of modal background
        in_duration: 300, // Transition in duration
        out_duration: 200, // Transition out duration
        starting_top: '4%', // Starting top style attribute
        ending_top: '10%', // Ending top style attribute
        //ready: function() { alert('Ready'); }, // Callback for Modal open
        //complete: function() { alert('Closed'); } // Callback for Modal close
      }
    );
});

$(function(){
  $('select').material_select();
});
