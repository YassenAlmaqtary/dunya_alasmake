<script>
    function clickFn( data,route) {
       let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
       
       let fetch_status;
   fetch(route, {
       method: "POST",
       // Set the headers
       headers: {
           'Accept': 'application/json,text-plain, */*',
           'Content-Type': 'application/json',
           'X-CSRF-TOKEN': token
       },
       // Set the post data
       body: JSON.stringify(data)
   })
   .then(function (response) {
       // Save the response status in a variable to use later.
       fetch_status = response.status;
       // Handle success
       // eg. Convert the response to JSON and return
       return response.json();
   }) 
   .then(function (json) {
       // Check if the response were success
       if (fetch_status == 200) {
           console.log(json);
         // window.location.href = 'http://127.0.0.1:8000/Admins/categorys/category';
       }
   })
   .catch(function (error){
       // Catch errors
       console.log(error);
   });
   //   document.getElementById('statusForm').submit();
   //   event.currentTarget.closest('form').submit()
   // let xmlhttp = new XMLHttpRequest();
   // xmlhttp.open("POST",'{{route('productStatus')}}', true);
   // xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   // xmlhttp.setRequestHeader("X-CSRF-TOKEN",token );
   //   xmlhttp.send(`data=${data}`);  
   //  xmlhttp.onreadystatechange = function() {
   //    if (this.readyState == 4 && this.status == 200) {
   //       console.log((this.responseText));
   //    }  
   //  }
          
   //   $.ajax({    
   //     type: "GET", 
   //     dataType: "json", 
   //     url: '/status/update', 
   //     data: {'status': status, 'product_id': product_id}, 
   //     success: function(data){ 
   //     console.log(data.success) 
   //  } 
   // });
   }
    
   </script>