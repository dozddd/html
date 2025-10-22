let btn=document.querySelector(".my_btn");

btn.addEventListener("click",btn_click);

function btn_click(){
    
    document.querySelector("body").classList.toggle("body_style");
    document.querySelector(".feature").classList.toggle("featere_new");
}