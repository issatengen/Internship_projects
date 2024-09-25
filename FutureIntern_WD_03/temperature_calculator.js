let my_form=document.getElementById('my_form');
my_form.addEventListener('submit', calculate);
function calculate(){
    let temperature=document.getElementById('temperature').value;
    let type=document.getElementById('type').value;
    let fahrenheit=0;
    let celsius=0

    if(temperature && type){
        if(type==2){
            celsius=(parseFloat(temperature)-32)*5/9;
            document.getElementById('display').innerHTML="<b>"+temperature+" ℉ = "+celsius+" ℃ </b>";
        }
        if(type==1){
            fahrenheit=parseFloat(temperature)*9/5+32;
            document.getElementById('display').innerHTML="<b>"+temperature+" ℃ = "+fahrenheit+" ℉ </b>";
        }
    }else{
        console.log("No value");
    }
}