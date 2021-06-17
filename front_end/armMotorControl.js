const motors = Array.from(document.getElementsByClassName("motor"));
const output = Array.from(document.getElementsByClassName("motor-value"));
const motorsName = Array.from(document.getElementsByClassName("motor-num"));
const container = document.getElementById("container");

//function to clean the text
document.getElementById("reset").addEventListener("click", () => {

    output.forEach(o => {
        o.innerHTML = "90";
    });

    motors.forEach(motor => {
        motor.value = 90;
    });
});
        
//Add number next to the range silders
motors.forEach(motor => {
    motor.addEventListener("input", i => {
                
        const selectedMotor = i.target;
        const selectedNum = selectedMotor.dataset["motornum"];
        output[parseInt(selectedNum) -1].innerHTML = selectedMotor.value;
    })
})
        

//change language
document.getElementById("arabic").addEventListener("click", arLanguage);
document.getElementById("english").addEventListener("click", enLanguage);

//for arabic language
function arLanguage(){
    container.dir ="rtl";

    document.getElementById("title").innerHTML = "المتحكم بالذراع";

    motorsName.forEach( mn => {
        mn.innerHTML = "محرك " + mn.dataset["motornum"];
    });
    document.getElementById("save").innerHTML = "حفظ";
    document.getElementById("run").innerHTML = "تشغيل";
    document.getElementById("reset").innerHTML = "إعادة تعيين";

    //change reset button positoin
    document.getElementById("reset").style.left = null;
    document.getElementById("reset").style.right = "50%";

    //hide the (Engilsh) on the top of the page
    document.getElementById("arabic").classList.remove("hidden");
    document.getElementById("english").classList.add('hidden');
}

//for english language
function enLanguage(){
    container.dir ="ltr";
    
    document.getElementById("title").innerHTML = "Arm Controller";

    motorsName.forEach( mn => {
        mn.innerHTML = "motor " + mn.dataset["motornum"];
    });
    document.getElementById("save").innerHTML = "Save";
    document.getElementById("run").innerHTML = "Run";
    document.getElementById("reset").innerHTML = "Reset";

    //change reset button positoin
    document.getElementById("reset").style.left = "50%";
    document.getElementById("reset").style.right = null;

    //hide the() on the top of the page
    document.getElementById("english").classList.remove("hidden");
    document.getElementById("arabic").classList.add('hidden');
}