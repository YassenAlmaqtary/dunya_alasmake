<script>
    let img=document.getElementById('outImage');
    document.getElementById('exampleInputFile').onchange =  (evt)=> {
      var tgt = evt.target || window.event.srcElement,
          files = tgt.files;
      // FileReader support
      if (FileReader && files && files.length) {
          var fr = new FileReader();
          fr.onload = (event)=> {
              img.src = event.target.result;
          }
          fr.readAsDataURL(files[0]);
      }
      
   }
   </script>