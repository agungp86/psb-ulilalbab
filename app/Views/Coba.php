<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        <select id="provinsi">
        </select>
    </form>

    
    <script>
      fetch('<?php echo base_url('Prov')?>')
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.json();
  })
  .then(data => {
    console.log(data);
    // Do something with the data here, like populate a select element
  })
  .catch(error => {
    console.error('Error fetching data:', error);
  });

    </script>
    
</body>
</html>