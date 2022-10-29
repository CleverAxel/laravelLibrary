const DAY = document.forms[0].elements["dateDay"];
const MONTH = document.forms[0].elements["dateMonth"];
const YEAR = document.forms[0].elements["dateYear"];
const DATE_HIDDEN = document.forms[0].elements["dateHidden"]; 
const CONTAINER_AUTHORS = document.querySelector(".containAuthors");
const AUTHORS = CONTAINER_AUTHORS.querySelectorAll("button");
const SEARCH_AUTHOR = document.getElementById("searchAuthor");
const SELECTED_AUTHORS = document.querySelector(".selectedAuthors");
document.forms[0].addEventListener("submit", () =>{
    DATE_HIDDEN.value = YEAR.value + "-" + MONTH.value + "-" + DAY.value;
});

let arrayAuthorName = [];

AUTHORS.forEach(element => {
        arrayAuthorName.push(element.dataset.name.toUpperCase());
    });
let offsetTopParent = CONTAINER_AUTHORS.offsetTop;
let offsetTopChild = 0;
//CONTAINER_AUTHORS.scrollTo({top:offsetTopGeorges - offsetTopParent});

let lengthArray = arrayAuthorName.length;
let i = 0;
let idTimeout = null;



SEARCH_AUTHOR.addEventListener("input", () => {
    if(SEARCH_AUTHOR.value == ""){
        CONTAINER_AUTHORS.style.display = "none";
    }else{
        CONTAINER_AUTHORS.style.display = "block";
    }
    clearTimeout(idTimeout);
    idTimeout = setTimeout(() => {
        i = 0;
        while(i < lengthArray && arrayAuthorName[i].indexOf(SEARCH_AUTHOR.value.toUpperCase()) <= -1){
            i++;
        }

        if(i != lengthArray){
            offsetTopChild = AUTHORS[i].offsetTop;
            AUTHORS[i].focus();
            CONTAINER_AUTHORS.scrollTo({top:offsetTopChild - CONTAINER_AUTHORS.offsetTop});
        }
    }, 1000);
});

CONTAINER_AUTHORS.addEventListener("keydown", (e) =>{
    if(e.key == "Escape"){
        CONTAINER_AUTHORS.style.display = "none";
        SEARCH_AUTHOR.focus();
    }
})

for(let j = 0; j < lengthArray; j++){
    AUTHORS[j].addEventListener("click", (e) =>{
        e.preventDefault();
        AUTHORS[j].disabled = true;

        // let divAuthor = document.createElement("div");
        // divAuthor.dataset.name = AUTHORS[j].dataset.name;
        // divAuthor.innerHTML = AUTHORS[j].dataset.name;
        SELECTED_AUTHORS.appendChild(createDivAuthor(AUTHORS[j].dataset.name, AUTHORS[j].dataset.index, AUTHORS[j].dataset.id));


        CONTAINER_AUTHORS.style.display = "none";
        SEARCH_AUTHOR.value = "";
        SEARCH_AUTHOR.focus();
    });
}

function createDivAuthor(authorName, authorIndex, authorId){
    let divAuthor = document.createElement("div");
    divAuthor.dataset.name = authorName;
    divAuthor.dataset.index = authorIndex;
    divAuthor.innerHTML = 
    `
    ${authorName}
    <input type="hidden" name="authorId" value="${authorId}">
    `

    divAuthor.addEventListener("click", (e) => {
        e.preventDefault();
        SELECTED_AUTHORS.removeChild(divAuthor);
        AUTHORS[authorIndex].disabled = false;
    });

    return divAuthor;
}