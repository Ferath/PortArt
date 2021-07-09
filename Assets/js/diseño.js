const datos = 
[{
    img: 'Assets/imgs/cards/diagram.png',
    price: '$ {ewe}'
}, 
{
    img: 'Assets/imgs/cards/faq.png',
},
{
    img: 'Assets/imgs/cards/sent.png',
},
{
    img: 'Assets/imgs/cards/watch.png',
},
{
    img: 'Assets/imgs/cards/team.png',
},
{
    img: 'Assets/imgs/cards/target.png',
},
{
    img: 'Assets/imgs/cards/sent.png',
},
{
    img: 'Assets/imgs/cards/watch.png',
},
{
    img: 'Assets/imgs/cards/team.png',
},
{
    img: 'Assets/imgs/cards/target.png',
},
{
    img: 'Assets/imgs/cards/faq.png',
},
{
    img: 'Assets/imgs/cards/diagram.png',
}]

let proyectos = document.querySelector("#cards");

const dinamico = (src, price) => {
    let div = document.createElement("div");
    let img = document.createElement("img");
    img.src = src;
    let p = document.createElement("p");
    div.appendChild(img);
    p.innerHTML = price;
    div.appendChild(p);
    proyectos.appendChild(div);
}

datos.forEach(({img, price}) => dinamico(img, price));