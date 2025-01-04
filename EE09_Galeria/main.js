let nr = 1;

function zamiana(src, numer) {
    const glowne = document.getElementById('glowne');
    glowne.src = src;
    nr = numer;
}

function updateImage(aktualne, nr) {
    switch (nr) {
        case 1:
            aktualne.src = '1.jpg';
            break;
        case 2:
            aktualne.src = '2.jpg';
            break;
        case 3:
            aktualne.src = '3.jpg';
            break;
        case 4:
            aktualne.src = '4.jpg';
            break;
        case 5:
            aktualne.src = '5.jpg';
            break;
        default:
            break;
    }
}

function prev() {
    let aktualne = document.getElementById('glowne');
    nr--;
    if (nr === 0) nr = 5;
    updateImage(aktualne, nr);
}

function next() {
    let aktualne = document.getElementById('glowne');
    nr++;
    if (nr === 6) nr = 1;
    updateImage(aktualne, nr);
}


