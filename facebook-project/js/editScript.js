$(document).ready(function () {

    $("form").submit(function(e){
        e.preventDefault();
    });

    $("#submitEditName").click(function(){
        var name = $("#editName").val();
        editName(name);
    });
 
});

async function editNameAPI(name){
    const response = await fetch("http://localhost/facebook-project/php/editName.php?name="+name);
    
    if(!response.ok){
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    
    const response_json = await response.json();
    return response_json;
}

function editName(name){
    editNameAPI(name).then(response_json => {
        if(response_json.success == 1){
            $("#submitEditName").text("Edited");
            $("#submitEditName").attr('class', 'btn btn-secondary mb-3');;
            $("#submitEditName").prop('disabled', true);
        }else{
            alert("failed to edit name");
        }
    })
}

