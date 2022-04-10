function validationID() {
     var str = document.getElementById("nationalId").value;
    var res = str.split('');
    var Array = res;
    var month = Array[3] + Array[4];
    var day = Array[5] + Array[6];
    console.log(res);
    console.log(Array);
     var length = str.length;
        if (length !== 14)
        {
            document.getElementById("idError").innerHTML = "خطأ فى الرقم القومى *";
            document.getElementById("submitB").style.display = "none";
        }

        // Check the left most digit
		if (Array[0] != 2 || Array[0] != 3)
		{
		     document.getElementById("idError").innerHTML = "خطأ فى الرقم القومى *";
             document.getElementById("submit").style.display ="none";
		}
            
		if(month < 01 || month > 12){
             document.getElementById("idError").innerHTML = "خطأ فى الرقم القومى *";
             document.getElementById("submit").style.display ="none";
        }
     if(day < 01 || day > 31){
       
           document.getElementById("idError").innerHTML = "خطأ فى الرقم القومى *";
           document.getElementById("submitB").style.display = "none";
        }
          else{
        document.getElementById("idError").innerHTML = " ";
        document.getElementById("submitB").style.display = "block";
    var res1 = Array[0] * 2;
    var res2 = Array[1] * 7;
    var res3 = Array[2] * 6;
    var res4 = Array[3] * 5;
    var res5 = Array[4] * 4;
    var res6 = Array[5] * 3;
    var res7 = Array[6] * 2;
    var res8 = Array[7] * 7;
    var res9 = Array[8] * 6;
    var res10 = Array[9] * 5;
    var res11 = Array[10] * 4;
    var res12 = Array[11] * 3;
    var res13 = Array[12] * 2;
    var res14 = Array[13];
    var totalres = (res1 + res2 + res3 + res4 + res5 + res6 + res7 + res8 + res9 + res10 + res11 + res12 + res13);
    var x = totalres / 11;
    var out = parseInt(x) * 11;
    var ot = totalres - out;
    var y = 11 - ot;
    if(y == 11){
        y = 1;
    }
    else if(y == 10){
        y = 0;
    } 
              if(res14 !== y){
        document.getElementById("idError").innerHTML = "خطأ فى الرقم القومى *";
         document.getElementById("submitB").style.display = "none";
    }
   else if (res14 == y) {
        document.getElementById("idError").innerHTML = " ";
    if (Array[12] % 2 == 0) {
        document.getElementById("female").checked = true;

    } else {
        document.getElementById("male").checked = true;
    }
    if (Array[0] == 2) {
        var today = new Date();
        var currentYear = today.getFullYear();
        var yearArray = 19 + Array[1] + Array[2];
        var month = Array[3] + Array[4];
        var day = Array[5] + Array[6];
        var birthday = month + '/' + day + '/' + yearArray;
        var age = currentYear - yearArray;
        document.getElementById("age").value = age;
    }

    if (Array[0] == 3) {
       var today = new Date();
        var currentYear = today.getFullYear();
        var yearArray = 20 + Array[1] + Array[2];
        var month = Array[3] + Array[4];
        var day = Array[5] + Array[6];
        var birthday = month + '/' + day + '/' + yearArray;
        var age = currentYear - yearArray;
        document.getElementById("age").value = age;
        
    }
       }
  }
}
function toggleForm() {
    var form = document.getElementById("form-container");
    var showHide = document.getElementById("showHide");

    if (form.style.display == "none") {

        form.style.display = "block";
        showHide.innerHTML = '<i class="fas fa-chevron-up"></i>';
    }
    else {

        form.style.display = "none";
        showHide.innerHTML = '<i class="fas fa-chevron-down"></i>';

    }
}
function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
function CheckArabicCharactersOnly(e) {
               if(document.getElementById("egyptian").checked){
var unicode = e.charCode ? e.charCode : e.keyCode
if (unicode != 8) { //if the key isn't the backspace key (which we should allow)
if (unicode == 32)
return true;
else {
if ((unicode < 0x0600 || unicode > 0x06FF)) //if not  arabic
return false; //disable key press
}
}
}
else if (document.getElementById("foreigner").checked){
                   console.log("ellse");
  var charCode = (e.which) ? e.which : e.keyCode
    if (charCode > 3  && (charCode < 48 || charCode > 57))
        return true;
        return false;
    
               }
           }

