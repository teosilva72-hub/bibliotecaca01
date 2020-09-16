function validateForm() {
    var x = document.forms["myForm"]["categoria"].value;
    if (x == "") {
      alert("Este campo precisa ser validado!");
      return false;
    }
  }