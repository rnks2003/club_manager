function isValid() {
    var inUser = document.getElementById("usr").value;
    var inUser = inUser.toLowerCase();
    let usn = /^[1-4][a-z][a-z][0-9][0-9][a-z][a-z][0-9][0-9][0-9]/;
    if(!usn.test(inUser)){
      alert("Enter valid username");
    }
  }

  function reset() {
    document.getElementById("usr").value = "";
    document.getElementById("pass").value = "";
  }

  function clearErr(){
    document.getElementById("errMsg").value = "";
  }