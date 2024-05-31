<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>To Do List ✔</title>

</head>
<body>
<?php require_once('../forum/mainhead.php');?>
<div class="container">
<div class="todo-app">
<h2>To-Do-List  <img src="images/icon.png"></h2>
<div class="row">
<input type="text" id="input-box" placeholder="Add your text">
<button class="todo-btn" accesskey="s" onclick="addTask()">Add</button>
</div>
<ul id="list-container">
</ul>
</div>
</div>

<script src="script.js"></script>
<?php require_once('../forum/mainfooter.php');?>
<style>

.hero{
padding-bottom: 100px;
border-radius: 13px;
font-family: "Inter";
}
.big-title{
position: relative;
padding-top: 29px;
padding-left: 19%;
font-family: "Poppins";
}
.hero-img img{
width: 1000px;
position: relative;
margin-top: -300px;
margin-left: 18%;
}
.hero-text{
color:rgb(0, 0, 0)
}
.sub-text{
position: relative;
padding-top: 11%;
padding-right: 50%;
font-family: "Poppins";
text-align: center;
}
.sub-text2{
position: relative;
font-family: "Inter";
color: midnightblue;
padding-left: 13%;
padding-top: 10px;
}
footer {
    background-color: #80c0e5;
    border-radius: 8px;
    font-family: "Inter";
    padding-bottom: 4px;
    margin-top: auto;
    text-align: center;
}

.final-title{
position: relative;
margin-left: 15px;
padding-top: 8px;
font-size:larger;
color:white;
font-weight: bolder;
padding-bottom: 3px;
}
.flag{
position: relative;
padding-left: 6px;
margin-top: 5px;
}
footer h3{
padding-left: 15px;
margin-top: -3px;
font-size: large;
color: aliceblue;
}
.his{
position: relative;
padding-left: 90%;
margin-top: -50px;
}
footer h4{
padding-left: 15px;
margin-top: 1px;
}
.footer-title{
background-color: rgb(57, 89, 232);
border-radius: 3px;
}

    *{
    margin: 0;
    padding: 0;
    font-family: 'Poppins',sans-serif;
    box-sizing: border-box;
    }
    .container{
    width: 100%;
    min-height: 75vh;
    background-color: rgb(230, 255, 255);
    padding: 10px;
    
    }
    .todo-app{
    width: 100%;
    max-width: 540px;
    background: #fff;
    margin: 100px auto 20px;
    padding: 40px 30px 70px;
    border-radius: 10px;
    box-shadow: -14px 8px 38px -4px rgba(0,0,0,0.57);
    }
    .todo-app h2{
    color: #002765;
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    }
    .todo-app h2 img{
    width: 30px;
    margin-left: 10px;
    }
    .row{
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #edeef0;
    border-radius: 30px;
    padding-left: 20px;
    margin-bottom: 25px;
    }
    input{
    flex: 1;
    border: none;
    outline: none;
    background: transparent;
    padding: 10px;
    font-weight: 14px;
    }
    .todo-btn{
    border: none;
    outline: none;
    padding: 16px 50px;
    background: #ff5945;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    border-radius: 40px;
    }
    #list-container li{
    position: relative;
    list-style: none;
    font-size: 17px;
    padding: 12px 8px 12px 50px;
    user-select: none;
    cursor: pointer;
    }
    #list-container li::before{
    content: '';
    position: absolute;
    height: 50px;
    width: 50px;
    border-radius: 50%;
    background-image: url(images/unchecked.png);
    background-size: cover;
    background-position: center;
    top: -2px;
    left: 1px;
    }
    #list-container li.checked{
    color: #555;
    text-decoration: line-through;
    }
    #list-container li.checked::before{
    background-image: url(images/checked.png);
    }
    #list-container li span{
    position: absolute;
    right: 0;
    top: 5px;
    width: 40px;
    height: 40px;
    font-size: 22px;
    color: #555;
    line-height: 40px;
    text-align: center;
    border-radius: 50%;
    }
    #list-container li span:hover{
    background: rgb(236, 85, 85);
    color:white
    }
</style>
</body>
</html>