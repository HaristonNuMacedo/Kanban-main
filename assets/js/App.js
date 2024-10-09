//recarrega a página ao redimensionar a tela
window.addEventListener('resize', () =>{
    if(window.screen.width > 890){
        location.reload();
    }
});

//mostra o menu(mobile)
function showMenu(){
    let menu = document.querySelector('aside.sidebar');
    menu.style.left = 0;

    let menuBackground = document.querySelector('div.hidden-menu');
    menuBackground.style.display = 'block';
}

//esconde o menu(mobile)
function hideMenu(){
    let menu = document.querySelector('aside.sidebar');
    menu.style.left = -250;

    let menuBackground = document.querySelector('div.hidden-menu');
    menuBackground.style.display = 'none';
}

//faz aparacer ou esconder o formulário de cadastro de projetos
function addProjectForm(){

    let form = document.querySelector('.new-project-form');
    let btn = document.querySelector('.btn-add');

    if(form.style.display == ''){
        form.style.display = 'block';
        btn.classList.replace('fa-plus', 'fa-minus');
    }else if(form.style.display == 'block'){
        form.style.display = '';
        btn.classList.replace('fa-minus', 'fa-plus');
    }
}

//edita o nome do projeto
function editProjectName(id){
    title = document.querySelector('.text-container');
    txtValue = document.querySelector('.text-container h2').innerHTML;

    let form = document.createElement('form');
    form.action = 'kanban.controller.php?action=editprojectname&id='+id;
    form.method =  'post';

    let input = document.createElement('input');
    input.type = 'text';
    input.placeholder = 'Novo título';
    input.value = txtValue;
    input.name = 'name';
    input.className = 'editProjectinput';


    let button = document.createElement('input');
    button.type = 'submit';
    button.value = 'ir';
    button.className = 'editProjectButton';

    form.appendChild(input);
    form.appendChild(button);

    title.innerHTML = '';
    title.insertBefore(form, title.children[0]);
}

//edita a tarefa
function taskEdit(id){
    let cardItem = document.querySelector('.id'+id);
    let name = document.querySelector('.id'+id +' h2').innerHTML
    let descr = document.querySelector('.id'+id +' p').innerHTML
    descr = descr.trim();
    cardItem.innerHTML = '';

    let form = document.createElement('form');
    form.action = 'kanban.controller.php?action=task-edit';
    form.method = 'post';
    form.className = 'taskedit-form';

    let inputName = document.createElement('input');
    inputName.type = 'text';
    inputName.className = 'taskedit-input';
    inputName.placeholder = 'Edite o nome da tarefa';
    inputName.value = name;
    inputName.name = 'task';

    let textarea = document.createElement('textarea');
    textarea.className = 'taskedit-textarea';
    textarea.placeholder = 'Edite a descrição da tarefa';
    textarea.value = descr;
    textarea.name = 'description';

    let ocult = document.createElement('input')
    ocult.type = 'text';
    ocult.name = 'id';
    ocult.value = id;
    ocult.style.display = 'none';


    let btn = document.createElement('input');
    btn.type = 'submit';
    btn.value = 'editar';
    btn.className = 'taskedit-btn';

    form.appendChild(inputName);
    form.appendChild(textarea);
    form.appendChild(ocult);
    form.appendChild(btn);

    cardItem.insertBefore(form, cardItem[0]);
}