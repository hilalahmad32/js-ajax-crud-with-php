// get all data
const getData = () => {
    const tbody = document.getElementById('tbody')
    let tr = "";
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'php/select.php', true);
    xhr.responseType = "json";
    xhr.onload = () => {
        if (xhr.status === 200) {
            let data = xhr.response;
            if (data.empty === "empty") {
                console.log("Record Not Found");
            } else {
                for (var i in data) {
                    tr += `
                    <tr>
                        <td>${data[i].id}</td>
                        <td>${data[i].product_title}</td>
                        <td>${data[i].seller}</td>
                        <td>${data[i].price}</td>
                        <td><button class="btn btn-success" data-toggle="modal" data-target="#update-data" onclick='editProduct(${data[i].id})'>Edit</button></td>
                        <td><button class="btn btn-danger" onclick='deleteProduct(${data[i].id})'>Delete</button></td>
                    </tr>
                    `;
                }
            }

            tbody.innerHTML = tr;
        } else {
            console.log("problem")
        }
    }
    xhr.send();
}
getData();

// get total count
const getTotalProduct = () => {
    const span = document.getElementById('total')
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'php/total.php', true);
    xhr.responseType = "json";
    xhr.onload = () => {
        if (xhr.status === 200) {
            let data = xhr.response;
            span.innerText = data;
        } else {
            console.log("problem")
        }
    }
    xhr.send();
}

getTotalProduct();
// insert data
const saveBtn = document.getElementById('save');

const saveProduct = (e) => {
    e.preventDefault();
    const product_title = document.getElementById('product_title').value;
    const price = document.getElementById('price').value;
    const seller = document.getElementById('seller').value;
    const form_data = document.getElementById('save-data');

    // ajax request
    const xhr = new XMLHttpRequest();
    // open file to send data
    xhr.open('POST', 'php/insert.php', true);
    // get status
    xhr.onload = () => {
        if (xhr.status === 200) {
            console.log(xhr.responseText)
        } else {
            console.log("some problem")
        }
    }
    // data in object
    const product = {
        product_title: product_title,
        price: price,
        seller: seller,
    }

    const jsonData = JSON.stringify(product);
    xhr.send(jsonData);
    form_data.reset();
    getData();
    getTotalProduct();
}
saveBtn.addEventListener('click', saveProduct);


// delete data

const deleteProduct = (id) => {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/delete.php', true);
    // xhr.responseType = 'json';
    xhr.onload = () => {
        if (xhr.status === 200) {
            console.log(xhr.response);
        } else {
            console.log("some problem");
        }
    }
    const data = JSON.stringify({ id: id });
    xhr.send(data);
    getData();
    getTotalProduct();

}

// edit data
const editProduct = (id) => {
    let product_title = document.getElementById('edit_product_title');
    let price = document.getElementById('edit_price');
    let seller = document.getElementById('edit_seller');
    let edit_id = document.getElementById('edit_id');


    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/edit.php', true);
    xhr.responseType = 'json';
    xhr.onload = () => {
        if (xhr.status === 200) {
            let data = xhr.response;
            for (var i in data) {
                edit_id.value = data[i].id;
                product_title.value = data[i].product_title;
                price.value = data[i].price;
                seller.value = data[i].seller;
            }
        } else {
            console.log("server problem")
        }
    }
    const data = JSON.stringify({ id: id });
    xhr.send(data);
}

// update data

const update = document.getElementById('update');
const update_form = document.getElementById('update_data');
const updateData = (e) => {
    e.preventDefault();
    let edit_id = document.getElementById('edit_id').value;
    let product_title = document.getElementById('edit_product_title').value;
    let price = document.getElementById('edit_price').value;
    let seller = document.getElementById('edit_seller').value;
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "php/update.php", true);
    xhr.onload = () => {
        if (xhr.status === 200) {
            console.log(xhr.response);
        } else {
            console.log("server problem");
        }
    }

    const product = {
        id: edit_id,
        product_title: product_title,
        seller: seller,
        price: price,
    }
    const data = JSON.stringify(product);
    xhr.send(data);
    update_form.reset();
    getData();
    getTotalProduct();


}
update.addEventListener("click", updateData);


const searchData = () => {
    const search = document.getElementById('search').value;
    const tbody = document.getElementById('tbody')
    let tr = "";
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "php/search.php", true);
    xhr.onload = () => {
        if (xhr.status === 200) {
            let data = xhr.response;
            console.log(data);
            if (data.empty === "empty") {
                console.log("Record Not Found");
            } else {
                for (var i in data) {
                    tr += `
                    <tr>
                        <td>${data[i].id}</td>
                        <td>${data[i].product_title}</td>
                        <td>${data[i].seller}</td>
                        <td>${data[i].price}</td>
                        <td><button class="btn btn-success" data-toggle="modal" data-target="#update-data" onclick='editProduct(${data[i].id})'>Edit</button></td>
                        <td><button class="btn btn-danger" onclick='deleteProduct(${data[i].id})'>Delete</button></td>
                    </tr>
                    `;
                }
                tbody.innerHTML = tr;
            }
        }
    }
    const data = JSON.stringify({ search: search });
    xhr.send(data);
}