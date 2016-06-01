
function getQueryVariable(variable)
{
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
}
var er=getQueryVariable("regid");


/*
document.addEventListener('DOMContentLoaded', function () {
      document.querySelector('p').addEventListener('click', main); 
           
});
function main() {
    
    document.getElementById("try").innerHTML= er;
}
*/
document.addEventListener('DOMContentLoaded', function () {
        document.getElementById("try").innerHTML= er;
           
});
