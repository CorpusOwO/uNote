const nextStep = document.getElementById('next-step');
const backStep = document.getElementById('back-step');
const step1 = document.getElementById('step-1');
const step2 = document.getElementById('step-2');

function next(){
    step1.classList.add('hidden');
    step2.classList.remove('hidden');
}
function back(){
    step2.classList.add('hidden');
    step1.classList.remove('hidden');
}

nextStep.addEventListener('click', function(){
    next();
})
backStep.addEventListener('click', function(){
    back();
})