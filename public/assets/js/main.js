function createParticles() {
    for (let i = 0; i < 20; i++) {
        let particle = document.createElement("div");
        particle.className = "particle";
        particle.style.left = `${Math.random() * 100}vw`;
        particle.style.animationDuration = `${3 + Math.random() * 5}s`;
        particle.style.animationDelay = `${Math.random() * 5}s`;
        document.body.appendChild(particle);
    }
}
function showGrid() {
    setTimeout(() => {
        const grid = document.getElementById("grid");
        grid.style.opacity = "1";
        grid.style.transform = "translateY(0)";
        grid.style.visibility = "visible";
    }, 2000);
}

window.onload = function(){
    createParticles();
        showGrid();

}



