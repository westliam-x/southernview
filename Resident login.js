const pass_field = document.getElementsByClassName(".pass-key");
const showBtn = document.getElementsByClassName(".show");
showBtn.addEventListener("click", function(){
    if(pass_field.type === "password"){
        pass_field.type="text";
        showBtn.textContent = "HIDE";
        showBtn.style.color= "#3498db"
    }else{
        pass_field.type = "password";
        showBtn.textContent = "SHOW";
        showBtn.style.color = "#222";
    }
})







