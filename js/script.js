jQuery(document).ready(function(){

	// ADVANCED SEARCH
	// if(localStorage.getItem('advs_state') !== null){
	// 	// jQuery('.advs').remove();
	// 	document.getElementById('advs_form').innerHTML = localStorage.getItem('advs_state');
	// }
	//hide first row operator 
	jQuery("#advs_operator_1").hide();
	jQuery("#advs_removequery_1").hide();

	//click on add
	jQuery(document).on("click", ".advs_addquery", function(){
		var prevId = jQuery(".advs_row").last().attr('id'); //prev row id
		var prevNum = prevId.split('_')[2];
		var currNum = parseInt(prevId.split('_')[2])+1;

		jQuery("#"+prevId).clone().appendTo("#advs").attr('id', 'advs_row_'+currNum); //clone row

		jQuery("select[name='advs_operator[]']").last().attr('id', 'advs_operator_'+currNum).show(); //chg operator name and show
		jQuery(".advs_addquery").last().attr('id', 'advs_addquery_'+currNum).show(); //change add id and show
		jQuery(".advs_removequery").last().attr('id', 'advs_removequery_'+currNum).show(); //change remove id and show

		jQuery("#advs_addquery_"+prevNum).hide(); //hide previous row add
		jQuery("#advs_removequery_"+prevNum).hide(); //hide previous row remove

		jQuery("input[name='advs_query[]']").last().val(""); //clear the input field content
	});

	//click on remove
	jQuery(document).on("click", ".advs_removequery", function(){
		var currId = jQuery(".advs_row").last().attr('id'); //curr row id
		var prevNum = parseInt(currId.split('_')[2])-1;

		jQuery("#"+currId).remove(); //remove last row
		if(prevNum!=1){
			jQuery("#advs_addquery_"+prevNum).show(); //show previous row add
			jQuery("#advs_removequery_"+prevNum).show(); //show previous row remove
		}else{
			jQuery("#advs_addquery_"+prevNum).show();
		}
	});

});

// window.onbeforeunload = function(){
// 	localStorage.setItem('advs_state', jQuery("#advs_form").html());
// }

/*
					SIMPLE SEARCH
*/
//press 'enter' key to initiate the simple search
$(document).on("keypress", "input", function (e) {
  if (e.which == 13 && $(this).val() != "") {
    if ($(this).val()) {
      // if some words are entered by user, proceed to POST them to searchresult.php
      if (document.getElementById("nav-search").value != "") {
        //navigation bar search
        document.forms.form_navsearch.submit();
      }
      if (document.getElementById("homepage-search").value != "") {
        // homepage search
        document.forms.form_homepagesearch.submit();
      }
    }
  } else if (e.which == 13 && $(this).val() == "") {
    // if no value entered, alert user
    alert("You've entered: nothing");
  }
});
