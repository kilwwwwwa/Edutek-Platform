<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pomodoro ⏱</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css" type="text/css">
    <style>
        body {
            margin: 0; 
            padding: 0; 
            height: 100%; 
        }
    </style>
</head>
<body>
    <?php require_once('../forum/mainhead.php'); ?>
    <div class="wrapper">
        <div id="container">
            <div class="section-container">
                <button id="focus" class="btn btn-timer btn-focus">Focus</button>
                <button id="shortbreak" class="btn btn-shortbreak">Short Break</button>
                <button id="longbreak" class="btn btn-longbreak">Long Break</button>
            </div>
            <div class="time-btn-container">
                <span id="time"></span>
                <div class="btn-container">
                    <button id="btn-start" class="show">Start</button>
                    <button id="btn-pause" class="hide">Pause</button>
                    <button id="btn-reset" class="hide">
                        <i class="fa-solid fa-rotate-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>

    <?php require_once('../forum/mainfooter.php'); ?>
</body>
</html>


<style>
body{
  background-color: rgb(230, 255, 255);
  font-family: 'Poppins';
}
.wrapper {
    min-height: 100%; 
    display: flex; 
    justify-content: center; 
    align-items: center; 
    padding-bottom: 70px;

}

#container {
    background-color: #2d6a9b;
    width: min(90%, 500px);
    padding: 4em 2em;
    border-radius: 20px;
    display: inline-block;
    margin-top: 100px;
  
}

footer {
 
    background-color: #80c0e5;
    border-radius: 8px;
    font-family: "Inter";
    padding-bottom: 4px;
    margin-top: auto;
    text-align: center; 

}

  button {
    border: none;
    outline: none;
    cursor: pointer;
  }
  .section-container {
    display: flex;
    gap: 1em;
    justify-content: center;
  }
  #longbreak{
   background-color: #205575;
  }
  #shortbreak{
    background-color: #7d2e71;
  }
  #focus{
    background-color: red;
  }
  .btn {
    padding: 1em 2em;
    border-radius: 0.5em;
    color: #ffffff;
  }
  .btn-focus {
    color: #ffffff;
  }
  .time-btn-container {
    display: flex;
    flex-direction: column;
    margin-top: 2em;
  }
  #time {
    text-align: center;
    color: #ffffff;
    font-size: 5em;
    font-weight: 600;
  }
  .btn-container {
    display: flex;
    justify-content: center;
    gap: 2em;
  }
  #btn-start{
    padding: 1em 2em;
    border-radius: 0.5em;
    cursor: pointer;
    background-color: rgb(60, 212, 60);
    color: white;
  }
  #btn-pause{
  margin-left: 10%;
  padding: 1em 2em;
  border-radius: 0.5em;
  cursor: pointer;
  background-color:red;
  color: white;
  }
  #btn-reset {
    background-color: transparent;
    border: none;
    outline: none;
    color: #ffffff;
    font-size: 2em;
  }
  .hide {
    display: none;
  }
  .show {
    text-align: center;

  }
</style>
