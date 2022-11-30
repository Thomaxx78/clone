const ul = document.getElementById('nan');

const list = document.createDocumentFragment();

const url = 'http://127.0.0.1:8000/api/cours';

fetch(url)
    .then((response) => {
        return response.json();
    })
    .then((data) => {
        let cours = data;

        cours.map(function(cours) {
            let img = document.createElement('img');
            let li = document.createElement('li');
            let nom = document.createElement('h2');
            let description = document.createElement('span');
            let programme = document.createElement('span');
            let year = document.createElement('span');
            let date_debut = document.createElement('span');
            let date_fin = document.createElement('span');

            img.src= `${cours.img}`;
            nom.innerHTML = `${cours.nom}`;
            description.innerHTML = `${cours.description}`;
            programme.innerHTML = `${cours.programme}`;
            year.innerHTML = `${cours.year}`;
            date_debut.innerHTML = `${cours.date_debut}`;
            date_fin.innerHTML = `${cours.date_fin}`;


            
            li.appendChild(nom);
            li.appendChild(description);
            li.appendChild(programme);
            li.appendChild(year);
            li.appendChild(date_debut);
            li.appendChild(date_fin);
            //img.appendChild();
            list.appendChild(li);
            console.log(cours)
            ul.appendChild(list); 
        });
    })
    .catch(function(error) {
        console.log(error);
    });