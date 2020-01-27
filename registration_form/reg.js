var otherInfo = document.getElementById('otherInfo');
var otherInfoBlock = document.getElementById('otherInfoBlock');
otherInfoBlock.hidden = true;
function checkOtherBlock(){
    if(otherInfo.checked){
        otherInfoBlock.hidden = false;
    }else{
        otherInfoBlock.hidden = true;
    }
}

