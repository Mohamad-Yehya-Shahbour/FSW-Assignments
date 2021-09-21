$(document).ready(function () {

    $("form").submit(function(e){
        e.preventDefault();
    });
 
    $("#searchUsersSubmit").click(function(){
        var searchInput = $("#searchUsers").val();
        getUsers(searchInput);
        //$(".connectBtn").click();
        
      });

    getUserName();
    getPendingtUsers();
    getNotifications();
    

});

async function getUsersAPI(name){
    const response = await fetch("http://localhost/facebook-project/php/getUsers.php?name="+name);
    
    if(!response.ok){
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    
    const users = await response.json();
    return users;
}

function getUsers(name){
    getUsersAPI(name).then(users => {
        for(var i = 0; i < users.length; i++){
            var col = 
                        `
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                <div class="company_profile_info">
                                    <div class="company-up-info">
                                        <img src="images/resources/pf-icon1.png" alt="">
                                        <h3>${users[i].Name}</h3>
                                        <ul class ="actionsBtn">
                                            <li><button id="pending${users[i].Id}" onclick="pending(${users[i].Id})" title="" class="btn btn-outline-success connectBtn">Connect</button></li>
                                            <li><button id="blockUser${users[i].Id}" onclick="blockingUser(${users[i].Id})" title="" class="btn btn-outline-danger blockBtn">Block</button></li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                        `;
            $('#getUsers').append(col);
        }
    })
}

function pending(id){
    pendingUser(id);
}

function blockingUser(id){
    blockUser(id);
}

async function pendingUserAPI(id){
    const response = await fetch("http://localhost/facebook-project/php/pendingUser.php?id="+id);
    
    if(!response.ok){
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    
    const response_json = await response.json();
    return response_json;
}

function pendingUser(id){
    pendingUserAPI(id).then(response_json => {
        if(response_json.success == 1){
            $("#pending"+id).text("pending");
            $("#pending"+id).attr('class', 'btn btn-outline-secondary pendingBtn');
            $("#pending"+id).prop('disabled', true);
        }else{
            alert("failed to send request");
        }
    })
}

async function getPendingsAPI(){
    const response = await fetch("http://localhost/facebook-project/php/getPendings.php"); 
    
    if(!response.ok){
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    
    const pendings = await response.json();
    return pendings;
}

function getPendingtUsers(){
    getPendingsAPI().then(pendings => {
        for(var i = 0; i < pendings.length; i++){
            var row = 
                        `
                            <div class="notfication-details">
                                <div class="noty-user-img">
                                    <img src="images/resources/ny-img1.png" alt="">
                                </div>
                                <div class="notification-info">
                                    <h3><a href="#" title="">${pendings[i].Name}</a> is pending</h3>
                                    <button id="accept${pendings[i].User_Id}" onclick="acceptPending(${pendings[i].User_Id})" class="btn btn-success acceptPending">accept</button>
                                    <button id="decline${pendings[i].User_Id}" onclick="declinePending(${pendings[i].User_Id})" class="btn btn-danger declinePending">decline</button>
                                </div>
                            </div>
                        `;
            $('#pendings').append(row);
        }
        
    })
}

async function acceptPendingAPI(friendId){
    const response = await fetch("http://localhost/facebook-project/php/acceptPending.php?id="+friendId); 
    
    if(!response.ok){
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    
    const response_json = await response.json();
    return response_json;
}

function acceptPending(friendId){
    acceptPendingAPI(friendId).then(response_json => {
        if(response_json.success == 1){
            $("#accept"+friendId).closest(".notfication-details").hide();
        }else{
            alert("failed to accept user");
        }
    })
}

async function declinePendingAPI(friendId){
    const response = await fetch("http://localhost/facebook-project/php/declinePending.php?id="+friendId); 
    
    if(!response.ok){
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    
    const response_json = await response.json();
    return response_json;
}

function declinePending(friendId){
    declinePendingAPI(friendId).then(response_json => {
        if(response_json.success == 1){
            $("#decline"+friendId).closest(".notfication-details").hide();
        }else{
            alert("failed to decline user");
        }
    })
}

async function getNotificationsAPI(){
    const response = await fetch("http://localhost/facebook-project/php/getNotifications.php"); 
    
    if(!response.ok){
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    
    const notifications = await response.json();
    return notifications;
}

function getNotifications(){
    getNotificationsAPI().then(notifications => {
        //console.log(notifications);
        for(var i = 0; i < notifications.length; i++){
            var row = 
                        `
                        <div class="notfication-details">
                            <div class="noty-user-img">
                                <img src="images/resources/ny-img3.png" alt="">
                            </div>
                            <div class="notification-info">
                                <h3><a href="messages.html" title="">${notifications[i].Name}</a></h3>
                                <p>${notifications[i].Message} your request</p>
                            </div>
                        </div>
                        `;
           $('#notifications').append(row);
        }
        
    })
}

async function blockUserAPI(id){
    const response = await fetch("http://localhost/facebook-project/php/blockUser.php?id="+id);
    
    if(!response.ok){
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    
    const response_json = await response.json();
    return response_json;
}

function blockUser(id){
    //console.log(id);
    blockUserAPI(id).then(response_json => {
        if(response_json.success == 1){
            $("#blockUser"+id).text("blocked");
            $("#blockUser"+id).attr('class', 'btn btn-outline-secondary pendingBtn');
            $("#blockUser"+id).prop('disabled', true);
            $("#pending"+id).prop('disabled', true);
        }else{
            alert("failed to block user");
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




