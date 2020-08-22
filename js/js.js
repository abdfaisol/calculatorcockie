$(".hitung").click(function(){
//   dapatin nilai
  var a = $(".data").val();
//   Cek input jika ada benar maka lanjut
  if(a != null){
//     Cek Operator
    var k = $(".operasi option:selected").val();
//     Convert string ke array integer
    var bil = a.split(",");
    var no = 0;
    for(var i = 0; i < bil.length; i++){
      bil[i] = Number(bil[i]);
      if(Number.isNaN(bil[i])){
        alert("error")
        throw new Error("Kesalahan pada data")
      }
    }
//     Logikaku menyala terang!!!
    var hasil = 0
    switch(k){
      case "Max":
        hasil = math.max(bil)
      break;
      case "Min":
        hasil = math.min(bil)
        break;
      case "Modus":
        hasil = math.mode(bil)
      break;
      case "Mean":
        hasil = math.mean(bil)
      break;
      default:
        alert("Sorry, error bro!")
      throw new Error("Kesalahan pada operator")
    }
    var result = k+"{"+a.split(",")+"} = "+hasil;
    $(".resultp").text(result)
    $(".result").show()
  }
//   Jika ada kesalahan maka tidak dieksekusi
  else{
    alert("Data salah.")
  }
})
