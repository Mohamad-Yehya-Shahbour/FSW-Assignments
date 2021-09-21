$(document).ready(function () {

    $("form").submit(function(e){
        e.preventDefault();
    });

    getUserName();
    getFriends();
      
      
   
});

async function getFriendsAPI(){
    const response = await fetch("http://localhost/facebook-project/php/getFriends.php");
    
    if(!response.ok){
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    
    const friends = await response.json();
    return friends;
}

function getFriends(){
    getFriendsAPI().then(friends => {
        //console.log(friends);
        for(var i = 0; i < friends.length; i++){
            var col = 
                        `
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                <div class="company_profile_info">
                                    <div class="company-up-info">
                                        <img src="images/resources/pf-icon1.png" alt="">
                                        <h3>${friends[i].Name}</h3>
                                        <ul class ="actionsBtn">
                                            <li><button id="unfriend${friends[i].FriendId}" onclick="unfriending(${friends[i].FriendId})" title="" class="btn btn-outline-warning ">Unfriend</button></li>
                                            <li><button id="blockFriend${friends[i].FriendId}" onclick="blockingFriend(${friends[i].FriendId})" title="" class="btn btn-outline-danger ">Block Friend</button></li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                        `;
            $('#getFriends').append(col);
        }
    })
}

function unfriending(id){
    unfriend(id);

}
function blockingFriend(id){
    blockUser(id);
}


async function blockFriendAPI(id){
    const response = await fetch("http://localhost/facebook-project/php/blockFriend.php?id="+id);
    
    if(!response.ok){
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    
    const response_json = await response.json();
    return response_json;
}

function blockUser(id){
    //console.log(id);
    blockFriendAPI(id).then(response_json => {
        if(response_json.success == 1){
            $("#blockFriend"+id).text("blocked");
            $("#blockFriend"+id).attr('class', 'btn btn-outline-secondary');
            $("#blockFriend"+id).prop('disabled', true);
            $("#unfriend"+id).prop('disabled', true);
        }else{
            alert("failed to block friend");
        }
    })
}

async function unfriendAPI(id){
    const response = await fetch("http://localhost/facebook-project/php/unfriend.php?id="+id);
    
    if(!response.ok){
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    
    const response_json = await response.json();
    return response_json;
}

function unfriend(id){

    unfriendAPI(id).then(response_json => {
        if(response_json.success == 1){
            $("#unfriend"+id).text("done");
            $("#unfriend"+id).attr('class', 'btn btn-outline-secondary');
            $("#blockFriend"+id).prop('disabled', true);
            $("#unfriend"+id).prop('disabled', true);
        }else{
            alert("failed to unfriend");
        }
    })
}

async function getUserNameAPI(){
    const response = await fetch("http://localhost/facebook-project/php/getUserName.php");
    
    if(!response.ok){
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    
    const userName = await response.json();
    return userName;
}

function getUserName(){
    getUserNameAPI().then(userName => {
        $("#userName").text(userName.userName);
    })
}