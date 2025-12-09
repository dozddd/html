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

// закрытие модального окна
span.addEventListener("click", () => {
    modal.classList.remove("block");
});

// закрытие при клике вне окна
window.addEventListener("click", (event) => {
    if (event.target === modal) {
        modal.classList.remove("block");
    }
});