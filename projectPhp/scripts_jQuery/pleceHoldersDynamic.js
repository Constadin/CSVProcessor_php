'use strict';

$(document).ready(function(){
    
    $('#filter_field-search').change(function(){
        const selectionOption = $(this).val();
        $('#search_value').attr('placeholder', 'Enter value of ' + selectionOption);
    });
    
});

