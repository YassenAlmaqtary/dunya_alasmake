
  // Echo.channel('subscripetMessage')
  //   .listen('SubscriptBoradcust', (e) => {
  //       addMessageSubscript(e.subscript)
  //       document.getElementById('count_subscript').innerHTML=e.subscript.count
        
  //   });


//   window.Echo.channel('subscripetMessage')
//   .notification((notification) => {
//     console.log(notification);
//   });

Pusher.logToConsole = true;

var pusher = new Pusher('0e7d60b79cbd24c51cc0', {
  cluster: 'ap1'
});

var channel = pusher.subscribe('dunaalasmac-development');
    channel.bind('MyEvent', function(e) {
      console.log("kkk");
      addMessageSubscript(e.subscript)
       document.getElementById('count_subscript').innerHTML=e.subscript.count    
    });




function  addMessageSubscript(subscript){
    let message_drob=document.getElementById('message_drob');
    let dropdown_divider=document.createElement('div');
    dropdown_divider.setAttribute('class','dropdown-divider');
    let drop_item=document.getElementById('dropdown_item');
    if(drop_item==null){
      drop_item=document.createElement('a');
      drop_item.classList.add('dropdown-menu','dropdown-menu-lg','dropdown-menu-right');
      drop_item.setAttribute('id','dropdown_item');
      drop_item.setAttribute('href','#');
    }
    let media=document.createElement('div');
     media.setAttribute('class','media');
    let media_body=document.createElement('div');
    media_body.setAttribute('class','media-body');
    let title=document.createElement('h3');
    title.setAttribute('class','dropdown-item-title');
    let message=document.createElement('p');
    message.setAttribute('class','text-sm');
    let text_muted=document.createElement('p');
    text_muted.classList.add('text-sm','text-muted');
    let time=document.createElement('i');
    time.classList.add('far','fa-clock','mr-1');

    //
    time.textContent=subscript.time;
    title.textContent=subscript.name;
    message.textContent=subscript.message;
    text_muted.appendChild(time);
    media_body.appendChild(title);
    media_body.appendChild(message);
    media_body.appendChild(text_muted);
    media.appendChild(media_body);
    drop_item.appendChild(media);
     message_drob.prepend(dropdown_divider,drop_item);
  
     
    notify(subscript.name,{body:subscript.message,icon:subscript.icon},subscript.route);
   

}



function notify(title,option,route) {
  if (!("Notification" in window)) {
    // Check if the browser supports notifications
    alert("لايدعم المتصفح خدمة الاشعارات");
  } else if (Notification.permission === "granted") {
    // Check whether notification permissions have already been granted;
    // if so, create a notification
    const notification = new Notification(title,option).addEventListener('click',evnt=>{
     // window.open("http://127.0.0.1:8000/products/product",'_blank');
     location.href=route;
    
    });
    
  } else if (Notification.permission !== "denied") {
    // We need to ask the user for permission
    Notification.requestPermission().then((permission) => {
      // If the user accepts, let's create a notification
      if (permission === "granted") {
        const notification = new Notification(title,option).addEventListener('click',_=>{
          //window.open("http://127.0.0.1:8000/products/product",'_blank');
          location.href=route;
        });
      }
    });
  }
}


