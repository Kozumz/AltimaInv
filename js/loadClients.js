let selectedEmails = [];
function setClients(jdoc) {
    const clientList = document.getElementById("client-list");
    
    jdoc.forEach(client => {
        const clientDiv = document.createElement("div");
        clientDiv.classList.add("client-info");
        clientDiv.innerHTML = `
        <div style="padding:0 .5rem 0 .5rem ; align-items:center; display:flex;font-weight:bold; ">${client.IDCliente} </div> 
        <div class="client-header" style="text-align:center;">  ${client.Nombres} ${client.Apellidos}</div>
        <div class="client-phone" style="text-align:center;"> +52 ${client.Numero_telefono}</div>
        <div class="client-email" style="text-align:center; padding-right:1rem;"> ${client.Correo}</div>
        <input type="checkbox" value="${client.Correo}" class="client-checkbox">   
        `;

        const checkbox = clientDiv.querySelector('input[type="checkbox"]');
        checkbox.addEventListener('change', (event) => {
            if (event.target.checked) {
                selectedEmails.push(client.Correo);
            } else {
                const index = selectedEmails.indexOf(client.Correo);
                if (index > -1) {
                    selectedEmails.splice(index, 1);
                }
            }
        })
        clientList.appendChild(clientDiv);
    });

    const selectAllCheckbox = document.getElementById("select-all");
    selectAllCheckbox.addEventListener('change', (event) => {
        const allCheckboxes = document.querySelectorAll('.client-checkbox');
        allCheckboxes.forEach(checkbox => {
            checkbox.checked = event.target.checked;
            const clientEmail = checkbox.value;
            if (event.target.checked) {
                if (!selectedEmails.includes(clientEmail)) {
                    selectedEmails.push(clientEmail);
                }
            } else {
                const index = selectedEmails.indexOf(clientEmail);
                if (index > -1) {
                    selectedEmails.splice(index, 1);
                }
            }
        });
    });
}