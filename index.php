<!DOCTYPE html>
<html>
<body>

<h1>The option value attribute 1</h1>

<!--<form>
<label for="cars">Choose a car:</label>

<select id="cars" name="cars">
  <option value="volvo">Volvo XC90</option>
  <option value="saab">Saab 95</option>
  <option value="mercedes">Mercedes SLK</option>
  <option value="audi">Audi TT</option>
</select>

<button onclick="myFunction()">Try it</button>
</form>-->

 <div class="container">
  <h2>Form control: select</h2>
  <form>
    <div class="form-group">
      <label for="sel1">Select list (select one):</label>
      <select class="form-control" id="sel1">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
      </select>
      <br>
    </div>
    <button onclick="myFunction()">Try it</button>
  </form>
</div>
<br><br>
  
<p id="demo"></p>
  <script>
    function myFunction() {
  var x = document.getElementById("sel1").value;
  document.getElementById("demo").innerHTML = x;
}
    
  </script>
</body>
</html>
