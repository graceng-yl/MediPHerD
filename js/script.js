jQuery(document).ready(function(){

	//hide first row operator 
	jQuery("#advs_operator_1").hide();
	jQuery("#advs_removequery_1").hide();

	//click on add
	jQuery(document).on("click", ".advs_addquery", function(){
		var prevId = jQuery(".advs_row").last().attr('id'); //prev row id
		var prevNum = prevId.split('_')[2];
		var currNum = parseInt(prevId.split('_')[2])+1;

		jQuery("#"+prevId).clone().appendTo(".advs").attr('id', 'advs_row_'+currNum); //clone row

		jQuery("select[name='advs_operator[]']").last().attr('id', 'advs_operator_'+currNum).show(); //chg operator name and show
		// jQuery("select[name='advs_matching_criterion_"+prevNum+"']").last().attr('name', 'advs_matching_criterion_'+currNum); //chg matching criterion name
		// jQuery("select[name='advs_field_"+prevNum+"']").last().attr('name', 'advs_field_'+currNum); //change field name
		// jQuery("input[name='advs_query_"+prevNum+"']").last().attr('name', 'advs_query_'+currNum); //change query name
		jQuery(".advs_addquery").last().attr('id', 'advs_addquery_'+currNum).show(); //change add id and show
		jQuery(".advs_removequery").last().attr('id', 'advs_removequery_'+currNum).show(); //change remove id and show

		jQuery("#advs_addquery_"+prevNum).hide(); //hide previous row add
		jQuery("#advs_removequery_"+prevNum).hide(); //hide previous row remove
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