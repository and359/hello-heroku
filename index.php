<!DOCTYPE html>
<html>
<body>

<h1>The option value attribute</h1>

<form>
<label for="cars">Choose a car:</label>

<select id="cars" name="cars">
  <option value="volvo">Volvo XC90</option>
  <option value="saab">Saab 95</option>
  <option value="mercedes">Mercedes SLK</option>
  <option value="audi">Audi TT</option>
</select>
<input type="submit" value="Submit">
</form>

<p>Choose a car, and click the "Submit" button to send input to the server.</p>

  <script>
    document.getElementById("cars").value;
    
  </script>
</body>
</html>
