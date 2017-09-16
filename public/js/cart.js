let stateCart = {
	listProducts: [],
};

$(document).ready(() => {
	saveCart();
	saveState();
	showCart(stateCart.listProducts);
});

function saveCart() {
	let addCart = document.querySelectorAll('.add-cart');
	for (let cart of addCart) {
		cart.addEventListener('click', (e) => {
			let product = e.target;
			if(!e.target.getAttribute('id')) {
				product = e.target.parentElement;
			}

			let id = product.getAttribute('data-id');
			let name = product.getAttribute('data-name');
			let img = product.getAttribute('data-img');
			let price = product.getAttribute('data-price');
			let quantity = 1;

			let addProduct = {
				id: id,
				name: name,
				img: img,
				price: price,
				quantity: quantity
			};

			if (stateCart.listProducts != '') {
				for (let index of stateCart.listProducts) {
					if (index.id === id) {
						index.quantity ++;
						localStorage.setItem('cart', JSON.stringify(stateCart.listProducts));
						showCart(stateCart.listProducts);
						return;
					}
				}
			}

			stateCart.listProducts.push(addProduct);
			localStorage.setItem('cart', JSON.stringify(stateCart.listProducts));
			showCart(stateCart.listProducts);
		});
	}
}

function saveState() {
	// window.localStorage.removeItem("cart");
	if(localStorage.cart) {
		stateCart.listProducts = JSON.parse(localStorage.cart);
	}
}

function showCart(dataCart) {
	let html = '';
	let priceTotal = 0;
	let count = 0;
	let cartItem = document.querySelector('.nav-cart-items');
	let totalItemMobile = document.querySelector('.mobile-num');
	let totalItem = document.querySelector('.desk-num');
	let totalPrice = document.querySelector('.total-price');
	let showTotal = document.querySelector('.show-total');

	if (dataCart.length > 0) {
		for (let item of dataCart) {
			priceTotal += item.price * item.quantity;
			let content = `
				<div class="nav-cart-item clearfix">
	        <div class="nav-cart-img">
	          <a href="#">
	            <img src="../../upload/products/${item.img}" alt="" style="width: 50px;">
	          </a>
	        </div>
	        <div class="nav-cart-title">
	          <a href="#">
	            ${item.name}
	          </a>
	          <div class="nav-cart-price">
	            <span>${item.quantity} x</span>
	            <span>${item.price} VNĐ</span>
	          </div>
	        </div>
	        <div class="nav-cart-remove">
	          <a class="del-item" data-index="${count}"><i class="icon icon_close"></i></a>
	        </div>
	      </div>
			`;

			html += content;
			count++;
		}
	} else {
		html = '<center>Giỏ hàng trống</center>'
	}
	

	totalPrice.textContent = `${priceTotal} VNĐ`;
	showTotal.textContent = `${priceTotal} VNĐ`;
	cartItem.innerHTML = html;
	totalItemMobile.textContent = dataCart.length;
	totalItem.textContent = dataCart.length;
	deleteItem();
}

function deleteItem() {
	let delItem = document.querySelectorAll('.del-item');
	for (let item of delItem) {
		item.addEventListener('click', (e) => {
			let index = e.target;
			if (e.target.getAttribute('class') != 'del-item') {
				index = e.target.parentElement;
			}

			let position = index.getAttribute('data-index');
			stateCart.listProducts.splice(position, 1);
			localStorage.setItem('cart', JSON.stringify(stateCart.listProducts));
			showCart(stateCart.listProducts);
		});
	}
}