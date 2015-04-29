$(document).ready(function() {
    $('#check_all').click(function(event) {  //on click
    	var checkboxes = $(this).closest('form').find('.check-box-select');
        if(this.checked) { // check select status
            checkboxes.each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            checkboxes.each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});