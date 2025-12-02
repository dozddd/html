//смена темы
let btn = document.querySelector(".my_btn");
btn.addEventListener("click", btn_click);

function btn_click() {
    document.querySelector("body").classList.toggle("body_style");
}

//окно регистрации
let modal = document.querySelector(".reg-modal");
let btn_reg = document.querySelector(".btn-reg");
let span = document.querySelector(".reg-modal__close");

btn_reg.addEventListener("click", () => {
    modal.classList.add("block");
});

span.addEventListener("click", () => {
    modal.classList.remove("block");
    const displayDiv = document.querySelector('.reg-modal__display');
    if (displayDiv) {
        displayDiv.style.display = 'none';
        displayDiv.innerHTML = '';
    }
    const form = document.querySelector('.reg-modal__body form');
    if (form) {
        form.reset();
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.reg-modal__body form');
    if (!form) return;
    
    const displayDiv = document.createElement('div');
    displayDiv.className = 'reg-modal__display';
    displayDiv.style.display = 'none';
    form.parentNode.appendChild(displayDiv);
    
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        
        const login = form.querySelector('input[type="login"]').value;
        const password = form.querySelector('input[type="password"]').value;
        
        displayDiv.innerHTML = `
            <h3>Введённые данные:</h3>
            <p>${login} ${password}</p>
        `;
        displayDiv.style.display = 'block';
    });
    
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.classList.remove("block");
            displayDiv.style.display = 'none';
            form.reset();
        }
    });
});