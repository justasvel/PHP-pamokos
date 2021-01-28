//Grass
let grassRadio = document.querySelector('#grass');
let grassCreate = document.querySelector('#grass-create');
//Carnivore
let carnivoreRadio = document.querySelector('#carnivore');
let carnivoreCreate = document.querySelector('#carnivore-options');
let carnivoreSelect = document.querySelector('#carnivore-option');
let carnivoreInputs = document.querySelector('#carnivore-inputs');
//Herbivore
let herbivoreRadio = document.querySelector('#herbivore');
let herbivoreCreate = document.querySelector('#herbivore-options');
let herbivoreSelect = document.querySelector('#herbivore-option');
let herbivoreInputs = document.querySelector('#herbivore-inputs');

grassRadio.addEventListener('change', () => {
    grassCreate.classList.remove('d-none');
    carnivoreCreate.classList.add('d-none');
    carnivoreInputs.classList.add('d-none');
    herbivoreCreate.classList.add('d-none');
    herbivoreInputs.classList.add('d-none');
});

//Carnivore

carnivoreRadio.addEventListener('change', () => {
    grassCreate.classList.add('d-none');
    herbivoreCreate.classList.add('d-none')
    carnivoreCreate.classList.remove('d-none');
    herbivoreInputs.classList.add('d-none');
});

carnivoreSelect.addEventListener('change', () => {
    if (carnivoreSelect.value > 0) {
        carnivoreInputs.classList.remove('d-none');
    }
});

//Herbivore

herbivoreRadio.addEventListener('change', () => {
    grassCreate.classList.add('d-none');
    herbivoreCreate.classList.remove('d-none')
    carnivoreCreate.classList.add('d-none');
    carnivoreInputs.classList.add('d-none');
});

herbivoreSelect.addEventListener('change', () => {
    if (herbivoreSelect.value > 0) {
        herbivoreInputs.classList.remove('d-none');
    }
});

