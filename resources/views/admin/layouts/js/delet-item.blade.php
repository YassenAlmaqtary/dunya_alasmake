<script>
    function setIDItem(event_id){
     let saveChang= document.getElementById("save-chaing");
     saveChang.value=event_id;
    }
    </script>
<script>

    function deletItem(route,event){
      let saveChang=event.currentTarget;
      let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
      let data={id:`${saveChang.value}`};
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
          //console.log(json);
          window.location.reload();
  
      }
  })
  .catch(function (error){
      // Catch errors
      console.log(error);
  });
  
    }
  
  
  </script>