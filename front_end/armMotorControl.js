const motors = Array.from(document.getElementsByClassName("motor"));
const output = Array.from(document.getElementsByClassName("motor-value"));
const motorsName = Array.from(document.getElementsByClassName("motor-num"));
const container = document.getElementById("container");
const run = document.getElementById("run");
const reset = document.getElementById("reset");
const arabic = document.getElementById("arabic");
const english = document.getElementById("english");
const runValue = document.getElementById("run-value");


//function to clean the text
reset.addEventListener("click", () => {

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
arabic.addEventListener("click", arLanguage);
english.addEventListener("click", enLanguage);

//for arabic language
function arLanguage(){
    container.dir ="rtl";

    document.getElementById("title").innerHTML = "المتحكم بالذراع";

    motorsName.forEach( mn => {
        mn.innerHTML = "محرك " + mn.dataset["motornum"];
    });
    document.getElementById("save").innerHTML = "حفظ";
    if(runValue.value == 1){
        run.innerHTML = "تشغيل";
        run.value = 1;
    } else{
        run.innerHTML = "ايقاف";
        run.value = 0;
    }
    reset.innerHTML = "إعادة تعيين";

    //change reset button positoin
    reset.style.left = null;
    reset.style.right = "50%";

    //hide the (Engilsh) on the top of the page
    arabic.classList.remove("hidden");
    english.classList.add('hidden');
}

//for english language
function enLanguage(){
    container.dir ="ltr";
    
    document.getElementById("title").innerHTML = "Arm Controller";

    motorsName.forEach( mn => {
        mn.innerHTML = "motor " + mn.dataset["motornum"];
    });
    document.getElementById("save").innerHTML = "Save";
    if(runValue.value == 1){
        run.innerHTML = "Run";
        run.value = 1;
    } else{
        run.innerHTML = "Off";
        run.value = 0;
    }
    reset.innerHTML = "Reset";

    //change reset button positoin
    reset.style.left = "50%";
    reset.style.right = null;

    //hide the() on the top of the page
    english.classList.remove("hidden");
    arabic.classList.add('hidden');
}

//Check whether the arm has already moved or not
fetch("/PHPinVisualStudioCode/arm-motor-control/arm-motor-control/back_end/runInfo.php").then(
    function(response){
        return response.json();
    }
).then(function (response){
    onOrOff = parseInt(response);
    if(onOrOff == 1){
        runValue.value = 0;
        run.innerHTML = "Off";
    } else{
        runValue.value = 1;
        run.innerHTML = "Run";
    }
})
.catch(err => {
    console.error(err);
});