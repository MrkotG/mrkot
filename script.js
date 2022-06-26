let coll = document.getElementsByClassName('img-pos');
for (let i = 0; i < coll.length; i++){
    coll[i].addEventListener('click', function(){
        this.classList.toggle('active');
        let content = this.nextElementSibling;
        if (content.style.maxHeight) {
            content.style.maxHeight = null;
        } else {
            content.style.maxHeight = content.scrollHeight + 'px'
        }
    })
}

/*--------------------------------------------------------------------*/
let blocks = document.querySelectorAll("#up .aboutUs-conent-block");
let img = document.querySelector("#up .aboutUs-conent-block img:first-of-type");
window.addEventListener("resize", resizeBlock());

function resizeBlock() {
    blocks.forEach(block => {
        block.style.width = img.offsetWidth + "px";
        block.style.height = img.offsetHeight + "px";
    });
}
/*--------------------------------------------------------------------*/

/* Верхнее меню */
document.querySelector('#profile').addEventListener('click', function(){
    document.querySelector('.reg_avtor').classList.add('active');
})

document.querySelector('.krest').addEventListener('click', function(){
    document.querySelector('.reg_avtor').classList.remove('active');
})

/* Боковое меню */
//Пишим в переменные теги
let burgerMenu = document.querySelector('.burger_meny');
let burgerButton = document.querySelector('#burger')
burgerMenu.style.transform = 'translateX(-'+burgerMenu.offsetWidth+'px)';
//Добовляем функции
//Открытие
burgerButton.addEventListener('click', ()=>{
    burgerMenu.style.transform = 'translateX(0px)';
})
//Закрытие
document.querySelector('.kresti').addEventListener('click', ()=>{
    burgerMenu.style.transform = 'translateX(-'+burgerMenu.offsetWidth+'px)';
})