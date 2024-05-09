console.log("Connected")

let cart = document.getElementsByClassName("ord");

let productList = [
    {
        name: "Desi Ghee 50ml",
        tag: "50mlghee",
        price: 50,
        inCart: 0
    },
    {
        name: "Desi Ghee 100ml",
        tag: "100mlghee",
        price: 98,
        inCart: 0
    },
    {
        name: "Desi Ghee 100ml",
        tag: "200mlghee",
        price: 195,
        inCart: 0
    },
    {
        name: "Desi Ghee 100ml",
        tag: "1000mlghee",
        price: 830,
        inCart: 0
    },
    {
        name: "Pack of 10ml Ghee ",
        tag: "10mlghee",
        price: 12,
        inCart: 0
    },
    {
        name: "Tin Cow Ghee",
        tag: "tincowghee",
        price: 8200,
        inCart: 0
    },
    {
        name: "Tin Buffalo Ghee",
        tag: "tinbuffaloghee",
        price: 10500,
        inCart: 0
    },
    
]

for (let i = 0; i < cart.length; i++) {
    cart[i].addEventListener('click', () => {
        updateCart(productList[i]);
        totalAmount(productList[i]);
    });
    cart[i].addEventListener('mouseover', function () {
        cart[i].innerText = "Add";
        cart[i].style.color = "white";
        cart[i].style.backgroundColor = "#EA1C2C";
    });
    cart[i].addEventListener('mouseout', function () {
        cart[i].innerHTML = `<i class="fas fa-shopping-cart"></i>`;
        cart[i].style.color = "whitesmoke";
        cart[i].style.backgroundColor = "#c70032";
    });
}



function updateCart(product) {
    let totalItems = localStorage.getItem("CartNumber");
    totalItems = parseInt(totalItems);

    if (totalItems) {
        localStorage.setItem("CartNumber", totalItems + 1);
        document.getElementById("items").innerHTML = totalItems + 1;
        document.getElementById("item").innerHTML = totalItems + 1;
    }
    else {
        localStorage.setItem("CartNumber", 1);
        document.getElementById("items").innerHTML = 1;
        document.getElementById("item").innerHTML = 1;
    }
    setProduct(product);
}

function showCartNumber() {
    let totalItems = localStorage.getItem("CartNumber");
    totalItems = parseInt(totalItems);

    if (totalItems) {
        document.getElementById("items").innerHTML = totalItems;
        document.getElementById("item").innerHTML = totalItems;
    }
    else {
        document.getElementById("items").innerHTML = 0;
        document.getElementById("item").innerHTML = 0;
    }
}
showCartNumber();

function setProduct(product) {

    let cartItems = localStorage.getItem("productInCart");
    cartItems = JSON.parse(cartItems);

    if (cartItems != null) {
        if (cartItems[product.tag] == undefined) {
            cartItems = {
                ...cartItems, //items already added in object(cart)
                [product.tag]: product
            }
        }
        cartItems[product.tag].inCart += 1;
    }
    else {
        product.inCart = 1;
        cartItems = {
            [product.tag]: product
        }
    }

    localStorage.setItem("productInCart", JSON.stringify(cartItems));
}

function totalAmount(product) {

    let total = localStorage.getItem("Amount");
    total = parseInt(total);

    if (isNaN(total)) {
        total = product.price;
    }
    else {
        total = total + product.price;
    }

    localStorage.setItem("Amount", total);
    displayCart();
}

//Displaying Cart on Screen
function displayCart() {

    let cartItem = localStorage.getItem("productInCart");
    cartItem = JSON.parse(cartItem);

    let productContainer = document.getElementById("cartItems");

    if (cartItem && productContainer) {
        productContainer.innerHTML = '';
        document.getElementById("tableContent").style.display = "block";
        document.getElementById("cart").style.display = "none";
        Object.values(cartItem).map(items => {

            productContainer.innerHTML += `
           <tbody>
           <tr>
           <td class="names col-md-5">${items.name}</td>
           <td class="quantityy col-md-2">${items.inCart}</td>
           <td class="costt col-md-2">Rs.${items.price}/</td>
           <td class="totall col-md-3">Rs.${items.price * items.inCart}/</td>
           </tr>
           </tbody>
           `;

        });

        let cartTotal = localStorage.getItem("Amount");
        cartTotal = parseInt(cartTotal);

        let productNumber = localStorage.getItem("CartNumber");
        productNumber = parseInt(productNumber);


        document.getElementById("total").innerHTML = `
    <div class="cart_item_title">Total items: ${productNumber}</div>`;


        document.getElementById("btns").innerHTML = `
    <div class="cart_item_title"><b>SubTotal: Rs.${cartTotal}/</b></div>
     <button class="clearCart btn btn-danger px-1 py-1"  onclick="window.localStorage.clear();
     window.location.reload();">Clear <i class="fa fa-trash" aria-hidden="true"></i></button>
     <a class="checkout btn btn-success px-1 py-1" href="checkout.html" target="_self">Check Out</a>
     `;

    }


}

displayCart();



