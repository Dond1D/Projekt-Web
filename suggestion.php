

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <style>
      body {font-family: Arial, Helvetica, sans-serif;
      background-color: #023047;
      margin-top: 4rem;
    }
      * {box-sizing: border-box;}
      h3{
      
        color: white;
        text-align: center;
      }
      
      input[type=text], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
      }
      
      input[type=submit] {
        background-color: #1e6091;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      
      input[type=submit]:hover {
        background-color: #45a049;
      }
      
      .container {
        margin-top: 2rem;
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
      }
      
      </style>
</head>
<body>
  <h3>Suggestion Form</h3>

  <div class="container">
    <form action="upload.php" method = "POST" onsubmit="return suggestionForm()" enctype="multipart/form-data">
      <label for="fname">First Name</label>
      <input type="text" id="fname" name="name" placeholder="Your name..">
  
      <label for="lname">Last Name</label>
      <input type="text" id="lname" name="lastname" placeholder="Your last name..">
  
      <label for="country">Country</label>
      <select id="country" name="country" >
        <option value="australia">Australia</option>
        <option value="canada">Canada</option>
        <option value="usa">USA</option>
        <option value="Europe">Europe</option>
        <option value="Azia">Azia</option>
      </select>
      <input type="file" name="image"><br><br>
  
      <label for="subject">Subject</label>
      <textarea id="subject" name="subject" placeholder="Write any suggestion for new movies.." style="height:200px"></textarea>
  
      <input type="submit" value="Submit" name="submit">
    </form>
  </div>
<script src="skripta.js"></script>
</body>
</html>
