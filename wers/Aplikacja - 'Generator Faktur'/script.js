let itemIndex = document.querySelectorAll('#items .item').length || 0;

function addItem() {
    const itemsContainer = document.getElementById('items');
    const newItem = document.createElement('div');
    newItem.classList.add('item');
    newItem.innerHTML = `
        <input type="text" name="items[${itemIndex}][description]" placeholder="Opis" required>
        <input type="number" name="items[${itemIndex}][quantity]" placeholder="Ilość" required>
        <input type="number" step="0.01" name="items[${itemIndex}][unit_price]" placeholder="Cena jedn." required>
        <input type="number" step="0.01" name="items[${itemIndex}][vat_rate]" placeholder="VAT (%)" required>
        <button type="button" onclick="removeItem(this)">Usuń</button>
    `;
    itemsContainer.appendChild(newItem);
    itemIndex++;
}

function removeItem(button) {
    const item = button.parentElement;
    item.remove();
    updateItemIndices();
}

function updateItemIndices() {
    const items = document.querySelectorAll('#items .item');
    items.forEach((item, index) => {
        const inputs = item.querySelectorAll('input');
        inputs.forEach(input => {
            const name = input.getAttribute('name');
            const updatedName = name.replace(/\d+/, index);
            input.setAttribute('name', updatedName);
        });
    });
    itemIndex = items.length;
}
