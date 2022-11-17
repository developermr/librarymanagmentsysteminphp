const loginBtn = document.querySelector("#loginBtn")
const loginBtnAdmin = document.querySelector("#loginBtnAdmin")

const otherForm = document.querySelector('.student_form')
const adminForm = document.querySelector('.admin_form')


loginBtn.addEventListener('click',function(){
    otherForm.style.display = 'block'
    adminForm.style.display = 'none'
    // console.log(adminForm)
    loginBtnAdmin.classList.remove('activeBtn')
    loginBtn.classList.add('activeBtn')
})

loginBtnAdmin.addEventListener('click',function(){
    otherForm.style.display = 'none'
    adminForm.style.display = 'block'
    // console.log(adminForm)
    loginBtn.classList.remove('activeBtn')
    loginBtnAdmin.classList.add('activeBtn')
})

