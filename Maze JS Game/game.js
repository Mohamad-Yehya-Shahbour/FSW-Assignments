var flag=0;  // to store the score

var divs = document.getElementsByClassName("boundary");

function onClickStart(){
    for (var i=0; i<divs.length;i++){
        divs[i].style.backgroundColor="white";
    }
    count = 0;
    document.getElementById("status").innerHTML="result: " +flag;
}

document.getElementById("start").addEventListener("click", onClickStart);



function onHover(){
    if(divs[0].style.backgroundColor == "white"){
        for (var i=0; i<divs.length;i++){
            divs[i].style.backgroundColor="red";
        }
        flag -= 10;
        document.getElementById("status").innerHTML="your score is : " +flag;
    }
}

for (var i=0; i<divs.length;i++){
        divs[i].addEventListener("mouseover", onHover);
    }



function onHoverEndGreen(){
    if(divs[0].style.backgroundColor == "white" && count == 0){
        for (var i=0; i<divs.length;i++){
        divs[i].style.backgroundColor="green";
        }
        flag+=5;
        document.getElementById("status").innerHTML="your score is : " +flag;
    }
    if(count == 1){
        for (var i=0; i<divs.length;i++){
        divs[i].style.backgroundColor="red";
        }
        document.getElementById("status").innerHTML="you are cheating, try again..";
    }
}

document.getElementById("end").addEventListener("mouseover", onHoverEndGreen);

// a bool to check the moves of mouse so the player can't cheat
var count = 0; 

function onHoverGame(){
    count=1;
}

// to check if the mouse go outside the maze after clicking start
document.getElementById("game").addEventListener("mouseleave", onHoverGame); 
 