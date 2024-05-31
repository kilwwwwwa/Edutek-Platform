const breakTask = document.getElementById('break');
const gymTask = document.getElementById('gym');
const studyTask = document.getElementById('study');
const tvTask = document.getElementById('tv');
const friendsTask = document.getElementById('friends');
const workTask = document.getElementById('work');
const deselectBtn = document.getElementById('deselect');
const taskContainer = document.querySelector('.task__container');
const scheduleContainer = document.querySelector('.schedule__container');
const resetBtn = document.querySelector('.deleteBtn');
const popUp = document.querySelector('.pop-up__container');
const noBtn = document.getElementById('btn__no');
const yesBtn = document.getElementById('btn__yes');

let selectedColor, active;

taskContainer.addEventListener('click', selectTask);
scheduleContainer.addEventListener('click', setColors);
deselectBtn.addEventListener('click', resetTasks);
resetBtn.addEventListener('click',openPopup);
noBtn.addEventListener('click', closePopup);
yesBtn.addEventListener('click', deleteTasks);

function selectTask (e){
    resetTasks()
    taskColor = e.target.style.backgroundColor;
    switch(e.target.id){
        case 'break':
            activeTask(breakTask, taskColor);
            icon = '<i class="fas fa-couch"></i>';
            break
        case 'gym':
            activeTask(gymTask, taskColor);
            icon = '<i class="fas fa-dumbbell"></i>';
            break
        case 'study':
            activeTask(studyTask, taskColor);
            icon = '<i class="fas fa-book"></i>';
            break
        case 'tv':
            activeTask(tvTask, taskColor);
            icon = '<i class="fas fa-tv"></i>';
            break
        case 'friends':
            activeTask(friendsTask, taskColor);
            icon = '<i class="fas fa-users"></i>';
            break
        case 'work':
            activeTask(workTask, taskColor);
            icon = '<i class="fas fa-briefcase"></i>';
            break
    }

};

function setColors (e){
    if(e.target.classList.contains('task') && active === true){
        e.target.style.backgroundColor = selectedColor;
        e.target.innerHTML = icon;
    }else if(e.target.classList.contains('fas') && active === true){
        e.target.parentElement.style.backgroundColor = selectedColor;
        e.target.parentElement.innerHTML = icon;
    }
};

function activeTask(task, color){
    task.classList.toggle('selected');

    if(task.classList.contains('selected')){
        active = true;
        selectedColor = color;
        return selectedColor;
    } else {
        active = false;
    }
}

function resetTasks(){
    const allTasks = document.querySelectorAll('.task__name');
    allTasks.forEach((item)=>{
        item.className = 'task__name';
    })
}

function deleteTasks(){
    const tasks = document.querySelectorAll('.task');
    tasks.forEach((item)=>{
        item.innerHTML = '';
        item.style.backgroundColor = 'white';
    })
    closePopup();
}

function openPopup(){
    popUp.style.display = 'flex';
}

function closePopup(){
    popUp.style.display = 'none';
}