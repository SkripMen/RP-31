schet();
Search();
whiteLogo();
ButtonStyle();
aStyle();
Content();
background();

document.getElementById('searchButt').onclick = action;

function schet() {
    let p = document.getElementsByClassName('logo').length;
    document.getElementById('num').innerText = p;
}

function aStyle() {
    let butt = document.getElementsByTagName('a');
    for (let i = 0; i < butt.length; i++) {
        butt[i].style.color = '#ccc';
    }
}

function ButtonStyle() {
    let butt = document.getElementsByClassName('butt');
    for (let i = 0; i < butt.length; i++) {
        butt[i].style.backgroundColor = '#683a3d';
        butt[i].style.height = '100%';
        butt[i].style.borderRadius = '5px';
        butt[i].style.padding = '10px 5px';
        butt[i].style.color = '#ccc';
    }
}


function whiteLogo() {
    let td = document.getElementsByClassName("logoTD");
    for (let i = 0; i < td.length; ++i) {
        td[i].style.backgroundColor = "white";
    }
}


let count = 0;
setInterval(function () {
    document.getElementById("BackG").style.backgroundPositionY = '-' + (++count).toLocaleString() + 'px';
}, 100);

function action() {
    let search = document.getElementById('search');
    let td = document.getElementsByTagName('td');
    for (let i = 0; i < td.length; i++) {
        td[i].style.backgroundColor = '#1A1A1A';
        if (td[i].textContent == search.value) {
            td[i].style.backgroundColor = 'blue';
        }
    }
    whiteLogo();
}

function Search() {
    let tablet = document.getElementsByTagName("table")[0];
    let div1 = Object.assign(
        document.createElement('div'),
        {id: 'searchDiv'});

    let o = Object.assign(
        document.createElement('input'),
        {type: 'text', id: 'search', value: 'Поиск'});
    div1.appendChild(o);

    let i = Object.assign(
        document.createElement('input'),
        {type: 'submit', id: 'searchButt'});
    div1.appendChild(i);
    div1.style.cssFloat = "right";
    div1.style.margin = "10px";
    document.body.insertBefore(div1, tablet);
    return div1;
}

function Content() {
    let div1 = Object.assign(
        document.createElement('div'),
        {id: 'Content'});
    div1.style.backgroundColor = "#1A1A1A";
    div1.style.color = "#E3E3E3";
    let all = document.body.getElementsByTagName('*');
    for (let i = 0; i < all.length; i++) {
        div1.appendChild(all[i]);
    }
    div1.style.maxWidth = "1024px";
    div1.style.margin = "0 auto";
    div1.style.height = "100%";
    document.body.appendChild(div1);
}

function background() {
    let divCon = document.getElementById('Content');
    let div1 = Object.assign(
        document.createElement('div'),
        {id: 'BackG'});
    div1.style.backgroundImage = "url('bg.png')";
    div1.style.maxWidth = "100%";
    div1.style.margin = "0 auto";
    div1.style.height = "98.3%";
    document.body.insertBefore(div1, divCon);
    div1.appendChild(divCon);
}