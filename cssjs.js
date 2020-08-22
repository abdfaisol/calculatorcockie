$(".data").click(function(){
  console.log("show input");
  $(".input-data").show();
  $(".msg").show();
})

$(".input-data").on('keypress',function(e){
  if(e.which == 13){
    $(this).hide();
    $(".data").text($(this).val())
    $(".msg").hide()
  }
})
        // Mode
        $(".ok").click(function(){
          var mode = $(this).attr('operator');
          $(".pilihan-mode").hide();
          $(".mode").show();
          $(".hitung").show();
          $(this).hide();
          $(".mode").text(mode);
          document.getElementById('operasi').setAttribute('value',mode);
        })

        $(".mode").click(function(){
          $(".pilihan-mode").show();
          $(this).hide();
          $(".hitung").hide();
          $(".ok").show();
        })
        // Pilih operator Logic
        $(".flex-select .btn").click(function(){
          var i = $(this).val()
          $(".ok").removeAttr('operator')
          $(".ok").attr('operator',i)
          $(".operator").text(i);
          
        })


        