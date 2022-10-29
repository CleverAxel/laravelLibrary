const DAY = document.forms[0].elements["dateDay"];
const MONTH = document.forms[0].elements["dateMonth"];
const YEAR = document.forms[0].elements["dateYear"];
const DATE_HIDDEN = document.forms[0].elements["dateHidden"];


const CONTAINER_AUTHORS = document.querySelector(".containAuthors");
const AUTHORS = CONTAINER_AUTHORS.querySelectorAll("button");
const SEARCH_AUTHOR = document.getElementById("searchAuthor");
const SELECTED_AUTHORS = document.querySelector(".selectedAuthors");

const CONTAINER_GENRES = document.querySelector(".containGenres");
const GENRES = CONTAINER_GENRES.querySelectorAll("button");
const SEARCH_GENRE = document.getElementById("searchGenre");
const SELECTED_GENRES = document.querySelector(".selectedGenres");

document.forms[0].addEventListener("submit", (e) =>{
    DATE_HIDDEN.value = YEAR.value + "-" + MONTH.value + "-" + DAY.value;
});


CreateDataList(AUTHORS, SEARCH_AUTHOR, CONTAINER_AUTHORS, SELECTED_AUTHORS);
CreateDataList(GENRES, SEARCH_GENRE, CONTAINER_GENRES, SELECTED_GENRES);

/************************************ */

function CreateDataList(DATA, SEARCH, CONTAINER, SELECTED){
    let arrayName = [];
    DATA.forEach(element =>{
        arrayName.push(element.dataset.name.toUpperCase());
    });

    let arrayLength = arrayName.length;
    let i = 0;
    let idTimeout = null;
    SEARCH.addEventListener("input", () =>{
        if(SEARCH.value.trim() == ""){
            CONTAINER.style.display = "none";
        }
        clearTimeout(idTimeout);
        idTimeout = setTimeout(() => {
            i = 0;
            while(i < arrayLength && arrayName[i].indexOf(SEARCH.value.toUpperCase()) <= -1){
                i++;
            }

            if(i != arrayLength && SEARCH.value.trim() != "" && DATA[i].disabled == false){
                CONTAINER.style.display = "block";
                DATA[i].focus();
                CONTAINER.scrollTo({top:DATA[i].offsetTop - CONTAINER.offsetTop});
            }
        }, 750);
    });
    //////////////////////////////////////////
    CONTAINER.addEventListener("keydown", (e) =>{
        if(e.key == "Escape"){
            CONTAINER.style.display = "none";
            SEARCH.focus();
        }
    });
    /////////////////////////////////////////
    for(let j = 0; j < arrayLength; j++){
        DATA[j].addEventListener("click", (e) =>{
            e.preventDefault();
            DATA[j].disabled = true;
    
            SELECTED.appendChild(createDivSelector(DATA[j].dataset.name, DATA[j].dataset.index, DATA[j].dataset.id));
    
            CONTAINER.style.display = "none";
            SEARCH.value = "";
            SEARCH.focus();
        });
    }

    function createDivSelector(name, index, id){
        let div = document.createElement("div");
        div.dataset.name = name;
        div.dataset.index = index;
        div.innerHTML = `${name} <input type="hidden" name="authorId" value="${id}">`;
        let button = document.createElement("button");
        button.innerText = "X";
        
        button.addEventListener("click", (e) => {
            e.preventDefault();
            SELECTED.removeChild(div);
            DATA[index].disabled = false;
        });
        div.appendChild(button);
        return div;
    }
}
/*************************************************************** */