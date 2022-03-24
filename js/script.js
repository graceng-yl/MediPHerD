jQuery(document).ready(function(){

	// ADVANCED SEARCH
	if(window.location.href.indexOf("advsearch.php") > -1){
		// if(localStorage.getItem('advs_state') !== null){
		// 	// jQuery('.advs').remove();
		// 	document.getElementById('advs_form').innerHTML = localStorage.getItem('advs_state');
		// }
		//hide first row operator 
		jQuery("#advs_operator_1").hide();
		jQuery("#advs_removequery_1").hide();

		//click on add
		jQuery(document).on("click", ".advs_addquery", function(){
			add_searchrow();
		});

		//click on remove
		jQuery(document).on("click", ".advs_removequery", function(){
			remove_searchrow();
		});

		//click on clear
		jQuery(document).on("click", "#advs_clear", function(){
			remove_searchrow();
		});

		//click on any search history
		jQuery(document).on("click", ".search_history", function(){
			var queries = jQuery(this).html().split(";");
			for(var i=0; i<queries.length; i++){
				
			}
			var queryNum = Math.floor(queries.length / 3);
			var rowNum = jQuery(".advs_row").length;
			console.log(queries);

			//create corresponding number of rows to the clicked history
			for (var i=0; i<rowNum-1; i++){ //remove all rows except first one
				remove_searchrow();
			}
			for (var i=0; i<queryNum-1; i++){ //add rows until the number of queries searched for the clicked history
				add_searchrow();
			}
			
			//insert values into the input fields
			var row = 1;
			for(var i=0; i<queries.length; i=i+4){
				//console.log(i-1, queries[i-1], i, queries[i], i+1, queries[i+1], i+2, queries[i+2]);
				if(i>0){
					jQuery("#advs_row_"+(row)+" select[name='advs_operator[]']").val(queries[i-1].toLowerCase());
				}
				jQuery("#advs_row_"+(row)+" input[name='advs_query[]']").val(queries[i]);
				jQuery("#advs_row_"+(row)+" select[name='advs_field[]']").val(queries[i+1]);
				jQuery("#advs_row_"+(row)+" select[name='advs_matching_criterion[]']").val(queries[i+2]);
				row++;
			}
			jQuery(window).scrollTop(jQuery('.page_title').offset().top); //scroll to top
		});

		
	}

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


function add_searchrow(){
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
}
function remove_searchrow(){
	var currId = jQuery(".advs_row").last().attr('id'); //curr row id
	var prevNum = parseInt(currId.split('_')[2])-1;

	jQuery("#"+currId).remove(); //remove last row
	if(prevNum!=1){
		jQuery("#advs_addquery_"+prevNum).show(); //show previous row add
		jQuery("#advs_removequery_"+prevNum).show(); //show previous row remove
	}else{
		jQuery("#advs_addquery_"+prevNum).show();
	}
}