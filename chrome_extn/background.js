// The GCM_SENDERID is a magic number you get from your application API console.
// For this workshop, feel free to use these values to access our existing server.
var GCM_SENDERID = '988505596173';
var GCM_SENDER = GCM_SENDERID + '@gcm.googleapis.com';

// We don't expect errors, but let's be good citizens and register error handlers

var errorLogger = function() {
  console.error.apply(console, arguments);
};
chrome.gcm.onSendError.addListener(errorLogger);

chrome.gcm.onMessagesDeleted.addListener(errorLogger);


// This event handles incoming messages

chrome.gcm.onMessage.addListener(function(msg) {
  // Who says comments don't get read?
  console.info('got GCM message', msg);

  // Incoming GCM data: we'll add callback here later [1].

});


// First things first, register with the GCM server at application start.

chrome.gcm.register([GCM_SENDERID], function(regid) {
  if (chrome.runtime.lastError || regid === -1) {
    console.error(chrome.runtime.lastError);
    
    return;
  }
  
  console.info('registration id :, reg',regid);
  
  //chrome.app.window.create("pushhome.html?regid="+regid);
 window.open("pushhome.html?regid="+regid);
 
 $.ajax({
            type: "GET", //or GET
            url: "http://localhost/push/test.php",
            data: {score:"tr"},
            crossDomain:true,
            cache:false,
            async:true,
            success: function(msg){
                //do some thing
                
           }
           
         });
         
         
  // Connected OK: we'll add callback here later [2].

});