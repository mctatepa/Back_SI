const on = document.getElementById('on')
const off = document.getElementById('off')
const submit = document.querySelector('.submit')
const input = document.getElementById('movie-input')
const form = document.querySelector('.form')

input.addEventListener('input', () => {
    const values = input.value
    
    if (!values) {
        on.style.display = "none"
        off.style.display = "block"
        submit.style.display = "block"
        form.style.display = "flex"
        form.style.flexDirection = "column"
    } else {
        on.style.display = "block"
        off.style.display = "none"
    }
})

