/* Password toggle function */
function myFunction() {
    /* Get element and put it in variable */
    var x = document.getElementById("myInput");
    /* Test if x(inputfield) is of type password or text 
        The function is called in the html, when the box is checked/unchecked*/
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
}