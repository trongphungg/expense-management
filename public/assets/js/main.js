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

const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
async function addCart(id,name,date,price){
    const response = await fetch(`http://127.0.0.1:8000/handlecreate`, {
        method: 'POST',
        headers: { 
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({ id,name,date,price}),
        mode: 'cors',
    });
    // const result = await response.json();
    // alert(result.message);
}


document.getElementById('expenseForm').addEventListener('submit', function(event) {
    event.preventDefault();
    addExpense();

});

function clearExpenseForm() {
    document.getElementById('price').value = '';
    document.getElementById('name').value = '';
    document.getElementById('date').value = '';
    document.getElementById('note').value = '';
    document.getElementById('id').value = '';
}

function addExpense() {
    let price = document.getElementById('price').value;
    let name = document.getElementById('name').value;
    let date = document.getElementById('date').value;
    let note = document.getElementById('note').value;
    let id = document.getElementById('id').value;
    
    if (price && date) {
        addExpenseToList(price, name, date, note);
        updateTotalAmount(price);
        addCart(id,name,date,price);
        clearExpenseForm();
    }
}

function addExpenseToList(price, name, date, note) {
    let expenseList = document.getElementById('expenseList');
    let listItem = document.createElement('li');
    listItem.className = 'list-group-item';
    listItem.innerHTML = ` ${name} - ${date} - ${note} - <strong>${price} VNĐ</strong>`;
    expenseList.appendChild(listItem);
}

function updateTotalAmount(price) {
    let totalAmount = document.getElementById('totalAmount');
    totalAmount.textContent = parseFloat(totalAmount.textContent) + parseFloat(price);
}


function toggleMenu() {
    let menu = document.getElementById("sideMenu");
    if (menu.style.right === "0px") {
        menu.style.right = "-450px";
    } else {
        menu.style.right = "0px";
    }
}


window.onload = function(){
    // createParticles();
    // showGrid();

}



