<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css' rel='stylesheet'>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
      integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <title>Calendar 📅</title>
</head>
<body>
    <?php require_once('../forum/mainhead.php');?>
    <div id="container">

        <div class="task__container">
            <div class="task__name" id="break" style="background-color: #f7f779;">Break</div>
            <div class="task__name" id="gym" style="background-color: #f68080">Gym</div>
            <div class="task__name" id="study" style="background-color: #faae7b">Study</div>
            <div class="task__name" id="tv" style="background-color: #2a9d8f">TV</div>
            <div class="task__name" id="friends" style="background-color: #a8dadc">Going Out</div>
            <div class="task__name" id="work" style="background-color: #bdb2ff">Work</div>
            <div class="task__name" id="deselect">Deselect All</div>
        </div>
        <h2 style="text-align: center;">Add selected task to the schedule</h2>
        <div class="schedule__container">
            <div class="days__container">
                <span class="corner"></span>
                <div class="day">Sunday</div>
                <div class="day">Monday</div>
                <div class="day">Tuesday</div>
                <div class="day">Wednesday</div>
                <div class="day">Thursday</div>
                <div class="day">Friday</div>
                <div class="day">Saturday</div>
            </div>
            <div class="part__day">
                <span class="time">8am <br> - <br> 12pm</span>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
            </div>
            <div class="part__day">
                <span class="time">12pm <br> - <br> 2pm</span>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
            </div>
            <div class="part__day">
                <span class="time">2pm <br> - <br> 6pm</span>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
            </div>
            <div class="part__day">
                <span class="time">6pm <br> - <br> 9pm</span>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
            </div>
            <div class="part__day">
                <span class="time">9pm <br> - <br> 11pm</span>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
            </div>
        </div>
    <div class="resetdiv">
        <button class="deleteBtn">Reset Schedule</button>
        <div class="pop-up__container">
        <div class="pop-up">
        <h4>Are you sure you want to delete all the tasks from your schedule ?</h4>
        <div class="btn__container">
        <div class="btn__answer" id="btn__yes">YES</div>
        <div class="btn__answer" id="btn__no">NO</div>
        </div>
        </div>
        </div>
    </div>
    </div>
        <br>
        <div class="buttons">
            <button id="capture-button">Capture Calendar</button>
            <button id="down-button" class="hide"><a id="download-button" class="hide" style="color:#69acd3;">Download Calendar</a></button>
        </div>

    <script src="html2canvas.js"></script>
    <script src="screenshot.js"></script>
    <script src="main.js"></script>
    <?php require_once('../forum/mainfooter.php');?>
</body>
</html>
<style>

footer{
    background-color: #80c0e5;
    border-radius: 8px;
    font-family: "Inter";
    padding-bottom: 4px;
    margin-top: auto;
    text-align: center; 
}
i{
    text-align: center;
}
*{
    box-sizing: border-box;
    flex: 1;
}
.resetdiv{
    text-align: center;
}
#download-button{
    text-decoration: none;
}
#down-button{
  font-family: "Poppins", sans-serif;
  font-size: 1em;
  border: none;
  background-color: white;
  border: solid 2px #80c0e5;
  color: #69acd3;
  border-radius: 13px;
  cursor: pointer;
  outline: none;
  padding: 10px 25px;
  text-decoration: none;
}
#down-button:hover{
    background-color: blue;
    color:white;
    border: solid 1px blue;
}
body{
    font-family: "Poppins",sans-serif;  
    padding: 0;
    background-color: rgb(230, 255, 255);
}

#container{
    height: 100%;
    width: 100%;
    display: inline-block;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: rgb(230, 255, 255);

}
h1,h3{
    margin-bottom: 20px;
}
.task__container{
    display: flex;
    margin-bottom: 3rem;
    padding: 10px;
}

.task__container .task__name{
    padding: 10px;
    margin: 0 10px;
    border-radius: 5px;
    cursor: pointer;
}

.task__name.selected{
    box-shadow:0px 0px 0px 2px black inset;
}

#deselect{
    background-color: #1d3557;
    color: white;
}

.task__name a{
text-decoration: none;
color: white;
}

#home{
background-color: #49a3d7;
}

.schedule__container{
    background: linear-gradient(#ebf4f5, #b5c6e0);
    display: flex;
    flex-direction: column;
    padding: 1rem;
}

.days__container{
    display: flex;
    background-color: #103783;
}

.corner{
    width: 50px;
    height: 70px;
    margin: 2px;
}

.day{
    width: 100px;
    border: solid 1px white;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 2px;
    border-radius: 8px;
}

.part__day{
    display: flex;
}

.time{
    width: 50px;
    height: 70px;
    color: white;
    background-color: #103783;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 2px;
}

.task{
    background-color: white;
    height: 70px;
    width: 100px;
    margin: 2px;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 2rem;
}

.deleteBtn{
    padding: 10px 25px;
    margin-top: 20px;
    border: none;
    background-color: white;
    border: solid 2px #80c0e5;
    color: #69acd3;
    border-radius: 13px;
    cursor: pointer;
    outline: none;
    
}

.deleteBtn:hover{
    background-color: red;
    color:white;
    border: solid 1px red;
}

.pop-up__container{
    position: absolute;
    top: 0;
    left: 0;
    z-index: 99;
    height: 100%;
    width: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    background-size:cover;
    display: none;
    justify-content: center;
    align-items: center;
}

.pop-up{
    width: 300px;
    height: 130px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    background-color: #00b4d8;
    padding: 15px;
    text-align: center;
    border-radius: 5px;
}

.btn__container{
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.btn__answer{
    margin: 0 20px;
    background-color: white;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
}
#btn__yes:hover{
background-color: red;
color: white;
}
#btn__no:hover{
background-color: rgb(30, 185, 30);
color: white;
}
.hide {
 display: none;
}
.buttons {
    position: relative;
    text-align: center;
    margin-top: 0.5em;
    
}
#capture-button{

  font-family: "Poppins", sans-serif;
  font-size: 1em;
  border: none;
  background-color: white;
  border: solid 2px #80c0e5;
  color: #69acd3;
  border-radius: 13px;
  cursor: pointer;
  outline: none;
  padding: 10px 25px ;
  
}
#capture-button:hover{
    background-color: green;
    color:white;
    border: solid 1px green;
}
</style>