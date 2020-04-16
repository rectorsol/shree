<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="asset/js/jquery.3.1.1.js"></script>
    <script src="dist/jexcel.js"></script>
    <script src="dist/jsuites.js"></script>
    <link rel="stylesheet" href="dist/jsuites.css" type="text/css" />
    <link rel="stylesheet" href="dist/jexcel.css" type="text/css" />
    <link rel="stylesheet" href="src/css/jexcel.datatables.css" type="text/css" />
  </head>
  <body>
    <div id="spreadsheet"></div><div id="log"></div>
    <script type="text/javascript">
      // var  data = [
      //   ['1','Jazz', 'Honda', '2019-02-12'],
      //   ['2','Civic', 'Honda', '2018-07-11'],
      // ];
      // console.log(data);
      
       $(document).ready(function() {
        var response = '';
        
        $.ajax({
            type: "GET",
            url: "list.php",
           
            success: function(text) {
            data= jexcel(document.getElementById('spreadsheet'), {
        data:text,
        search:true,
        pagination:10,
        columns: [
          { type: 'text', title:'id' },
            { type: 'text', title:'Car', width:120 },
            { type: 'dropdown', title:'Make', width:200, source:[ "Alfa Romeo", "Audi", "Bmw" ] },
            { type: 'calendar', title:'Available', width:200 },
          
           
         ], onchange: changed,
            oninsertrow:insertrow,
      });

              
            }
        });
          var changed = function(instance, cell, x, y, value) {
            var cellName = jexcel.getColumnNameFromId([x,y]);
            var cell1 = data.getValueFromCoords(0,y);
              
  
                var dat=[];
                if(x==1){
                    dat={
                      car: value,
                      id : cell1,
                    }
                           $.ajax({
              url: "update.php",
              type: "POST",
              data:dat,
              success: function(dataResult){
              console.log('success');
              }
            });
                }  
                if(x==2){
                    dat={
                      make: value,id : cell1,
                    }
                           $.ajax({
              url: "update.php",
              type: "POST",
              data:dat,
              success: function(dataResult){
              console.log('success');
              }
            });
                } 
                if(x==3){
                    dat={
                      avail: value,id : cell1,
                    }
                           $.ajax({
              url: "update.php",
              type: "POST",
              data:dat,
              success: function(dataResult){
              console.log('success');
              }
            });
                }   
        }

        var insertrow  = function(instance,x,y) {
         
         
          $.ajax({
              url: "insert.php",
              type: "POST",
              success: function(id){
               var cellName = jexcel.getColumnNameFromId([0,x+1]);
        
                    data.setValue(cellName,id);
                    var cell1 = data.getValueFromCoords(0,x+1); 
              }
            });
            
          }   
        });
            
        
  
       
    </script>
  </body>
</html>
