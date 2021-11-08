function initPage(){
    //when the button is pressed
    $("#add_product_btn").click( function(){
        //it will validate the inputs and pass the parameter clicked true
        validate_input(true);
    });
}

//function to validate inputs receives the parameter clicked that is by default to false
function validate_input(clicked=false){
    var contents = [];
    var elements = [];
    var not_empty = [];
    var valid = [];

    var name = product_form.name.value;
    contents.push(name);
    elements.push(product_form.name);

    removeMessages();

    //makes the validation of all the inputs
    valid.push(validate_name(name,product_form.name));

    //this condition is just to allow to verify if there are empty fields, only if the use has filled the last field or clicked the submit button 
    if(contents[contents.length-1] != '' || clicked == true){

        for(var i = 0; i < contents.length; i++){
            not_empty.push(validate_empty(contents[i],elements[i]));
        }
    }

    //if everything is filled and validated it will remove the existing button and add a button inside the <form> to use the post method
    if(valid.reduce(and) && not_empty.reduce(and)){
        $("#add_product_btn").remove();
        $("#form_end").after("<button id='add_product_btn' type=\"submit\" class=\"btn btn-primary\">Add Product</button>");   
    }

}

function and(a,b){
    return a && b;
}

function validate_empty(content, element){
    if(content == ''){
        $(element).css("background", "#ffcccc");
        $(element).after("<p style=\"color:#ff5555\">* Please fill this field before submitting again</p>");
        return false;
    }else{
        return true;
    }
}

function validate_name(content, element){
    if(content == ""){
        
        $(element).css("background","#ebdf5e");
        $(element).after("<p style=\"color:#c2b100\">* The Field is empty</p>");
        return false;
    }
    else{
        return true;
    }
}

function removeMessages(){
    $("#product_form").children().css("background-color","#FFFFFF");
    $("#product_form").children().filter('p').remove();
}

//Page loaded
$(document).ready(initPage);